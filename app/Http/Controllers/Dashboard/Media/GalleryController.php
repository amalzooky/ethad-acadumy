<?php

namespace App\Http\Controllers\Dashboard\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GalleryCategory;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('dashboard.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = GalleryCategory::latest()->get();
        return view('dashboard.galleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'category_id' => 'required',
            'media_type' => 'required',
        ]);

        $attributeNames =  [
            'category_id' => 'التصنيف',
            'media_type' => 'نوع الميديا',
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
        $filePath = "";
        if ($request->has('image_type_input')) {

            $filePath = uploadImage('abouts', $request->image_type_input);
        }
        $gallery = new Gallery;
        $gallery->media_type = $request->media_type;
        $gallery->gallery_category_id = $request->category_id;
        $gallery->is_active = $request->get('is_active', 0);

        if($request->media_type == 1){
            $gallery->media = $filePath;
        }

        if($request->media_type == 2){
            $gallery->media = $request->video_type_input;
        }

        $gallery->save();

        session()->flash('success', 'تم إضافة ميديا بنجاح');

        return response()->json(["redir"=>route('galleries.index')]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        session()->flash('success', 'تم الحذف بنجاح');

        // return response()->json(["redir"=>route('sliders.index')]);
    }

    public function activation()
    {
        $id = request()->id;

        $gallery = Gallery::findOrFail($id);
        if($gallery->is_active == 1){
            $gallery->is_active = 0;
        } else {
            $gallery->is_active = 1;
        }

       if($gallery->save()){
        return response()->json([
            'success' =>  'تم تغير الحالة بنجاح'
        ]);
       }
    }
}
