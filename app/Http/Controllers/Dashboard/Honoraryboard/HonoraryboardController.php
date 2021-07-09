<?php

namespace App\Http\Controllers\Dashboard\Honoraryboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HonoraryBoard;
use Validator;

class HonoraryboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $honoraryboards = HonoraryBoard::latest()->get();
        return view("dashboard.honoraryboard.index",compact('honoraryboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("dashboard.honoraryboard.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'marker' => 'required',
            'year' => 'required',
            "university"=>"required",
            "major"=>"required"
        ]);
        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }
        
        $image= request()->image;
   

        $is_active = $request->get('is_active', 0);

        HonoraryBoard::create([
            'name' => $request->name,
            'image' => $image,
            'year' => $request->year,
            'marker' => $request->marker,
            "university"=>$request->university,
            "major"=>$request->major,
            "is_active"=>$is_active,
            'interview_url' => $request->interview_url
        ]);

        session()->flash('success', __('dashboard.statuses.honoraryboard_created'));
        return response()->json(["redir"=>route('honoraryboards.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HonoraryBoard $honoraryboard)
    {
        return view("dashboard.honoraryboard.edit",compact('honoraryboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HonoraryBoard $honoraryboard)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'marker' => 'required',
            'year' => 'required',
            "major"=>"required",
            "university"=>"required"
        ]);
        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }
        

        $honoraryboard->image = request()->image;
        $is_active = $request->get('is_active', 0);

        $honoraryboard->name = $request->name;
        $honoraryboard->year = $request->year;
        $honoraryboard->marker = $request->marker;
        $honoraryboard->interview_url = $request->interview_url;
        $honoraryboard->is_active= $is_active;
        $honoraryboard->university = $request->university;
        $honoraryboard->major = $request->major;
        $honoraryboard->save();
        session()->flash('success', __('dashboard.statuses.honoraryboard_updated'));
        return response()->json(["redir"=>route('honoraryboards.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( HonoraryBoard $honoraryboard)
    {
        $honoraryboard->delete();
        session()->flash('success', __('dashboard.statuses.honoraryboard_delete'));
    }

    public function activation()
    {
        
        $id = request()->id;
        
        $honoraryBoard = HonoraryBoard::findOrFail($id);

        if($honoraryBoard->is_active == 1){
            $honoraryBoard->is_active = 0;           
        } else {
            $honoraryBoard->is_active= 1;
        }
        $honoraryBoard->save();
        return response()->json([
            'success' =>  __('dashboard.statuses.honoraryboard_activation')
        ]);
        
              
    }
}
