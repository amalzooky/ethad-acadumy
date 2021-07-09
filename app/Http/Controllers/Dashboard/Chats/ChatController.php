<?php

namespace App\Http\Controllers\Dashboard\Chats;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Student;
use App\Teacher;

use App\Chat;
use App\ChatMessages;
use App\FirebaseToken;
use App\User;

class ChatController extends Controller
{
    public function index($user_id = 0){
        $user = auth()->user();
        $role = "owner";
        
        $to_id = "";
        $chat = false;
        if($user_id){
            $sl = string2array($user_id);
            $user_id = $sl["to_id"];
            $to_type =  $sl["to_type"];
            $to_id = $user_id;

        }
        if($user->hasRole("student")){
            $role = "student";
            $from_type = "students";
        }else if($user->hasRole("teacher")){
            $role = "teacher";
            $from_type = "teachers";
        }else{
            if($user_id){
                $chat = Chat::where("from","system")->where("to_id",$to_id)->first();
                if(!$chat){
                    $chat = new Chat;
                    $chat->from_id = $user->id;
                    $chat->to_id = $to_id;
                    $chat->from = "system";
                    $chat->to = $to_type;
                    $chat->save();
                }
            }
        }

        if($user_id && $user->hasRole("") || $user->hasRole("")){
            $chat = Chat::where(function($q) use ($user,$to_id){
                $q->where("from_id",$user->id);
                $q->where("to_id",$to_id);
            })->orWhere(function($q) use ($user,$to_id){
                $q->where("to_id",$user->id);
                $q->where("from_id",$to_id);
            })->first();
            if(!$chat){
                $chat = new Chat;
                $chat->from_id = $user->id;
                $chat->to_id = $to_id;
                $chat->from =  $from_type;
                $chat->to = $to_type;
                $chat->save();
            }
        }
        if($chat){
            $chat = [
                "id"=>array2string(["to_id"=>$user_id]) ,
                "mode"=>"students",
                "chat_id"=>array2string(["chat_id"=>$chat->id]) ,
            ];

            $chat = json_encode($chat);
        }
        return view("dashboard.chats.index",compact('role','chat'));
    }

    public function getChatsList(){
        $user = auth()->user();
        $mode = request()->mode;
        $skip = request()->get("skip",0);

        if($user->hasRole("student") || $user->hasRole("teacher")){
            return response()->json($this->getChatsSAT($mode,$skip));
        }else{
            return response()->json($this->getChatsAdmin($mode,$skip));
        }
    }

    public function searchChatsList(){
        $user = auth()->user();
        $mode = request()->mode;
        $search = request()->get("search",false);
        $skip = request()->get("skip",0);

        if($user->hasRole("student") || $user->hasRole("teacher")){
            return response()->json($this->getChatsSAT($mode,$skip,$search));
        }else{
            return response()->json($this->getChatsAdmin($mode,$skip,$search));
        }
    }

    public function getChatsAdmin($mode,$skip,$search=false){
        switch($mode){
            case "students":
            return $this->getStudents($skip,$search);
            break;
            case "teachers":
            return $this->getTeachers($skip,$search);
            break;
            case "groups":
            return $this->getGroups($skip,$search);
            break;
        }
    }

    
    public function getChatsSAT($mode,$skip,$search = false){
        switch($mode){
            case "students":
            return $this->getSATListChat($skip,$search);
            break;
            case "groups":
            return $this->getGroupsListChat($skip,$search);
            break;
        }
    }

  

    public function getGroupsListChat($skip,$search){
        $groupIds = \Groups::getUser(auth()->id())->groups->pluck("id")->toArray();
        $chatsData = Chat::latest()->skip($skip)->take(10)->whereIn("to_id",$groupIds)->where("to","groups")->get();
        $chats = [];
        foreach($chatsData as $chat){
            $group = \DB::table("groups")->where("id",$chat->to_id)->first();
            if($group){
                $chats[] = [
                    "name"=> $group->name,
                    "avatar"=>url( $group->image),
                    "id"=>array2string(["to_id"=>$chat->id]) ,
                    "mode"=>"groups",
                    "chat_id"=>array2string(["chat_id"=>$chat->id]) ,
                ];
            }
        }
        return $chats;
    }

