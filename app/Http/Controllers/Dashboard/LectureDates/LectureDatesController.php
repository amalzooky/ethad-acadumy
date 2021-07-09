<?php

namespace App\Http\Controllers\Dashboard\LectureDates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubjectDate;
use App\Subject;

class LectureDatesController extends Controller
{
    public function index(){
        $year = request()->get("year",date("y"));
        $user = auth()->user();
        if($user->hasRole('teacher')){
            $subjects = auth()->user()->teacher->subjects()->whereHas('academicYear',function($q) use ($year){
                $q->where("year",$year);
            })->get();
        }else if($user->hasRole('student')){
            $subjects = auth()->user()->student->subjects()->whereHas('academicYear',function($q) use ($year){
                $q->where("year",$year);
            })->get();
        }else{
            $subjects = Subject::latest()->whereHas('academicYear',function($q) use ($year){
                $q->where("year",$year);
            })->get();
        }

        return view("dashboard.studentView.subjects.lecture_dates",compact('subjects'));
    }
}
 