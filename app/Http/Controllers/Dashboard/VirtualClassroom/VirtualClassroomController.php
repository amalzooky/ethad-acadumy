<?php

namespace App\Http\Controllers\Dashboard\VirtualClassroom;

use Validator;
use App\StudentClass;
use mikemix\Wiziq;
use App\VirtualClassroom;
use App\Lecture;
use App\Subject;
use App\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcademicYear;
use Carbon\Carbon;
use MacsiDigital\Zoom\Zoom;

class VirtualClassroomController extends Controller
{

    public function index()
    {
        $years = AcademicYear::latest()->get();
        return view('dashboard.virtualClassroom.index', compact('years'));
    }

    public function create()
    {

        if(auth()->user()->hasRole('teacher')){
            $subjects = Subject::whereHas('teachers',function($q){
                $q->where("teacher_id",auth()->user()->teacher->id);
            })->where('is_active', 1)->get();
        }else{
            $subjects = Subject::where('is_active', 1)->get();
        }

        return view('dashboard.virtualClassroom.create', compact('subjects'));
    }

    private function wiziqConfig()
    {
        $auth    = new Wiziq\API\Auth(config('wiziq.secret_Key'), config('wiziq.access_key'));
        $gateway = new Wiziq\API\Gateway($auth);
        $api     = new Wiziq\API\ClassroomApi($gateway);

        return $api;
    }

