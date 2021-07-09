<?php
namespace App\Http\Controllers\Dashboard\Homes;

use App\Http\Requests\ServicessRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class ServicesCntroller extends Controller
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
        $service = Service::latest()->get();
        return view('dashboard.services.index', compact('service'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }


    public function store(ServicessRequest $request)
    {
//        return $request;

        if ($request->has('photo')) {
            $filename = $request->photo->getClientOriginalName();
            $image = $request->photo->storePubliclyAs('public/uploads/staff/avatar', $filename);
            $photo = 'storage/uploads/staff/avatar/' . $filename;
        }


        $abouts = Service::create([
            'photo' => $photo,
            'title' => $request->title,
            'text' => $request->text,
            'is_active' => $request->is_active,

        ]);

//        dd($sliders);
        session()->flash('success', __('dashboard.statuses.serves_created'));

        return response()->json(["redir" => route('services.index')]);


    }

    public function show($id)
    {
        //
    }


    public function edit($about_id)
    {
        $abouts = Service::find($about_id);

        if (!$abouts)
            session()->flash('success', __('هذا القسم غير موجود'));

        return response()->json(["redir" => route('services.edit')]);

    }

    public function update($serv_id, ServicessRequest $request)

    {

        try {
            $serves = Service::find($serv_id);
            if (!$serves)
                session()->flash('success', __('هذا القسم غير موجود'));

            return response()->json(["redir" => route('services.index')]);
            //update data
            $serves->update($request->all());

            if ($request->has('photo')) {
                $filePath = uploadImage('abouts', $request->photo);
                Service::where('id', $serv_id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            session()->flash('success', __('تم التحديث بنجاح'));

            return response()->json(["redir" => route('services.index')]);
        } catch (\Exception $ex) {

            session()->flash('success', __('برجاء المحالوله لاحقا'));

            return response()->json(["redir" => route('services.index')]);
        }
    }

    public function destroy($id)
    {

        try {
            $servec = Service::find($id);
            if (!$servec)
                return redirect()->route('admin.about')->with(['error' => 'هذا القسم غير موجود ']);
            $images = explode(',', $servec->photo);
            foreach ($images as $image) {
                $fileExists = Storage::disk('public')->exists('/upimages/abouts/' . $image);
                if ($fileExists) {
                    unlink('upimages/abouts/' . $image);
                }
            }


            $servec->delete();
            return redirect()->route('admin.about')->with(['success' => 'تم حذف القسم بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
