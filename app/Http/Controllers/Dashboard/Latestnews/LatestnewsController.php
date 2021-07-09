<?php

namespace App\Http\Controllers\Dashboard\Latestnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Latestnews;
use Validator;

class LatestnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestnews = Latestnews::latest()->get();
        return view("dashboard.latestnews.index",compact('latestnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.latestnews.create");

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
            'title' => 'required|unique:latestnews',
            'description' => 'required',
            'image' => 'required'
        ]);

        $attributeNames =  [
            'title' => __('dashboard.latestnews.title'),
            'description' => __('dashboard.latestnews.description'),
            'image' => __('dashboard.latestnews.image')
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

        $is_active = $request->get('is_active', 0);

        $latestnews = new Latestnews;
        $latestnews->title = $request->title;
        $latestnews->description = $request->description;
        $latestnews->image = $request->image;
        $latestnews->is_active = $is_active;
        $latestnews->save();
        session()->flash('success', __('dashboard.statuses.latestnews_created'));

        return response()->json(["redir"=>route('latestnews.index')]);
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
    public function edit(Latestnews $latestnews)
    {
        return view("dashboard.latestnews.edit",compact('latestnews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latestnews $latestnews)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:latestnews,title,' . $latestnews->id,
            'description' => 'required',
            'image' => 'required|url'
        ]);

        $attributeNames =  [
            'title' => __('dashboard.latestnews.title'),
            'description' => __('dashboard.latestnews.description'),
            'image' => __('dashboard.latestnews.image')
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

        $is_active = $request->get('is_active', 0);

        $latestnews->title = $request->title;
        $latestnews->description = $request->description;
        $latestnews->image = $request->image;
        $latestnews->is_active = $is_active;
        $latestnews->save();
        session()->flash('success', __('dashboard.statuses.laestnews_edited'));

        return response()->json(["redir"=>route('latestnews.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latestnews $latestnews)
    {
        $latestnews->delete();
        session()->flash('success', __('dashboard.statuses.laestnews_deleted'));
    }

    public function activation()
    {
        $id = request()->id;

        $latestnews = Latestnews::findOrFail($id);
        if($latestnews->is_active == 1){
            $latestnews->is_active = 0;
        } else {
            $latestnews->is_active = 1;
        }

       if($latestnews->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.latestnews_activation')
        ]);
       }
    }

    public function uploadImage()
    {
        $response = \FroalaEditor\Image::upload('/storage/uploads/latestnews/images/');
        echo stripslashes(json_encode($response));
    }

    public function removeImage()
    {
        $response = \FroalaEditor\Image::delete(request()->src);
        echo stripslashes(json_encode($response));
    }
}
