<?php

namespace App\Http\Controllers\Dashboard\Teachers;

use App\Gavernement;
use Validator;
use App\User;
use App\Teacher;
use App\Lecture;
use App\City;
use App\Subject;
use App\VirtualClassroom;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentTeacherNote;

use Maatwebsite\Excel\Excel;
use PDF;
use DB;
use App\AcademicYear;

class TeacherController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year ="all")
    {
        $teachers = Teacher::latest()->where(function($q) use ($year){
            if($year != "all"){
                $q->whereYear("created_at",$year);
            }
        })->get();
        $teachersYears = Teacher::latest()->select(DB::raw('YEAR(created_at) as year'))->distinct("created_at")->get();
        return view('dashboard.teachers.index', compact('teachers','teachersYears','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Gavernement::latest()->get();
        $subjects = Subject::where('is_active', 1)->get();

        // $subjects = Subject::where('is_active', 1)->whereHas('academicYear', function($q){
        //     $q->where('year', now()->year);
        // })->get();
        $groups = DB::table('groups')->get();
        return view('dashboard.teachers.create', compact('cities', 'subjects', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {

//        $validator = Validator::make($request->all(), [
//            'username' => 'required|unique:users',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|max:15|min:6',
//            'full_name' => 'required|string|unique:users',
//            'mobile_number' => 'required|numeric|unique:users',
//            'telephone_number' => 'numeric|Nullable|unique:users',
//            'city_id' => 'required',
//            'date_of_birth' => 'required|date',
//            'sex' => 'required',
//            'facebook_url' => 'url|Nullable|unique:users',
//            'subjects' => 'required',
//            'job_title' => 'required',
//        ]);
//
//        $attributeNames =  [
//            'username' => __('global.username'),
//            'email' => __('global.email'),
//            'password' => __('global.password'),
//            'full_name' => __('global.full_name'),
//            'mobile_number' => __('global.mobile_number'),
//            'telephone_number' => __('global.telephone_number'),
//            'city_id' => __('global.city'),
//            'date_of_birth' => __('global.date_of_birth'),
//            'sex' => __('global.sex'),
//            'facebook_url' => __('global.facebook_url'),
//            'subjects' => __('dashboard.teacher.teacher_subjects'),
//            'job_title' => 'المسمى الوظيفي'
//        ];
//
//        $validator->setAttributeNames($attributeNames);
//
//        if($validator->fails()){
//            return response()->json([
//                "msg"=>[
//                "type"=>"error",
//                "body"=>$validator->messages()->first()
//                ]
//            ]);
//        }
//
//        if($request->has('avatar')){
//            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
//            $image = $request->avatar->storePubliclyAs('public/uploads/teachers/avatar', $filename);
//            $avatar = 'storage/uploads/teachers/avatar/' . $filename;
//        }
//
//        $user = new User;
//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->is_active = $request->get('is_active', 0);
//        $user->full_name = $request->full_name;
//
//        $user->mobile_number = $request->mobile_number;
//        $user->telephone_number = $request->telephone_number;
//        $user->city_id = $request->city_id;
//        $user->date_of_birth = $request->date_of_birth;
//        $user->sex = $request->sex;
//        $user->facebook_url = $request->facebook_url;
//        $user->avatar = $avatar;
//
//        $user->save();
//        $user->assignRole('teacher');
//        $user->givePermissionTo('managment_virtual_classroom');
//        $user->givePermissionTo('managment_students_notes');
//        $teacher = new Teacher;
//        $teacher->user_id = $user->id;
//        $teacher->job_title = $request->job_title;
//        $teacher->save();
//
//        $oldSubjects = $teacher->subjects()->whereHas("academicYear", function($q){
//            $q->where('year', "!=",now()->year);
//        })->pluck('id')->toArray();
//        $allSubjects = array_merge($oldSubjects,$request->subjects);
//        $teacher->subjects()->attach($allSubjects);
//
//        if($request->groups){
//            foreach($request->groups as $group)
//            {
//                $getGroup = \Groups::group($group);
//                $getGroup->addMembers($user->id);
//            }
//        }
//
//        session()->flash('success', __('dashboard.statuses.teacher_created'));
//        return response()->json(["redir"=>route('teachers.index')]);
//    }
        public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:15|min:6',
            'full_name' => 'required|string|unique:users',
            'mobile_number' => 'required|numeric|unique:users',
            'telephone_number' => 'numeric|Nullable|unique:users',
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => 'url|Nullable|unique:users',
            'subjects' => 'required',
            'job_title' => 'required',
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
            'subjects' => __('dashboard.teacher.teacher_subjects'),
            'job_title' => 'المسمى الوظيفي'
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
        $avatar = "";
        if ($request->has('avatar')) {

            $avatar = uploadImage('abouts', $request->avatar);
        }
//        if($request->has('avatar')){
//            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
//            $image = $request->avatar->storePubliclyAs('public/uploads/teachers/avatar', $filename);
//            $avatar = 'storage/uploads/teachers/avatar/' . $filename;
//        }

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

        $user->save();
        $user->assignRole('teacher');
        $user->givePermissionTo('managment_virtual_classroom');
        $user->givePermissionTo('managment_students_notes');
        $teacher = new Teacher;
        $teacher->user_id = $user->id;
        $teacher->job_title = $request->job_title;
        $teacher->save();

        // $oldSubjects = $teacher->subjects()->whereHas("academicYear", function($q){
        //     $q->where('year', "!=",now()->year);
        // })->pluck('id')->toArray();
        // $allSubjects = array_merge($oldSubjects,$request->subjects);

        $teacher->subjects()->attach($request->subjects);

        if($request->groups){
            foreach($request->groups as $group)
            {
                $getGroup = \Groups::group($group);
                $getGroup->addMembers($user->id);
            }
        }

        session()->flash('success', __('dashboard.statuses.teacher_created'));
        return response()->json(["redir"=>route('teachers.index')]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();
        $notes = StudentTeacherNote::where('teacher_id', $teacher->id)->latest()->paginate(5);
        return view('dashboard.teachers.show', compact('teacher', 'notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $cities = Gavernement::latest()->get();
        $subjects = Subject::where('is_active', 1)->get();

        // $subjects = Subject::where('is_active', 1)->whereHas('academicYear', function($q){
        //     $q->where('year', now()->year);
        // })->get();
        return view('dashboard.teachers.edit', compact('cities', 'subjects', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,' . $teacher->user->id,
            'email' => 'required|email|unique:users,email,' . $teacher->user->id,
            'full_name' => 'required|string|unique:users,full_name,' . $teacher->user->id,
            'mobile_number' => 'required|numeric|unique:users,mobile_number,'. $teacher->user->id,
            'telephone_number' => 'numeric|Nullable|unique:users,telephone_number,'. $teacher->user->id,
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => 'url|Nullable|unique:users,facebook_url,' . $teacher->user->id,
            'subjects' => 'required',
            'job_title' => 'required',
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
            'subjects' => __('dashboard.teacher.teacher_subjects'),
            'job_title' => 'الدور الوظيفي'
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

        if($request->password){
            $teacher->user->password = bcrypt($request->password);
        }
        $avatar = "";
        if($request->avatar)
        {
            File::delete($teacher->user->avatar);
            $avatar = uploadImage('abouts', $request->avatar);
            $teacher->user->avatar = $avatar;

        }


        $teacher->user->username = $request->username;
        $teacher->user->email = $request->email;
        $teacher->user->is_active = $request->get('is_active', 0);
        $teacher->user->full_name = $request->full_name;
        $teacher->user->mobile_number = $request->mobile_number;
        $teacher->user->telephone_number = $request->telephone_number;
        $teacher->user->city_id = $request->city_id;
        $teacher->user->date_of_birth = $request->date_of_birth;
        $teacher->user->sex = $request->sex;
        $teacher->user->facebook_url = $request->facebook_url;

        $teacher->user->save();

        $teacher->subjects()->sync($request->subjects);
        $teacher->job_title = $request->job_title;
        $teacher->save();

        session()->flash('success', __('dashboard.statuses.teacher_updated'));
        return response()->json(["redir"=>route('teachers.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        $teacher->user->delete();
        session()->flash('success', __('dashboard.statuses.teacher_deleted'));
    }

    public function getDeletePost( $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return response()->json(["redir"=>route('teachers.index')]);

            session()->flash('success', __('dashboard.statuses.teacher_deleted'));

        }

    public function activation()
    {

        $id = request()->id;

        $user = User::findOrFail($id);

        if($user->is_active == 1){
            $user->is_active = 0;
        } else {
            $user->is_active= 1;
        }

       if($user->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.teacher_activation')
        ]);

       }
    }

    public function export($type){
        switch($type){
            case "pdf":
                $teachers = Teacher::latest()->get();
                $pdf = PDF::loadView("dashboard.teachers.pdf",["teachers"=>$teachers]);
                return $pdf->download('teachers.pdf');
            break;
            case "print":
                $teachers = Teacher::latest()->get();
                $pdf = PDF::loadView("dashboard.teachers.pdf",["teachers"=>$teachers]);
                return $pdf->stream('Teachers.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\TeacherExport , 'Teachers.'.$type);
        }
    }

    public function getStudents()
    {
        $lectures = Lecture::where('is_active', 1)->where('teacher_id', auth()->user()->teacher->id)->get();
        $students = [];
        foreach ($lectures as $lec) {
            foreach ($lec->students as $student) {
                $students[] = $student;
            }
        }


        return view('dashboard.teachers.get_students', compact('students'));
    }

    public function getLectures($sl){
        $subject_id = string2Array($sl)["subject_id"];
        $lectures = Lecture::where('is_active', 1)->where("subject_id",$subject_id)->where('teacher_id', auth()->user()->teacher->id)->latest()->get();
        return view('dashboard.teachers.lectures.get_lectures', compact('lectures'));

    }

    public function getLectureVirtualClassrooms($id){
        $lecture_id = string2array($id)["lecture_id"];
        $lecture = Lecture::where('is_active', 1)->where('id', $lecture_id)->first();
        $classrooms = $lecture->virtualClassrooms;
        return view("dashboard.teachers.lectures.get_virtual_classroom",compact('lecture','classrooms'));
    }

    public function getLectureStudents($id){
        $lecture_id = string2array($id)["lecture_id"];
        $lecture = Lecture::where('is_active', 1)->where('id', $lecture_id)->first();
        $fromVClassroom = false;
        return view("dashboard.teachers.lectures.get_students",compact('lecture','fromVClassroom'));
    }

    public function getStudentsVirtualClassrooms($id){
        $classroom_id = string2array($id)["classroom_id"];
        $classroom = VirtualClassroom::findOrFail($classroom_id);
        $lecture = $classroom->lecture;
        $fromVClassroom = true;
        return view("dashboard.teachers.lectures.get_students",compact('lecture','fromVClassroom','classroom'));
    }

    public function getYears(){
        $user = auth()->user();
        $years = AcademicYear::whereHas("subjects",function($q) use ($user){
            $q->whereIn("id",$user->teacher->subjects()->pluck("subject_id")->toArray());
        })->get();

        return view('dashboard.teachers.lectures.ViewYears',compact('years'));
    }
    public function ViewUrlClassroom($sl){
        $data = string2Array($sl);

        return view("dashboard.teachers.lectures.viewifeam-classroom",compact('data'));
    }

    public function getSubjects($year){
        $user = auth()->user();
        // $subjects = $user->teacher->subjects()->whereHas("academicYear",function($q)use($year){
        //     $q->where("year",$year);
        // })->get();

        $subjects = $user->teacher->subjects()->get();

        return view("dashboard.teachers.lectures.subjects-by-year",compact('subjects'));

    }
}

