<?php

namespace App\Http\Controllers\Dashboard\Notes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Note;
use Validator;
class NoteController extends Controller
{
    public function getNoteStudent(){
        $scid = string2array(request()->scid);
        $note = "";
        $show_when_student =0;
        $noteData = Note::where("student_id",$scid["student_id"])->where("virtual_classroom_id",$scid["classroom_id"])->first();
        if($noteData){
            $note = $noteData->note;
            $show_when_student =$noteData->show_when_student;
        }
        return response()->json(["note"=>$note,"show_when_student"=>$show_when_student]);
    }

    public function createOrUpdateNoteStudent(){

        $validator = Validator::make(request()->all(), [
            'note' => 'required|min:10',
        ]);
        
        if($validator->fails()){
            return response()->json([
                
                "error"=>true,
                "msg"=>$validator->messages()->first()
                
            ]);
        }


        $scid = string2array(request()->scid);
        $user = auth()->user();
        $note = "";
        $noteData = Note::where("student_id",$scid["student_id"])->where("virtual_classroom_id",$scid["classroom_id"])->first();
        if(!$noteData){
            $noteData = new Note;
            $noteData->student_id = $scid["student_id"];
            $noteData->virtual_classroom_id= $scid["classroom_id"];
            $noteData->teacher_id = $user->teacher->id;
        }

        $noteData->note = request()->note;
        $noteData->show_when_student = request()->get("show_when_student",0);
        $noteData->save();
        return response()->json(["note"=>$note]);
    }
}
