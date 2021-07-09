<?php

namespace App\Http\Controllers\Dashboard\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentNote;
class StudentNoteController extends Controller
{
    public function index($id)
    {   
        $notes = StudentNote::where('student_id', $id)->latest()->get();
        return view('dashboard.students.notes.index', compact('id', 'notes'));
    }

    public function create($id)
    {   
        
        return view('dashboard.students.notes.create', compact('id'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'note' => 'required'
        ]);

        $attributeNames =  [
            'note' => 'الملاحظة'
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
        
        $note = new StudentNote;
        $note->student_id = $request->student_id;
        $note->user_id = auth()->id();
        $note->note = $request->note;
        $note->is_active = $request->get('is_active', 0);

        $note->save();

        session()->flash('success', 'تم إنشاء الملاحظة بنجاح');

        return response()->json(["redir"=>route('student.notes', $request->student_id)]);
    }

    public function edit($id)
    {
        $note = StudentNote::findOrFail($id);
        return view('dashboard.students.notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'note' => 'required'
        ]);

        $attributeNames =  [
            'note' => 'الملاحظة'
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

        $note = StudentNote::findOrFail($id);
        $note->note = $request->note;
        $note->is_active = $request->get('is_active', 0);

        $note->save();

        session()->flash('success', 'تم تعديل الملاحظة بنجاح');

        return response()->json(["redir"=>route('student.notes', $note->student_id)]);
    }

    public function delete($id)
    {
        $note = StudentNote::findOrFail($id);
        $note->delete();
        session()->flash('success', 'تم حذف الملاحظة بنجاح');
    }

    public function activation()
    {
        $id = request()->id;

        $note = StudentNote::findOrFail($id);
        if($note->is_active == 1){
            $note->is_active = 0;           
        } else {
            $note->is_active = 1;
        }

       if($note->save()){
        return response()->json([
            'success' => 'تم تغير حالة الملاحظة بنجاح'
        ]);
       }        
    }

    public function studentNotes()
    {
        $notes = StudentNote::where('student_id', auth()->user()->student->id)->where('is_active', 1)->latest()->paginate(12);

        return view('dashboard.students.notes.student_notes', compact('notes'));
        
    }
}
