<?php

namespace App\Http\Controllers\Dashboard\Analytics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Major;
use App\Subject;
use App\Student;
use App\VirtualClassroom;
use App\City;
use App\User;

class AnalyticsController extends Controller
{

    public function index(){
        $majorsData = Major::latest()->get();
        $year = "all";
        $majors = [
            "data"=>[],
            "labels"=>[]
        ];
        foreach($majorsData as $majorData){
            $majors["data"][] = $majorData->students()->count();
            $majors["labels"][] = $majorData->name;
        }

        $subjectsData = Subject::whereYear("created_at",date("Y"))->latest()->get();
        $subjects = [
            "data"=>[],
            "labels"=>[]
        ];
        foreach($subjectsData as $subjectData){
            $subjects["data"][] = $subjectData->students()->count();
            $subjects["labels"][] = $subjectData->name;
        }

        $data["majors"] = ["labels"=>json_encode($majors["labels"]),"data"=>json_encode($majors["data"])];
        $data["subjects"] = ["labels"=>json_encode($subjects["labels"]),"data"=>json_encode($subjects["data"])];

        $data["students"] =json_encode( [
            [ 
                "label"=>__('global.male'),
                "value"=> Student::whereHas("user",function($q){$q->where("sex",1);})->count()
            ],
            [ 
                "label"=>__('global.female'),
                "value"=> Student::whereHas("user",function($q){$q->where("sex",2);})->count()
            ],
            
        ]);
        $dates = getDatesBetweenTowDates();
        $classrooms = [];
        foreach($dates as $date){
            $classrooms[] = [
                "date"=>$date,
                "count"=>VirtualClassroom::wheredate("created_at",$date)->count()
            ];
        }
        $data["classrooms"] = json_encode($classrooms);

        $citysData = City::latest()->get();
        $citys = [];

       
        foreach($citysData  as  $cityData ){
            $citys[] =["count"=>$cityData->users()->has("student")->count(),"label"=>$cityData->name] ;
        }
        $data["citys"] = json_encode($citys);

        return view("dashboard.analytics.analytics",compact('data','year'));
    }

     public function reportStudentsCitys($year = "all")
    {
        $data = [];
        $citys = City::latest()->get();
        foreach( $citys as  $city){
            $data[] = 
                [
                    "name"=>$city->name,
                    "studentsCount"=>$city->users()->where(function($q) use($year){
                        if($year !="all"){
                            $q->whereYear("created_at",$year);
                        }
                    })->has("student")->count()
                ];
        }
   
       $pdf = \PDF::loadView('pdf.students-city', compact('data'));
       return $pdf->download('students-citys-'.$year.'.pdf');
    }

    public function onlineUsers()
    {
        $user = new User;
        $onlineUsers = $user->allOnline();

        return view('dashboard.analytics.onlineusers', compact('onlineUsers'));
    }
}