    private function createWiziqClass($request)
    {
        $lecture = Lecture::findOrFail($request->lecture_id);
        $teacher = $lecture->teacher->user;
        $classTitle = $request->title;

        $api = $this->wiziqConfig();
        $startTimeWiziq = Carbon::parse($request->start_time)->format("m/d/Y H:i");
        try {
            $classroom = Wiziq\Entity\Classroom::build($classTitle, new \DateTime($startTimeWiziq))
                ->withPresenter($teacher->id, $teacher->full_name)
                // ->withPresenterEmail('') // email from wiziq
                ->withDuration(300)
                ->withAttendeeLimit($request->attendee_limit)
                ->withCreateRecording($request->create_recording)
                ->withTimeZone('Asia/Jerusalem');
                
        
            $response  = $api->create($classroom);
            return $response;
            // printf('Class %s created: %s', $classroom, var_export($response, true));
        } catch (Wiziq\Common\Api\Exception\CallException $e) {
            die($e->getMessage()); // change to return false
        } catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
            die($e->getMessage()); // change to return false
        }


    }

    private function addAttendees($classID, $students)
    {
        $api = $this->wiziqConfig();
    
        try {   
            $classroomId = $classID;

            $attendees = Wiziq\Entity\Attendees::build();

            foreach($students as $student){
                $attendees = $attendees->add($student->id, $student->user->full_name, 'ar-SA');
            }
        
            $response = $api->addAttendeesToClass($classroomId, $attendees);
             return $response;
            // printf('Attendees to class %d added: %s', $classroomId, var_export($response, true));
        } catch (Wiziq\Common\Api\Exception\CallException $e) {
            die($e->getMessage());
        } catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
            die($e->getMessage());
        }
    }

    private function webinarConfig($account){

        $api_version = config("gotowebinar.{$account}.api_version");
        switch ($api_version) {
            case '2':
            return [
                'form_params' => [
                    "grant_type"=>"password",
                    "user_id"=>config("gotowebinar.{$account}.user_id"),
                    "password"=>config("gotowebinar.{$account}.password"),
                    "client_id"=>config("gotowebinar.{$account}.client_id"),
                    'api_version' => config("gotowebinar.{$account}.api_version")
                ]
            ];
            case '3':
            return [
                'form_params' => [
                    "grant_type"=>"password",
                    "username"=>config("gotowebinar.{$account}.user_id"),
                    "password"=>config("gotowebinar.{$account}.password"),
                    'api_version' => config("gotowebinar.{$account}.api_version")
                ]
            ];
            
            default:
                return false;
                break;
        }

    }

    private function headers($access_token)
    {
        return $headers = [
            'headers' => [
                'content-type' => 'application/json',
                'accept' => 'application/json',
                'Authorization' => $access_token 
            ]
        ];
    }

    private function createWebinar($request){
        $config = $this->webinarConfig($request->webinar_account);
        if($config['form_params']['api_version'] == 2){
            $client = new \GuzzleHttp\Client(); 
            $res = $client->request('POST', 'https://api.getgo.com/oauth/access_token', $config);
        }else if($config['form_params']['api_version'] == 3){
            $client = new \GuzzleHttp\Client([
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded', 
                    'Authorization' => 'Basic SFVEYXNDTklrN0FNSUNRRTVCdW1Sc05KeHhsbWg1aTE6d1psRDVYN3VzNnRpUjUyTQ==',
                ]
            ]); 

            $res = $client->request('POST', 'https://api.getgo.com/oauth/v2/token', $config);
        }
        
       

        $auth = json_decode($res->getBody());
        $access_token = $auth->access_token;
        $organizer_key = $auth->organizer_key;           
       
        if(settings()->time == 1){
            $startTime = Carbon::parse($request->start_time)->subHour(3)->format('Y-m-d\TH:i:s\Z');
            $endTime = Carbon::parse($request->webinar_end_time)->subHour(3)->format('Y-m-d\TH:i:s\Z');
        }else if(settings()->time == 2){
            $startTime = Carbon::parse($request->start_time)->subHour(2)->format('Y-m-d\TH:i:s\Z');
            $endTime = Carbon::parse($request->webinar_end_time)->subHour(2)->format('Y-m-d\TH:i:s\Z');
        }else{
            $startTime = Carbon::parse($request->start_time)->subHour(2)->format('Y-m-d\TH:i:s\Z');
            $endTime = Carbon::parse($request->webinar_end_time)->subHour(2)->format('Y-m-d\TH:i:s\Z');
        }
       
        

        $arr = [
            'subject' => $request->title,
            'description' => $request->description,
            'times' => [
                [
                    "startTime" => $startTime,
                    "endTime" => $endTime
                ]
            ],
            "timeZone" => "Asia/Jerusalem"
        ];



        $client2 = new \GuzzleHttp\Client($this->headers($access_token));
        $res2 = $client2->post("https://api.getgo.com/G2W/rest/organizers/{$organizer_key}/webinars",['json' => $arr]);

        $webinarKey = json_decode($res2->getBody(), true)['webinarKey'];

        return [
            'webinarKey' => $webinarKey,
            'access_token' => $access_token,
            'organizer_key' => $organizer_key

        ];
    }


    private function getWebinar($webinarKey, $accessToken, $organizerKey)
    {
        $client = new \GuzzleHttp\Client($this->headers($accessToken));
        $res = $client->get("https://api.getgo.com/G2W/rest/organizers/{$organizerKey}/webinars/{$webinarKey}");

        $webinar = json_decode($res->getBody(), true);
        return $webinar['registrationUrl'];
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'lecture_id' => 'required',
            'start_time' => 'required',
            'attendee_limit' => 'required|numeric',
            'extend_duration' => 'Nullable|numeric',
            'create_recording' => 'required',
        ]);

        $attributeNames =  [
            'title' => __('dashboard.virtual_classroom.title'),
            'lecture_id' => __('dashboard.virtual_classroom.lecture_id'),
            'start_time' => __('dashboard.virtual_classroom.start_time'),
            'extend_duration' => __('dashboard.virtual_classroom.extend_duration'),
            'attendee_limit' => __('dashboard.virtual_classroom.attendee_limit'),
            'create_recording' => __('dashboard.virtual_classroom.create_recording'),
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

        $virtualClassroom = new VirtualClassroom;
        $virtualClassroom->title = $request->title;
        $virtualClassroom->lecture_id = $request->lecture_id;
        $virtualClassroom->start_time = $request->start_time;
        $virtualClassroom->webinar_description  = $request->webinar_description;
        $virtualClassroom->webinar_end_time  = $request->webinar_end_time;
        $virtualClassroom->user_id = auth()->id();

        if($webinarResponse = $this->createWebinar($request)){
            $webinarKey = $webinarResponse['webinarKey'];
            $accessToken = $webinarResponse['access_token'];
            $organizerKey = $webinarResponse['organizer_key'];

            if($webinarUrl = $this->getWebinar($webinarKey, $accessToken, $organizerKey)){
                if($wiziqResponse = $this->createWiziqClass($request)){
                    $virtualClassroom->class_id = $wiziqResponse['class_id'];
                    $virtualClassroom->recording_url = $wiziqResponse['recording_url'];
                    $virtualClassroom->presenter_url = $wiziqResponse['presenter_url'];
                    $virtualClassroom->webinar_url  = $webinarUrl;
                    
                    if($virtualClassroom->save()){
                        $subject = Subject::findOrFail($request->subject_id);
                        $students = $subject->students; 
                        $wiziqResponse = $this->addAttendees($wiziqResponse['class_id'], $students);
        
                        if(!empty($wiziqResponse)){
                            $studentClassData = [];
                            foreach($wiziqResponse as $user){
                                $studentClassData[] = [
                                    "virtual_classroom_id"=>$virtualClassroom->id,
                                    "url"=>$user["url"],
                                    "student_id"=>$user["id"],                           
                                ];
                            }
                            StudentClass::insert($studentClassData);
                        }
                    }
                }
            }// end getWebinar if
        }// end createWebinar if

        session()->flash('success', __('dashboard.statuses.virtual_classroom_created'));
        if(auth()->user()->hasRole('teacher')){
            return response()->json(["redir"=>route('dashboard.home')]);
        }

        return response()->json(["redir"=>route('virtual-classroom.index')]);

    }



    public function getSubjectsByYear($id)
    {   
        $year = AcademicYear::findOrFail($id)->year; 
        $subjects = Subject::whereHas('academicYear', function($query){
            $query->where('academic_year_id', request()->year);
        })->get();
        return view('dashboard.virtualClassroom.subjects', compact('subjects', 'year'));
    }

    public function getClassRoomsByYear($subject_id,$year)
    {

        $virtualClassrooms = VirtualClassroom::whereHas('lecture', function($query) use ($subject_id){
            $query->where('subject_id', $subject_id);
        })->whereYear('created_at', $year)->latest()->get();

        return view('dashboard.virtualClassroom.virtual_classrooms', compact('virtualClassrooms'));
    }

    public function getLecturesBySubject()
    {
        $lectures = Lecture::whereHas('subject', function($query){
            $query->where('subject_id', request()->subject_id);
        })->get();

        return response()->json([
            'lectures' => $lectures
        ]);
    }

    public function wiziq()
    {
        
        if(auth()->user()->hasRole('teacher')){
            $subjects = Subject::whereHas('teachers',function($q){
                $q->where("teacher_id",auth()->user()->teacher->id);
            })->where('is_active', 1)->get();
        }else{
            $subjects = Subject::where('is_active', 1)->get();
        }

        return view('dashboard.wiziq', compact('subjects'));
    }

    public function storeWiziq(Request $request)
    {
        $virtualClassroom = new VirtualClassroom;
        $virtualClassroom->title = $request->title;
        $virtualClassroom->lecture_id = $request->lecture_id;
        $virtualClassroom->start_time = $request->start_time;
        $virtualClassroom->user_id = auth()->id();

        if($wiziqResponse = $this->createWiziqClass($request)){
            $virtualClassroom->class_id = $wiziqResponse['class_id'];
            $virtualClassroom->recording_url = $wiziqResponse['recording_url'];
            $virtualClassroom->presenter_url = $wiziqResponse['presenter_url'];
            
            if($virtualClassroom->save()){
                $subject = Subject::findOrFail($request->subject_id);
                $students = $subject->students; 
                $wiziqResponse = $this->addAttendees($wiziqResponse['class_id'], $students);

                if(!empty($wiziqResponse)){
                    $studentClassData = [];
                    foreach($wiziqResponse as $user){
                        $studentClassData[] = [
                            "virtual_classroom_id"=>$virtualClassroom->id,
                            "url"=>$user["url"],
                            "student_id"=>$user["id"],                           
                        ];
                    }
                    StudentClass::insert($studentClassData);
                }
            }
        }

        session()->flash('success', __('dashboard.statuses.virtual_classroom_created'));
        if(auth()->user()->hasRole('teacher')){
            return response()->json(["redir"=>route('dashboard.home')]);
        }

        return response()->json(["redir"=>route('virtual-classroom.index')]);
    }

    public function webinar()
    {
        
       
        if(auth()->user()->hasRole('teacher')){
            $subjects = Subject::whereHas('teachers',function($q){
                $q->where("teacher_id",auth()->user()->teacher->id);
            })->where('is_active', 1)->get();
        }else{
            $subjects = Subject::where('is_active', 1)->get();
        }

        return view('dashboard.webinar', compact('subjects'));
    }

    public function storeWebinar(Request $request)
    {
        
        $virtualClassroom = new VirtualClassroom;
        $virtualClassroom->title = $request->title;
        $virtualClassroom->lecture_id = $request->lecture_id;
        $virtualClassroom->start_time = $request->start_time;
        $virtualClassroom->webinar_description  = $request->webinar_description;
        $virtualClassroom->webinar_end_time  = $request->webinar_end_time;
        $virtualClassroom->user_id = auth()->id();

        if($webinarResponse = $this->createWebinar($request)){
            $webinarKey = $webinarResponse['webinarKey'];
            $accessToken = $webinarResponse['access_token'];
            $organizerKey = $webinarResponse['organizer_key'];

            if($webinarUrl = $this->getWebinar($webinarKey, $accessToken, $organizerKey)){
                $virtualClassroom->webinar_url  = $webinarUrl;
                $virtualClassroom->save();
            }// end getWebinar if
        }// end createWebinar if

        session()->flash('success', __('dashboard.statuses.virtual_classroom_created'));
        if(auth()->user()->hasRole('teacher')){
            return response()->json(["redir"=>route('dashboard.home')]);
        }

        return response()->json(["redir"=>route('virtual-classroom.index')]);

    }

    public function zoom()
    {
        
       
        if(auth()->user()->hasRole('teacher')){
            $subjects = Subject::whereHas('teachers',function($q){
                $q->where("teacher_id",auth()->user()->teacher->id);
            })->where('is_active', 1)->get();
        }else{
            $subjects = Subject::where('is_active', 1)->get();
        }

        return view('dashboard.zoom', compact('subjects'));
    }


    public function storeZoom(Request $request)
    {
        $zoom = new Zoom;
        $user = $zoom->user->find('abed.shuqair@gmail.com');

        $meeting = $user->meetings()->create([
            'type' => '2',
            'start_time' => $request->start_time,
            'topic' => $request->title
        ]);

       

        $virtualClassroom = new VirtualClassroom;
        $virtualClassroom->title = $request->title;
        $virtualClassroom->acount_name = $request->acount_name;

        $virtualClassroom->lecture_id = $request->lecture_id;
        $virtualClassroom->start_time = $request->start_time;
        $virtualClassroom->zoom_join_url = $meeting->join_url;
        $virtualClassroom->user_id = auth()->id();
        $virtualClassroom->save();

        session()->flash('success', __('dashboard.statuses.virtual_classroom_created'));
        if(auth()->user()->hasRole('teacher')){
            return response()->json(["redir"=>route('dashboard.home')]);
        }

        return response()->json(["redir"=>route('virtual-classroom.index')]);
    }

    public function zoomWiziq()
    {
        
        if(auth()->user()->hasRole('teacher')){
            $subjects = Subject::whereHas('teachers',function($q){
                $q->where("teacher_id",auth()->user()->teacher->id);
            })->where('is_active', 1)->get();
        }else{
            $subjects = Subject::where('is_active', 1)->get();
        }

        return view('dashboard.zoom_wiziq', compact('subjects'));
    }

    public function zoomWiziqStore(Request $request)
    {
        
        $virtualClassroom = new VirtualClassroom;
        $virtualClassroom->title = $request->title;
        $virtualClassroom->lecture_id = $request->lecture_id;
        $virtualClassroom->start_time = $request->start_time;
        $virtualClassroom->user_id = auth()->id();

        if($wiziqResponse = $this->createWiziqClass($request)){
            $zoom = new Zoom;
            $user = $zoom->user->find('abed.shuqair@gmail.com');
    
            $meeting = $user->meetings()->create([
                'type' => '2',
                'start_time' => $request->start_time,
                'topic' => $request->title
            ]);

            $virtualClassroom->zoom_join_url = $meeting->join_url;
            $virtualClassroom->class_id = $wiziqResponse['class_id'];
            $virtualClassroom->recording_url = $wiziqResponse['recording_url'];
            $virtualClassroom->presenter_url = $wiziqResponse['presenter_url'];
            
            if($virtualClassroom->save()){
                $subject = Subject::findOrFail($request->subject_id);
                $students = $subject->students; 
                $wiziqResponse = $this->addAttendees($wiziqResponse['class_id'], $students);

                if(!empty($wiziqResponse)){
                    $studentClassData = [];
                    foreach($wiziqResponse as $user){
                        $studentClassData[] = [
                            "virtual_classroom_id"=>$virtualClassroom->id,
                            "url"=>$user["url"],
                            "student_id"=>$user["id"],                           
                        ];
                    }
                    StudentClass::insert($studentClassData);
                }
            }
        }else{
            return response()->json('error');
        }

        session()->flash('success', __('dashboard.statuses.virtual_classroom_created'));
        if(auth()->user()->hasRole('teacher')){
            return response()->json(["redir"=>route('dashboard.home')]);
        }

        return response()->json(["redir"=>route('virtual-classroom.index')]);
    }

    
}
