<?php

namespace App\Http\Controllers\Dashboard\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view("dashboard.media.index");
    }

    public function ifream(){
        return view("dashboard.media.ifream");
    }
    public function picker(){
        $id = request()->id;
        $preview = request()->preview;
        return view("dashboard.media.picker",compact('id','preview'));
    }
}
