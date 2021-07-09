<?php

namespace App\Http\Controllers\Dashboard\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::latest()->get();
        return view('dashboard.sliders.index', compact('slides'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(Request $request)
    {
//        return $request;
        $validator = \Validator::make($request->all(), [
            'image' => 'required',
        ]);


        $filePath = "";
        if ($request->has('image')) {

            $filePath = uploadImage('abouts', $request->image);
        }

        if($validator->fails()){
            return response()->json([
                "msg"=>[
                "type"=>"error",
                "body"=>$validator->messages()->first()
                ]
            ]);
        }

        $slide = new Slider;

        $slide->image = $filePath;
        $slide->title = $request->title;
        $slide->desc = $request->desc;
        $slide->is_active = $request->get('is_active', 0);
        $slide->save();

        session()->flash('success', 'تم إضافة شريحة بنجاح');
        return redirect()->route('sliders.index')->with(['success' => 'تم الحفظ بنجاح']);

    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        session()->flash('success', 'تم حذف الشريحة بنجاح');

        return response()->json(["redir"=>route('sliders.index')]);
    }

    public function activation()
    {
        $id = request()->id;

        $slider = Slider::findOrFail($id);
        if($slider->is_active == 1){
            $slider->is_active = 0;
        } else {
            $slider->is_active = 1;
        }

       if($slider->save()){
        return response()->json([
            'success' =>  'تم تغير حالة الشريحة بنجاح'
        ]);
       }
    }
}
