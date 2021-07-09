<?php

namespace App\Http\Controllers\Dashboard\Subjects;

use Validator;
use App\Subject;
use App\Major;
use App\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Excel;
use PDF;
use App\SubjectDate;


class SubjectController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }

    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('dashboard.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $majors = Major::where('is_active', 1)->get();
        $years = AcademicYear::where('is_active', 1)->latest()->get();
        return view('dashboard.subjects.create', compact('majors', 'years'));
    }

    public function formValidator($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3', 
            'major_id' => 'required',
            'academic_year_id' => 'required',
            'semester' => 'required',
            'description' => 'required|min:3',
        ]);

        $attributeNames =  [
            'name' => __('dashboard.subject.name'),
            'description' => __('dashboard.subject.description'),
            'major_id' => __('dashboard.subject.majors'),
            'academic_year_id' => __('dashboard.subject.year'),
            'semester' => __('dashboard.subject.semester'),
        ];

        $validator->setAttributeNames($attributeNames);
        return $validator;
    }

    public function store(Request $request)
    {

        $validator = $this->formValidator($request);
        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        $is_active = $request->get('is_active', 0);

        $sub = Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'academic_year_id' => $request->academic_year_id,
            'semester' => $request->semester,
            'is_active' => $is_active,
            'user_id' => auth()->id(),
            'major_id' => $request->major_id
        ]);

        $subjectDate = new SubjectDate;
        $subjectDate->subject_id = $sub->id;
        $subjectDate->sunday = $request->sunday;
        $subjectDate->monday = $request->monday;
        $subjectDate->tuesday = $request->tuesday;
        $subjectDate->wednesday = $request->wednesday;
        $subjectDate->thursday = $request->thursday;
        $subjectDate->friday = $request->friday;
        $subjectDate->saturday = $request->saturday;
        $subjectDate->save();

        session()->flash('success', __('dashboard.statuses.subject_created'));
        return response()->json(["redir"=>route('subjects.index')]);
    }

    public function show($id)
    {
        //
    }


    public function edit(Subject $subject)
    {
        $majors = Major::where('is_active', 1)->get();
        $years = AcademicYear::where('is_active', 1)->latest()->get();
        return view('dashboard.subjects.edit', compact('subject', 'majors', 'years'));
    }


    public function update(Request $request, Subject $subject)
    {

        $validator = $this->formValidator($request);
        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        $is_active = $request->get('is_active', 0);

        $subject->name = $request->name;
        $subject->major_id = $request->major_id;
        $subject->description = $request->description;

        $is_active = $request->get('is_active', 0);
        $subject->is_active = $is_active;

        $subject->save();

        $subjectDate =  SubjectDate::where("subject_id",$subject->id)->first();
        if(!$subjectDate){
            $subjectDate = new SubjectDate;
            $subjectDate->subject_id = $subject->id;
        }
        $subjectDate->sunday = $request->sunday;
        $subjectDate->monday = $request->monday;
        $subjectDate->tuesday = $request->tuesday;
        $subjectDate->wednesday = $request->wednesday;
        $subjectDate->thursday = $request->thursday;
        $subjectDate->friday = $request->friday;
        $subjectDate->saturday = $request->saturday;
        $subjectDate->save();
        session()->flash('success', __('dashboard.statuses.subject_edited'));
        return response()->json(["redir"=>route('subjects.index')]);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        session()->flash('success', __('dashboard.statuses.subject_deleted'));
        // return response()->json(['type' => 'success', 'title' => 'حذف', 'text' => 'تمت عملية الحذف بنجاح']);
    }

    public function activation()
    {
        $id = request()->id;

        $subject = Subject::findOrFail($id);
        if($subject->is_active == 1){
            $subject->is_active = 0;           
        } else {
            $subject->is_active = 1;
        }

       if($subject->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.subject_activation')
        ]);
        
       }        
    }

    public function export($type)
    {   
        switch($type){
            case "pdf":
                $pdf = PDF::loadView("dashboard.subjects.pdf",["subjects"=>Subject::all()]);
                return $pdf->download('Subjects.pdf');
            break;
            case "print":
                $pdf = PDF::loadView("dashboard.subjects.pdf",["subjects"=>Subject::all()]);
                return $pdf->stream('Subjects.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\SubjectsExport , 'Subjects.'.$type);
        }
    }

}
