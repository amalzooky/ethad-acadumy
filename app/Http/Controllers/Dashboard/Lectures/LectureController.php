<?php

namespace App\Http\Controllers\Dashboard\Lectures;
 
use Validator;
use App\Subject;
use App\Teacher;
use App\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;
use PDF;
class LectureController extends Controller
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
    public function index()
    {
        $lectures = Lecture::latest()->get();
        return view('dashboard.lectures.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::whereIsActive('1')->get();
        
        // $subjects = Subject::whereIsActive('1')->whereHas('academicYear', function($q){
        //     $q->where('year', now()->year);
        // })->get();
        return view('dashboard.lectures.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
            'is_active' => 'required',
        ]);

        $attributeNames =  [
            'name' => __('dashboard.major.name'),
            'description' => __('dashboard.major.description'),
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
        
        $is_active = $request->get('is_active', 0);

        Lecture::create([
            'name' => $request->name,
            'description' => $request->description,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'is_active' => $is_active,
            'user_id' => auth()->id(),
        ]);

        session()->flash('success', __('dashboard.statuses.lecture_created'));
        return response()->json(["redir"=>route('virtual-classroom.create')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        $subjects = Subject::whereIsActive('1')->whereHas('academicYear', function($q){
            $q->where('year', now()->year);
        })->get();
        
        $teachers = Teacher::whereHas('user', function($query){
            $query->where('is_active', 1);
        })->with('user')->get();

        return view('dashboard.lectures.edit', compact('lecture', 'subjects', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $attributeNames =  [
            'name' => __('dashboard.major.name'),
            'description' => __('dashboard.major.description'),
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

        $is_active = $request->get('is_active', 0);
        $lecture->name = $request->name;
        $lecture->description = $request->description;
        $lecture->subject_id = $request->subject_id;
        $lecture->teacher_id = $request->teacher_id;
        $lecture->is_active = $is_active;
        $lecture->save();

        session()->flash('success', __('dashboard.statuses.lecture_updated'));
        return response()->json(["redir"=>route('lectures.index')]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        session()->flash('success', __('dashboard.statuses.lecture_deleted'));
    }

    public function activation()
    {
        $id = request()->id;

        $lecture = Lecture::findOrFail($id);
        if($lecture->is_active == 1){
            $lecture->is_active = 0;           
        } else {
            $lecture->is_active = 1;
        }

       if($lecture->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.lecture_activation')
        ]);
       }        
    }

    public function getTeachersBySubjectID()
    {
        $teachers = Teacher::whereHas('user', function($query){
            $query->where('is_active', 1);
        })->whereHas('subjects', function($query){
            $query->where('is_active', 1)->where('subject_id', request()->subject_id);
        })->with('user')->get();

        return response()->json([
            'teachers' => $teachers
        ]);
    }

    
    public function export($type){
        switch($type){
            case "pdf":
                $lectures = Lecture::latest()->get();
                $pdf = PDF::loadView("dashboard.lectures.pdf",["lectures"=>$lectures]);
                return $pdf->download('Lectures.pdf');
            break;
            case "print":
                $lectures = Lecture::latest()->get();
                $pdf = PDF::loadView("dashboard.lectures.pdf",["lectures"=>$lectures]);
                return $pdf->stream('Lectures.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\LecturesExport , 'Lectures.'.$type);
        }
    }
}
