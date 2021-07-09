<?php

namespace App\Http\Controllers\Dashboard\pages;

use App\Http\Requests\CoursesRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class NewslettersController extends Controller
{
    private $excel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view ('dashboard.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('dashboard.courses.create');
    }


    public function store(CoursesRequest $request)
    {
//        return $request;

        if($request->has('photo')){
            $filename =  $request->photo->getClientOriginalName();
            $image = $request->photo->storePubliclyAs('public/uploads/staff/avatar', $filename);
            $photo = 'storage/uploads/staff/avatar/' . $filename;
        }


        $abouts = Course::create([
            'photo' => $photo,
            'cour_name' => $request->cour_name,
            'cour_text' => $request->cour_text,
            'price' => $request->price,
            'cout_time' => $request->cout_time,
            'cour_duration' => $request->cour_duration,
            'is_active' => $request->is_active,

        ]);

//        dd($sliders);
        session()->flash('success', __('dashboard.statuses.course_created'));

        return response()->json(["redir"=>route('courses.index')]);


    }
    public function show($id)
    {
        //
    }


    public function edit($cors_id)
    {
        $cours = Course::find($cors_id);

        if (!$cours)
            session()->flash('success', __('هذا القسم غير موجود'));

        return response()->json(["redir"=>route('courses.edit')]);
    }
    public  function update($cours_id ,CoursesRequest  $request)

    {

        try {
            $courses = Course::find($cours_id);
            if (!$courses)
                session()->flash('success', __('هذا القسم غير موجود'));

            return response()->json(["redir"=>route('courses.index')]);

            //update data
            $courses->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                Course::where('id', $about_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            session()->flash('success', __('تم ألتحديث بنجاح'));

            return response()->json(["redir"=>route('courses.index')]);


        } catch (\Exception $ex) {
            session()->flash('success', __('حدث خطا ما برجاء المحاوله لاحقا'));

            return response()->json(["redir"=>route('courses.index')]);

        }
    }
    public function destroy($id)
    {

        try {
            $course = Course::find($id);
            if (!$course)
                session()->flash('success', __('هذا القسم غير موجود'));
            $images = explode(',', $course->photo);
            foreach ($images as $image){
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists){
                    unlink('upimages/abouts/' . $image);
                }
            }



            $course->delete();
            session()->flash('success', __('تم حذف القسم بنجاح'));

            return response()->json(["redir"=>route('courses.index')]);
        } catch (\Exception $ex) {
            session()->flash('success', __('حدث خطا ما برجاء المحاوله لاحقا'));

            return response()->json(["redir"=>route('courses.index')]);
        }
    }


}

