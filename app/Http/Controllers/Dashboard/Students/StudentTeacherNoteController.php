<?php

namespace App\Http\Controllers\Dashboard\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentTeacherNote;
use App\Subject;
use App\Student;

class StudentTeacherNoteController extends Controller
{
    public function index()
    {
        $student_id = Student::where('user_id', auth()->id())->first()->id;
        $subjects = Subject::whereHas('students', function($q) use ($student_id){
            $q->where('student_id', $student_id);
        })->with('teachers')->get();

        

        $allTeachers = [];
        foreach($subjects as $subject){
        $allTeachers[] = $subject->teachers;
        }

        $teachers = array();
        foreach ($allTeachers as $t) {
            $teachers[$t[0]['id']] = $t; // Get unique country by code.
        }


        return view('dashboard.student_teacher_note.index', compact('teachers'));
    }

    public function create($id)
    {   
        return view('dashboard.student_teacher_note.create', compact('id'));
    }

    public function store(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'note' => 'required',
            'teacher_id' => 'required',
        ]);

        $attributeNames =  [
            'note' => 'ملاحظتك',
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

        $note = new StudentTeacherNote;

        $note->note = $request->note;
        $note->student_id = auth()->user()->student->id;
        $note->teacher_id = $request->teacher_id;
        $note->is_teacher_show = $request->get('is_teacher_show', 0);

        $note->save();

        session()->flash('success', 'شكرا لك, تم إرسال ملاحظتك بنجاح');

        return response()->json(["redir"=>route('student.teacher.note.index')]);
    }


    public function studentNotes()
    {
        $notes = StudentTeacherNote::where('teacher_id', auth()->user()->teacher->id)->where('is_teacher_show', 1)->latest()->paginate(10);
        return view('dashboard.student_teacher_note.student_notes', compact('notes'));
    }
}
