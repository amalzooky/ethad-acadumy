<?php

namespace App\Http\Controllers\Dashboard\Certificate;

use App\Http\Requests\CrtififRequest;
use App\Latestnews;
use App\Models\Certificat;
use App\Models\Course;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class CertificateCntroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certif = Certificat::all();
        return view("dashboard.certificates.index",compact('certif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.certificates.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pict1 = "";
        if ($request->has('pict1')) {

            $pict1 = uploadImage('abouts', $request->pict1);
        }
         $pict2 = "";
        if ($request->has('pict2')) {

            $pict2 = uploadImage('abouts', $request->pict2);
        }
         $pict3 = "";
        if ($request->has('pict3')) {

            $pict3 = uploadImage('abouts', $request->pict3);
        }
         $pict4 = "";
        if ($request->has('pict4')) {

            $pict4 = uploadImage('abouts', $request->pict4);
        }
         $pict5 = "";
        if ($request->has('pict5')) {

            $pict5 = uploadImage('abouts', $request->pict5);
        }
         $pict6 = "";
        if ($request->has('pict6')) {

            $pict6 = uploadImage('abouts', $request->pict6);
        }
         $cart_stud = "";
        if ($request->has('cart_stud')) {

            $cart_stud = uploadImage('abouts', $request->cart_stud);
        }
        $seg1 = "";
        if ($request->has('seg1')) {

            $seg1 = uploadImage('abouts', $request->seg1);
        }
        $logoero = "";
        if ($request->has('logoero')) {

            $logoero = uploadImage('abouts', $request->logoero);
        }
        $logowt = "";
        if ($request->has('logowt')) {

            $logowt = uploadImage('abouts', $request->logowt);
        }
  $seg2 = "";
        if ($request->has('seg2')) {

            $seg2 = uploadImage('abouts', $request->seg2);
        }
  $backgrond = "";
        if ($request->has('backgrond')) {

            $backgrond = uploadImage('abouts', $request->backgrond);
        }

        $abouts = Certificat::create([
            'pict1' => $pict1,
            'pict2' => $pict2,
            'pict3' => $pict3,
            'pict4' => $pict4,
            'pict5' => $pict5,
            'pict6' => $pict6,
            'logowt' => $logowt,
            'logoero' => $logoero,
            'seg1' => $seg1,
            'seg2' => $seg2,
            'backgrond' => $backgrond,
            'cart_stud' => $cart_stud,
            'namestudent' => $request->namestudent,
            'cont_certificate' => $request->cont_certificate,
            'name_certificat' => $request->name_certificat,
            'student_subj' => $request->student_subj,


        ]);
//        $is_active = $request->get('is_active', 0);

        session()->flash('success', __('تم الاضافة بنجاح'));

        return response()->json(["redir"=>route('certificate.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $certifs = Certificat::where('id', $id)->first();

            // $vendor = DB::table('vendors')->select('vendors.*', 'schools_items.school_name')
            //     ->leftJoin('schools_items', 'schools_items.school_id', '=', 'vendors.school')
            //     ->where('vendors.id', $id)->first();

            return view('dashboard.certificates.certificat', compact('certifs'));
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('certificate.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Latestnews $latestnews)
    {
        return view("dashboard.certificates.edit",compact('latestnews'));
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

        return response()->json(["redir"=>route('certificate.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Certificat::findOrFail($id);
        $slider->delete();
        session()->flash('success', 'تم حذف الشريحة بنجاح');

        return response()->json(["redir"=>route('certificate.index')]); }


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