    public function getSATListChat($skip,$search){
        $user = auth()->user();
        $to_id = $user->id;
        $to_type = $user->hasRole("student")? "students" :"teachers";
        $chat = Chat::where("from","system")->where("to_id",$to_id)->first();
        if(!$chat){
            $chat = new Chat;
            $chat->from_id = 0;
            $chat->to_id = $to_id;
            $chat->from = "system";
            $chat->to = $to_type;
            $chat->save();
        }

        $students = Chat::latest()->skip($skip)->take(10)->where(function($q) use ($user){
            $q->where("from_id",$user->id);
        })->orWhere(function($q) use ($user){
            $q->where("to_id",$user->id);
        })->get();
        foreach($students as $student){
            if($student->from == "system"){
                $chats[] = [
                    "name"=>"الاداره",
                    "avatar"=>url("/dashboard/assets/imgs/avatar-default.jpg"),
                    "id"=>array2string(["to_id"=>$student->toUser->id]) ,
                    "mode"=>"students",
                    "chat_id"=>array2string(["chat_id"=>$student->id]) ,
                ];
            }else{
                $chats[] = [
                    "name"=>$student->fromUser->full_name,
                    "avatar"=>url($student->fromUser->avatar),
                    "id"=>array2string(["to_id"=>$student->fromUser->id]) ,
                    "mode"=>"students",
                    "chat_id"=>array2string(["chat_id"=>$student->id]) ,
                ];
            }
        }
        return $chats;
    }
    public function getStudents($skip,$search){
      
            $students = Student::whereHas("user",function($q) use($search){
                if($search){
                $q->where('full_name', 'LIKE', "%$search%");
            }
            })->latest()->skip($skip)->take(10)->get();
            
        
        $chats = [];
        foreach($students as $student){
            $chats[] = [
                "name"=>$student->user->full_name,
                "avatar"=>url($student->user->avatar),
                "id"=>array2string(["to_id"=>$student->user->id]) ,
                "mode"=>"students"
            ];
        }
        return $chats;
    }
    public function getTeachers($skip,$search){
        
        $teachers = Teacher::whereHas("user",function($q) use($search){
            if($search){
                $q->where('full_name', 'LIKE', "%$search%");
            }
           
        })->latest()->skip($skip)->take(10)->get();
        $chats = [];
        foreach($teachers as $teacher){
            $chats[] = [
                "name"=>$teacher->user->full_name,
                "avatar"=>url($teacher->user->avatar),
                "id"=>array2string(["to_id"=>$teacher->user->id]),
                "mode"=>"teachers"
            ];
        }
        return $chats;
    }
    public function getGroups($skip,$search){
        $groups = \DB::table('groups')->where(function($q) use($search){
            if($search){
                $q->where('name', 'LIKE', "%$search%");
            }
        })->select('id','name', 'description', 'image', 'created_at')->skip($skip)->take(10)->get();
        $chats = [];
        foreach($groups as $group){
            $chats[] = [
                "name"=>$group->name,
                "avatar"=>url($group->image),
                "id"=>array2string(["to_id"=>$group->id]),
                "mode"=>"groups"
            ];
        }
        return $chats;
    }


    public function loadMesages(){
        $user = auth()->user();
        $to_type = request()->to_type;
        $to_id = string2array(request()->to_id)["to_id"];
        $skip = request()->get("skip",0);

        if($user->hasRole("student") || $user->hasRole("teacher")){
            $chat_id = string2array(request()->chat_id)["chat_id"];
            return $this->loadMessagesSAT($skip,$to_id,$chat_id);
        }else{
            return $this->loadMessagesSystem($skip,$to_id,$to_type);
        }

    }


    public function loadMessagesSAT($skip,$to_id,$chat_id){
        $user = auth()->user();
        $chat = Chat::find($chat_id);
        $messages = $chat->chatMessages()->skip($skip)->take(10)->with("fromUser")->get();
        return response()->json(["error"=>false,"msgs"=>$messages,"chat_id"=>$chat->id,"user_id"=>$user->id]);

    }

    public function loadMessagesSystem($skip,$to_id,$to_type){
        if($skip == 0){
            $user = auth()->user();
            $chat = Chat::where("from","system")->where("to_id",$to_id)->first();
            if(!$chat){
                $chat = new Chat;
                $chat->from_id = $user->id;
                $chat->to_id = $to_id;
                $chat->from = "system";
                $chat->to = $to_type;
                $chat->save();
            }
        }
        $messages = $chat->chatMessages()->skip($skip)->with("fromUser")->take(100)->get();
        return response()->json(["error"=>false,"msgs"=>$messages,"chat_id"=>$chat->id,"user_id"=>$user->id]);
    }

    public function sendMessage(){
        $user = auth()->user();
        $msg= request()->msg;
        $to_id = string2array(request()->to_id)["to_id"];
        $chat_id =request()->chat_id;
        $from_id = $user->id;
        $chatMessages = new ChatMessages;
        $chatMessages->from_id =$from_id;
        $chatMessages->to_id = $to_id;
        $chatMessages->message  =$msg;
        $chatMessages->chat_id = $chat_id;
        $chatMessages->save();

        $chat = Chat::find($chat_id);
        $message = ChatMessages::where("id",$chatMessages->id)->with("fromUser")->first();

        if($chat->to == "groups"){
            $group = \Groups::group($chat->to_id);
            $userIds =  $group->users->pluck('id')->toArray();
            $tokens = FirebaseToken::whereIn("user_id",$userIds)->pluck('token')->toArray();
        }else{
            $tokens = FirebaseToken::where("user_id",$to_id)->pluck('token')->toArray();;
        
        }
        $data  = [
            "key"=>"SEND_MESSAGE",
            "msg"=>$message,
            "chat_id"=>$chat_id
        ];
        $notification = [
            "title"=>"رسالة جديدة ",
            "body"=>$msg
        ];
        if(count($tokens)>0){
            sendDataWithNotify($tokens, $notification, $data );
        }
        return response()->json(["error"=>false]);
    }

    public function saveToken(){
        $token = request()->token;
        $user = auth()->user();
        if(!empty($token)){
            $firebasetoken= FirebaseToken::where("user_id",$user->id)->first();
            if(!$firebasetoken){
                $firebasetoken = new FirebaseToken;
                $firebasetoken->user_id = $user->id;
            }
            $firebasetoken->token = $token;
            $firebasetoken->save();
            return response()->json(["error"=>false]);
        }
        return response()->json(["error"=>true]);
    }
}
