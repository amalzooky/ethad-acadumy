<?php

namespace App\Http\Controllers\Dashboard\Majors;

use Validator;
use App\Major;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Excel;
use PDF;

class MajorController extends Controller
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
        $majors = Major::latest()->get();
        return view('dashboard.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.majors.create');
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|unique:majors',
            'description' => 'required',
//            'image' => 'required|url'
        ]);

        $attributeNames =  [
            'name' => __('dashboard.major.name'),
            'description' => __('dashboard.major.description'),
//            'image' => __('dashboard.major.image')
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

        Major::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $is_active,
            'user_id' => auth()->id(),
//            'image' =>  $request->image
        ]);

        session()->flash('success', __('dashboard.statuses.major_created'));

        return response()->json(["redir"=>route('majors.index')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $major)
    {
        return view('dashboard.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[\pL\s\-]+$/u',
                'min:3',
                Rule::unique('majors')->ignore($major)
            ],
            'description' => 'required',
            'image' => 'required|url'
        ]);

        $attributeNames =  [
            'name' => __('dashboard.major.name'),
            'description' => __('dashboard.major.description'),
            'image' => __('dashboard.major.image')
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

        $major->name = $request->name;
        $major->description = $request->description;
        $is_active = $request->get('is_active', 0);
        $major->is_active = $is_active;
        $major->image = $request->image;

        $major->save();
        session()->flash('success', __('dashboard.statuses.major_edited'));
        return response()->json(["redir"=>route('majors.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {

        $major->delete();
        session()->flash('success', __('dashboard.statuses.major_deleted'));
        // return response()->json(['type' => 'success', 'title' => 'حذف', 'text' => 'تمت عملية الحذف بنجاح']);
    }

    public function activation()
    {
        $id = request()->id;

        $major = Major::findOrFail($id);
        if($major->is_active == 1){
            foreach($major->subjects as $subject){
                $subject->is_active = 0;
                $subject->save();
            }
            $major->is_active = 0;
        } else {
            $major->is_active = 1;
        }

       if($major->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.major_activation')
        ]);
       }
    }

    public function export($type)
    {
        switch($type){
            case "pdf":
                $pdf = PDF::loadView("dashboard.majors.pdf",["majors"=>Major::all()]);
                return $pdf->download('Majors.pdf');
            break;
            case "print":
                $pdf = PDF::loadView("dashboard.majors.pdf",["majors"=>Major::all()]);
                return $pdf->stream('Majors.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\MajorsExport , 'Majors.'.$type);
        }
    }
}
