<?php

namespace App\Http\Controllers\Dashboard\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GalleryCategory;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = GalleryCategory::latest()->get();

        return view('dashboard.gallery_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery_categories.create');
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
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'image' => 'required',
        ]);

        $attributeNames =  [
            'name' => 'إسم التصنيف',
            'description' => 'وصف المناسبة',
            'date' => 'تاريخ المناسبة',
            'location' => 'مكان المناسبة',
            'image' => 'صورة الغلاف'
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
        if ($request->has('image')) {

            $filePath = uploadImage('abouts', $request->image);
        }
        $category = new GalleryCategory;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->date = $request->date;
        $category->location = $request->location;
        $category->cover = $filePath;
        $category->save();

        session()->flash('success', 'تم إضافة تصنيف بنجاح');

        return response()->json(["redir"=>route('gallery-categories.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = GalleryCategory::findOrFail($id);
        $galleries = $category->galleries()->where('is_active', 1)->paginate(25);


        return view('front.gallery', compact('galleries', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = GalleryCategory::findOrFail($id);

        return view('dashboard.gallery_categories.edit', compact('category'));
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'image' => 'required',
        ]);

        $attributeNames =  [
            'name' => 'إسم التصنيف',
            'description' => 'وصف المناسبة',
            'date' => 'تاريخ المناسبة',
            'location' => 'مكان المناسبة',
            'image' => 'صورة الغلاف'
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
        if ($request->has('image')) {

            $filePath = uploadImage('abouts', $request->image);
        }
        $category = GalleryCategory::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->date = $request->date;
        $category->location = $request->location;
        $category->cover = $filePath;
        $category->save();

        session()->flash('success', 'تم تعديل التنصيف بنجاح');

        return response()->json(["redir"=>route('gallery-categories.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
