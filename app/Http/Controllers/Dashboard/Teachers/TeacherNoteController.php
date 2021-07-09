<?php

namespace App\Http\Controllers\Dashboard\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeacherNote;

class TeacherNoteController extends Controller
{
    public function index($id)
    {
        $notes = TeacherNote::latest()->get();

        return view('dashboard.teachers.notes.index', compact('notes', 'id'));
    }


    public function create($id)
    {   
        
        return view('dashboard.teachers.notes.create', compact('id'));
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
        
        $note = new TeacherNote;
        $note->teacher_id = $request->teacher_id;
        $note->user_id = auth()->id();
        $note->note = $request->note;
        $note->is_active = $request->get('is_active', 0);

        $note->save();

        session()->flash('success', 'تم إنشاء الملاحظة بنجاح');

        return response()->json(["redir"=>route('teachers.notes', $request->teacher_id)]);
    }

    public function edit($id)
    {
        $note = TeacherNote::findOrFail($id);
        return view('dashboard.teachers.notes.edit', compact('note'));
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

        $note = TeacherNote::findOrFail($id);
        $note->note = $request->note;
        $note->is_active = $request->get('is_active', 0);

        $note->save();

        session()->flash('success', 'تم تعديل الملاحظة بنجاح');

        return response()->json(["redir"=>route('teachers.notes', $note->teacher_id)]);
    }

    public function delete($id)
    {
        $note = TeacherNote::findOrFail($id);
        $note->delete();
        session()->flash('success', 'تم حذف الملاحظة بنجاح');
    }

    public function activation()
    {
        $id = request()->id;

        $note = TeacherNote::findOrFail($id);
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

    public function teacherNotes()
    {
        $notes = TeacherNote::where('teacher_id', auth()->user()->teacher->id)->where('is_active', 1)->latest()->paginate(12);

        return view('dashboard.teachers.notes.notes', compact('notes'));
        
    }
}
