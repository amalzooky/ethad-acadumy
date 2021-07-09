<?php

namespace App\Http\Controllers\Dashboard\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Excel;
use PDF;
use DB;
use Yajra\Datatables\Datatables;

use App\City;
use App\Subject;
use App\School;
use App\Student;
use App\Major;
use App\User;
use App\Lecture;
use App\StudentClass;
use App\AcademicYear;
use App\WatchingRecordedCounter;

class StudentController extends Controller
{

    private $excel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }

    public function index($active = 'all',$year = 'all')
    {

        switch($active){
            case "-active":
                $title = 'dashboard.header.active_studnets';
            break;
            case "-inactive":
            $title = 'dashboard.header.inactive_studnets';
            break;
            default:
                $title = 'dashboard.header.studnets';
        }
        $studentsYears = Student::latest()->select(DB::raw('YEAR(created_at) as year'))->distinct("created_at")->get();
        $students = Student::latest()->where(function($q) use ($year){
            if($year != "all"){
                $q->whereYear("created_at",$year);
            }
        })->get();
        return view("dashboard.students.index",compact('title','active','year','studentsYears','students'));
    }

    public function create()
    {
        $cities = City::latest()->get();
        $majors = Major::latest()->where("is_active",1)->get();
        $groups = DB::table('groups')->get();
        $schools = School::latest()->get();
        return view("dashboard.students.create",compact('cities','majors', 'groups','schools'));
    }


    public function store(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:15|min:6',
            'full_name' => 'required|string|unique:users',
            'mobile_number' => 'required|numeric',
            'telephone_number' => 'numeric|Nullable',
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => 'url|Nullable|unique:users',
            'subjects' => 'required',
            'major' => 'required',
            'active_date'=>'date|Nullable',

        ]);

        $attributeNames =  [
            'username' => __('global.username'),
            'email' => __('global.email'),
            'password' => __('global.password'),
            'full_name' => __('global.full_name'),
            'mobile_number' => __('global.mobile_number'),
            'telephone_number' => __('global.telephone_number'),
            'city_id' => __('global.city'),
            'date_of_birth' => __('global.date_of_birth'),
            'sex' => __('global.sex'),
            'facebook_url' => __('global.facebook_url'),
            'subjects' => __('dashboard.students.subjects'),
            'major' => __('dashboard.students.major'),
            "active_date"=>__('global.active_date')
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        if($request->has('avatar')){
            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
            $image = $request->avatar->storePubliclyAs('public/uploads/students/avatar', $filename);
            $avatar = 'storage/uploads/students/avatar/' . $filename;
        }

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = $request->get('is_active', 0);
        $user->full_name = $request->full_name;
        $user->mobile_number = $request->mobile_number;
        $user->telephone_number = $request->telephone_number;
        $user->city_id = $request->city_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->facebook_url = $request->facebook_url;
        $user->avatar = $avatar;
        $user->active_date = $request->active_date;

        $user->save();
        $user->assignRole('student');
        $student = new Student;
        $student->user_id = $user->id;
        $student->major_id = $request->major;
        $student->facebook_parent = $request->facebook_parent;
        $student->school_id = $request->school_id;
        $student->save();

        $student->subjects()->attach($request->subjects);
        // $student->lectures()->attach($request->lectures);

        if($request->groups){
            foreach($request->groups as $group)
            {
                $getGroup = \Groups::group($group);
                $getGroup->addMembers($user->id);
            }
        }

        session()->flash('success', __('dashboard.statuses.student_created'));

        return response()->json(["redir"=>route('students.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

        return view('dashboard.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $cities = City::latest()->get();
        $majors = Major::latest()->where("is_active",1)->get();
        $schools = School::latest()->get();
        $subject_ids = [];
        foreach($student->subjects as $keys){
            $subject_ids[] = $keys->id;
        }
        return view("dashboard.students.edit",compact('subject_ids','majors','student','cities', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $user = User::find($student->user_id);

        $validator = \Validator::make($request->all(), [
            'username' => ['required',Rule::unique('users')->ignore($user)],
            'email' => ['required','email',Rule::unique('users')->ignore($user)],
            'full_name' => ['required','string',Rule::unique('users')->ignore($user)],
            'mobile_number' => ['required','numeric'],
            'telephone_number' => ['Nullable','numeric'],
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => ['Nullable','url',Rule::unique('users')->ignore($user)],
            'subjects' => 'required',
            'major' => 'required',
            'active_date'=>'date|Nullable',
            'password' => 'Nullable|max:15|min:6',

        ]);

        $attributeNames =  [
            'username' => __('global.username'),
            'email' => __('global.email'),
            'password' => __('global.password'),
            'full_name' => __('global.full_name'),
            'mobile_number' => __('global.mobile_number'),
            'telephone_number' => __('global.telephone_number'),
            'city_id' => __('global.city'),
            'date_of_birth' => __('global.date_of_birth'),
            'sex' => __('global.sex'),
            'facebook_url' => __('global.facebook_url'),
            'subjects' => __('dashboard.students.subjects'),
            'major' => __('dashboard.students.major'),
            'active_date'=>__('global.active_date')
        ];

        $validator->setAttributeNames($attributeNames);

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        if($request->has('avatar')){
            File::delete($user->avatar);
            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
            $image = $request->avatar->storePubliclyAs('public/uploads/students/avatar', $filename);
            $avatar = 'storage/uploads/students/avatar/' . $filename;
            $user->avatar = $avatar;
        }

        $user->username = $request->username;
        $user->email = $request->email;

        if($request->password) $user->password = bcrypt($request->password);
        $user->is_active = $request->get('is_active', 0);
        $user->full_name = $request->full_name;
        $user->mobile_number = $request->mobile_number;
        $user->telephone_number = $request->telephone_number;
        $user->city_id = $request->city_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->facebook_url = $request->facebook_url;
        $user->active_date = $request->active_date;


        $user->save();
        $student->user_id = $user->id;
        $student->major_id = $request->major;
        $student->facebook_parent = $request->facebook_parent;
        $student->school_id = $request->school_id;
        $student->save();

        $student->subjects()->sync($request->subjects);
        // $student->lectures()->sync($request->lectures);

        session()->flash('success', __('dashboard.statuses.student_updated'));
        return response()->json(["redir"=>route('students.index')]);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        $student->user()->delete();
        session()->flash('success', __('dashboard.statuses.student_deleted'));
    }

    public function activation()
    {
        $id = request()->id;

        $student = User::findOrFail($id);
        if($student->is_active == 1){
            $student->is_active = 0;
        } else {
            $student->is_active = 1;
        }

       if($student->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.student_activation')
        ]);
       }
    }

    public function export($type,$active){
        switch($type){
            case "pdf":
                switch($active){
                    case "-active":
                        $students = Student::latest()->whereHas("user",function($q){
                            $q->where("is_active",1);
                        })->get();
                    break;
                    case "-inactive":
                    $students = Student::latest()->whereHas("user",function($q){
                        $q->where("is_active",0);
                    })->get();
                    break;
                    default:
                        $students = Student::latest()->get();
                }
                $pdf = PDF::loadView("dashboard.students.pdf",["students"=>$students]);
                return $pdf->download('students.pdf');
            break;
            case "print":
                switch($active){
                    case "-active":
                        $students = Student::latest()->whereHas("user",function($q){
                            $q->where("is_active",1);
                        })->get();
                    break;
                    case "-inactive":
                    $students = Student::latest()->whereHas("user",function($q){
                        $q->where("is_active",0);
                    })->get();
                    break;
                    default:
                        $students = Student::latest()->get();
                }
                $pdf = PDF::loadView("dashboard.students.pdf",["students"=>$students]);
                return $pdf->stream('students.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\StudentsExport , 'students.'.$type);
        }
    }

    public function getSubjectByMajorId($id){

        $subjects = Subject::where("is_active",1)->where("major_id",$id)->latest()->get();

        // $subjects = Subject::where("is_active",1)->where("major_id",$id)->whereHas('academicYear', function($q){
        //     $q->where('year', now()->year);
        // })->latest()->get();
        return response()->json($subjects);
    }

    public function getLecturesBySubjectIds(){
        $lecturesIds = explode(",",request()->get("ids",[]));
        $subjects = Subject::whereIn("id",$lecturesIds)->where("is_active",1)->get();
        $lectures = [];
        foreach($subjects  as $subject ){
            $lec = [];
            foreach($subject->lectures as $lectureData){
                $lec[] = [
                    "id"=>$lectureData->id,
                    "name"=>$lectureData->name,
                    "teacher"=>$lectureData->teacher->user->full_name
                ];
            }
            if(count( $lec)> 0){
                $lectures[] = [$subject->name=>$lec];
            }
        }
        return response()->json($lectures);
    }

    public function getStudentSubjects(){
        $user = auth()->user();

        $years = AcademicYear::whereHas("subjects",function($q) use ($user){
            $q->whereIn("id",$user->student->subjects()->pluck("subject_id")->toArray());
        })->get();


        return view("dashboard.studentView.subjects.subjects",compact('years')) ;
    }

    public function getStudentSubjectsByYear($year){
        $subjects = auth()->user()->student->subjects()->whereHas('academicYear',function($q) use ($year){
            $q->where("year",$year);
        })->get();
        return view("dashboard.studentView.subjects.subjectsbyyear",compact('subjects')) ;
    }

    public function getClassrommsBySubjectId($id){
        $subject_id = ($id);
//        dd($subject_id);
        $student_id = auth()->user()->student->id;
        $lectures = Lecture::where("subject_id",$subject_id)->latest()->get();
//dd($lectures);
        $classrooms = [];
//        dd($classrooms);
        foreach ($lectures as $key => $lecture) {

           if($lecture->subject_id == $subject_id){

                foreach($lecture->virtualClassrooms()->orderBy("id","desc")->get() as $classroom){
                    $studentClass = StudentClass::
                        where("student_id",$student_id)
                        ->where("virtual_classroom_id",$classroom->id)->first();

                    $wiziqUrl = $studentClass ? $studentClass->url : null;
                    $downloadUrl = "";
                    $availableWatch = false;
                    $availableRecording = false;

                     $toDay = strtotime(date("Y-m-d H:i:s"));
                    $startTimeToStringTime = strtotime($classroom->start_time);
                    $endTimeToStringTime = strtotime($classroom->webinar_end_time);

                    if($startTimeToStringTime < $toDay && $toDay < $endTimeToStringTime){
                        $availableWatch = true;
                    }
                    if($startTimeToStringTime < $toDay && $toDay > $endTimeToStringTime){
                        $availableRecording = true;
                    }

                    $note = $classroom->note()
                    ->where("show_when_student",1)
                    ->where("student_id",auth()->user()->student->id)
                    ->where("virtual_classroom_id",$classroom->id)->first();

                    $note =  $note ?  $note->note : "-";

                    $classrooms[] = [
                        "title"=>$classroom->title,
                        "start_time"=>$classroom->start_time,
                        "virtual_classroom_id"=> $classroom->id,
                        "lecture_id"=>$classroom->lecture_id,
                        "webinar_end_time"=>$classroom->webinar_end_time,
                        "webinar_description"=>$classroom->webinar_description,
                        "recording_url"=>$classroom->recording_url,
                        "webinar_url"=>$classroom->webinar_url,
                        "zoom_join_url"=>$classroom->zoom_join_url,
                        "wiziq_url"=>$wiziqUrl,
                        "download_url"=>$downloadUrl,
                        "availableWatch"=>$availableWatch,
                        "availableRecording"=>$availableRecording,
                        "urls"=>array2String(["title"=>$classroom->title,"wiziq_url"=>$wiziqUrl, "zoom_join_url" =>  $classroom->zoom_join_url, "webinar_url"=>$classroom->webinar_url,"record_url"=>$classroom->recording_url]),
                        "note"=>$note
                    ];
                }
           }
        }
        return view("dashboard.studentView.subjects.classrooms",compact('classrooms'));
    }

    public function watchingClassroom($id){
        $data = string2Array($id);
        return view("dashboard.studentView.subjects.watching",compact('data'));
    }

    public function recordClassroom($id){
        $data = string2Array($id);
        return view("dashboard.studentView.subjects.recordifream",compact('data'));
    }

    public function recordWebinarClassroom($id){
        $data = string2Array($id);
        $data["record_url"] = $data["webinar_url"];
        return view("dashboard.studentView.subjects.recordifream",compact('data'));
    }

    public function recordZoomClassroom($id){
        $data = string2Array($id);
        $data["record_url"] = $data["zoom_join_url"];

        return view("dashboard.studentView.subjects.recordifream",compact('data'));
    }

    public function getAllStudents()
    {

        $year = request()->get("year","all");
        switch(request()->active){
            case "-active":
                $students = Student::latest()->where(function($q) use ( $year){
                    if($year != "all"){
                        $q->whereYear("created_at",$year);
                    }
                })->whereHas("user",function($q){
                    $q->where("is_active",1);
                })->with('user')->select('students.*');
            break;
            case "-inactive":
            $students = Student::latest()->where(function($q) use ( $year){
                if($year != "all"){
                    $q->whereYear("created_at",$year);
                }
            })->whereHas("user",function($q){
                $q->where("is_active",0);
            })->with('user')->select('students.*');
            break;
            default:
            $students = Student::latest()->where(function($q) use ( $year){
                if($year != "all"){
                    $q->whereYear("created_at",$year);
                }
            })->with('user')->select('students.*');
        }


        return Datatables::of($students)
        ->editColumn('full_name', function($student){
            return '<a href="' . route('students.show', $student->id). '">' . $student->user->full_name . "</a>";
        })
        ->editColumn('created_at', function($student){
            return $student->created_at->toFormattedDateString();
        })->addColumn('action', function($student){
            return view('dashboard.datatable.action', [
                'id' => $student->id,
                'student' => $student
                // 'name' => $admin->name,
                // 'destroy' => '/dashboard/admins/',
                // 'edit' => "/dashboard/admins/{$admin->id}/edit",
            ]);
        })
        ->editColumn('mobile_number', function($student){
            return $student->user->mobile_number;
        })
        ->editColumn('email', function($student){
            return "<a data-toggle='tooltip' data-placement='top' title='إرسل رسالة الي {$student->user->full_name}' target='_blank' href='https://mail.google.com/mail/?view=cm&fs=1&to={$student->user->email}'>{$student->user->email}</a>";
        })
        ->editColumn('avatar', function($student){
            $user = $student->user;
            return view('dashboard.datatable.avatar', compact('user'));
        })
        ->rawColumns(['full_name', 'avatar', 'email', 'action'])->escapeColumns(['full_name'])
        ->make(true);
    }


    public function reportStudents($action,$year){
        switch($action){
            case "-active":
                $students = Student::latest()->where(function($q) use ( $year){
                    if($year != "all"){
                        $q->whereYear("created_at",$year);
                    }
                })->whereHas("user",function($q){
                    $q->where("is_active",1);
                })->with('user')->select('students.*');
            break;
            case "-inactive":
            $students = Student::latest()->where(function($q) use ( $year){
                if($year != "all"){
                    $q->whereYear("created_at",$year);
                }
            })->whereHas("user",function($q){
                $q->where("is_active",0);
            })->with('user')->select('students.*');
            break;
            default:
            $students = Student::latest()->where(function($q) use ( $year){
                if($year != "all"){
                    $q->whereYear("created_at",$year);
                }
            })->with('user')->select('students.*');
        }

         $data= $students->get();

         //return view("pdf.students",compact('data'));
        $pdf = \PDF::loadView('pdf.students', compact('data'));
        return $pdf->download('students-'.$action."-".$year.'.pdf');
    }
  public function certficat(){

      return view('dashboard.datatable.avatar', compact('user'));
    }

    public function watchingRecordedCounter()
    {
        $virtual_classroom_id = request()->virtual_classroom_id;
        $recored_name = request()->recored_name;
        $student_id = Student::where('user_id', auth()->id())->first()->id;

        $WatchingRecordedCounter = WatchingRecordedCounter::where('virtual_classroom_id', $virtual_classroom_id)->where('student_id', $student_id)->first();
        if($WatchingRecordedCounter){
            if($recored_name == 'wiziq'){
                $WatchingRecordedCounter->wiziq_counter += 1;
            }
            if($recored_name == 'webinar'){
                $WatchingRecordedCounter->webinar_counter += 1;
            }

            $WatchingRecordedCounter->save();

        }else{
            $WatchingRecordedCounter = new WatchingRecordedCounter;
            $WatchingRecordedCounter->student_id = $student_id;
            $WatchingRecordedCounter->virtual_classroom_id = $virtual_classroom_id;
            if($recored_name == 'wiziq'){
                $WatchingRecordedCounter->wiziq_counter  = 1;
            }
            if($recored_name == 'webinar'){
                $WatchingRecordedCounter->webinar_counter = 1;
            }
            $WatchingRecordedCounter->save();

        }


        return response()->json('success');
    }
}
