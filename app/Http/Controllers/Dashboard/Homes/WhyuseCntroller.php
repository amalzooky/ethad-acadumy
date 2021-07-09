<?php

namespace App\Http\Controllers\Dashboard\Homes;

use App\Http\Requests\CoursesRequest;
use App\Http\Requests\WhyuseRequest;
use App\Models\Course;
use App\Models\Whyuse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class WhyuseCntroller extends Controller
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
        $whyuse = Whyuse::latest()->get();
        return view('dashboard.whyus.index', compact('whyuse'));
    }

    public function create()
    {
        return view('dashboard.whyus.create');
    }


    public function store(WhyuseRequest $request)
    {
//        return $request;

        if ($request->has('photo')) {
            $filename = $request->photo->getClientOriginalName();
            $image = $request->photo->storePubliclyAs('public/uploads/staff/avatar', $filename);
            $photo = 'storage/uploads/staff/avatar/' . $filename;
        }


        $abouts = Whyuse::create([
            'photo' => $photo,
            'title' => $request->title,
            'text' => $request->text,
            'is_active' => $request->is_active,

        ]);

//        dd($sliders);
        session()->flash('success', __('dashboard.statuses.whyus_created'));

        return response()->json(["redir" => route('whyuse.index')]);


    }

    public function show($id)
    {
        //
    }


    public function edit($about_id)
    {
        $abouts = Abouts::find($about_id);

        if (!$abouts)
            return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);

        return view('admin.pages.aboutes.edit', compact('abouts'));
    }

    public function update($about_id, AboutRequest $request)

    {

        try {
            $abouts = Abouts::find($about_id);
            if (!$abouts)
                return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);
            //update data
            $abouts->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                Abouts::where('id', $about_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            return redirect()->route('admin.about')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {

        try {
            $abouts = Abouts::find($id);
            if (!$abouts)
                return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $abouts->photo);
            foreach ($images as $image) {
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists) {
                    unlink('upimages/abouts/' . $image);
                }
            }


            $abouts->delete();
            return redirect()->route('admin.about')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
