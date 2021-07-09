<?php

namespace App\Http\Controllers\Dashboard;

use App\Lecture;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\StudentNews;
use App\Student;
use App\Message;
use DB;
use App\User;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();
        if($user->hasRole("student")){

            $student = Student::where('user_id', $user->id)->first();

            $allNews = StudentNews::where('major_id', 0)->orwhereHas('major', function($q) use ($student){
                $q->where('major_id', $student->major->id);
            })->latest()->take(10)->get();


            return view('dashboard.index', compact('allNews'));
        }
        $studensCount = [
            "students"=>Student::count(),
            "active"=>Student::whereHas("user",function($q){
                $q->where("is_active",1);
            })->count(),
            "inactive"=>Student::whereHas('user',function($q){
                $q->where("is_active",0);
            })->count()
        ];

        $topBoxs = [
            "studnets"=>\App\Student::get()->count(),
            "teachers"=>\App\Teacher::get()->count(),
            "subjects"=>\App\Subject::get()->count(),
            "lectures"=>\App\Lecture::get()->count(),
            'latestnews' => \App\Latestnews::get()->count(),
            'honoraryboard' => \App\HonoraryBoard::get()->count(),
            "staffs"=>\App\Staff::get()->count(),
            "virtual_classroom"=> $user->hasRole("teacher") ? \DB::table("virtual_classrooms")->where("user_id",$user->id)->count() :\DB::table("virtual_classrooms")->count(),
        ];

        $lastTenStudents = Student::latest()->limit(10)->get();
        $lastTenMessages = Message::latest()->limit(10)->get();
        $user = new User;
        $onlineUsers = $user->allOnline()->count();
        return view('dashboard.index',compact('studensCount','topBoxs', 'lastTenStudents', 'lastTenMessages', 'onlineUsers'));
    }

    public function profileIndex()
    {

        return view('dashboard.profile.index');
    } public function certificateIndex()
    {
        $user = auth()->user();
        if($user->hasRole("student")){

            $student = Student::where('user_id', $user->id)->first();
            $subjects = auth()->user()->student->subjects()->first();




            return view('dashboard.profile.certificate', compact('subjects'));
        }
        return view('dashboard.profile.certificate', compact( 'subjects'));
    }

    public function resetPassword(){
        $oldPassword = request()->oldPassword;
        $newPassword = request()->newPassword;

        $validator = \Validator::make(request()->all(), [
            'oldPassword' => ['required', 'string'],
            'newPassword' => ['required', 'string', 'min:6']
        ]);

        $attributeNames =  [
            'oldPassword' => __('global.old_password'),
            'newPassword' => __('global.new_password'),
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

        if(Hash::check($oldPassword,auth()->user()->password)){

            $user = \App\User::where("id",auth()->user()->id)->update([
                "password"=>Hash::make($newPassword)
            ]);
            $response = [
                "msg"=>[
                    "type"=>"success",
                    "body"=>__("global.Password_updated_successfully")
                ],
                "reset"=>true
            ];
        }else{
            $response = [
                "msg"=>[
                    "type"=>"error",
                    "body"=>__("global.Password_is_wrong")
                ]
            ];
        }

        return response()->json($response);
    }
}
