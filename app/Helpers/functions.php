<?php

use Vinkla\Hashids\Facades\Hashids;

function formatDT($date){
    if(is_string($date)){
        return \Carbon\Carbon::parse($date)->toFormattedDateString();
    }
    return $date->toFormattedDateString();
}

function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
}

if(!function_exists('settings')){
    function settings()
    {
        return App\Setting::first();
    }
}


function dateForhuman($date)
{
    return $date->diffForHumans();
}

function hashEncodeNumber($number){return Hashids::encode($number);}
function hashDecodeNumber($hash){return Hashids::decode($hash);}

function array2String($array){
    $string = http_build_query($array);
    $string = \Crypt::encrypt($string);
    $string = rawurlencode($string);
    return $string;
}

function string2Array($string){
    try{
        $string = rawurldecode($string);
        $string = \Crypt::decrypt($string);

    }catch(\Illuminate\Encryption\DecryptException  $e){
        return abort(401);
    }
    parse_str($string, $array);
    return $array;
}


function getDatesBetweenTowDates(){
   
    $nowDate = \Carbon\Carbon::now()->format('Y-m-d');
    $period = \Carbon\CarbonPeriod::create(
        date("Y-m-d",strtotime('-2 month '.$nowDate )),
        $nowDate 
        );
    $dates = [];
    foreach ($period as $date) {
        $dates[] = $date->format('Y-m-d');
    }
    return $dates;
}



function sendMessageData($to, $data, $multiSend = "to")
{
    $url = config("firebase.send_message_url");
    $fields = array();
    $fields[$multiSend] = $to;
    $fields["data"] = $data;
    $headers = array(
        'Authorization:key = ' . config("firebase.server_key"),
        'Content-Type: application/json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === false) {
        return "ERROR";
    }
    curl_close($ch);
    return $result;
}

function sendNotify($to, $notification, $actions = [])
{
    $url = config("firebase.send_message_url");
    $fields = array();
    $fields["to"] = $to;
    $fields["notification"] = $notification;
    $headers = array(
        'Authorization:key = ' . config("firebase.server_key"),
        'Content-Type: application/json',
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === false) {
        return "ERROR";
    }
    curl_close($ch);
    return $result;
}

function sendDataWithNotify($registration_ids, $notification, $data = [])
{
    $url = config("firebase.send_message_url");
    $fields = array();
    $fields["registration_ids"] = $registration_ids;
    $fields["notification"] = $notification;
    $fields["data"] = $data;
    $headers = array(
        'Authorization:key = ' . config("firebase.server_key"),
        'Content-Type: application/json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === false) {
        return "ERROR";
    }
    curl_close($ch);
    return $result;
}


