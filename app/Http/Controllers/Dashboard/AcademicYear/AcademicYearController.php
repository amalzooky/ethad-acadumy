<?php

namespace App\Http\Controllers\Dashboard\AcademicYear;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        $years = AcademicYear::latest()->get();
        return view('dashboard.years.index', compact('years'));
    }

    public function create()
    {
        return view('dashboard.years.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:academic_years',
            'year' => 'required|unique:academic_years',
        ]);

        $attributeNames =  [
            'name' => __('dashboard.academic_years.name'),
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

        AcademicYear::create([
            'name' => $request->name,
            'year' => $request->year,
            'is_active' => $request->get('is_active', 0),
            'user_id' => auth()->id()
        ]);

        session()->flash('success', __('dashboard.statuses.academic_year_created'));
        return response()->json(["redir"=>route('years.index')]);
    }

    public function edit($id)
    {   $year = AcademicYear::findOrFail($id);
        return view('dashboard.years.edit', compact('year'));
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:academic_years,name,' . $id,
            'year' => 'required|unique:academic_years,year,' . $id,
        ]);

        $attributeNames =  [
            'name' => __('dashboard.academic_years.name'),
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

        $year = AcademicYear::findOrFail($id);
        $year->name = $request->name;
        $year->year = $request->year;
        $year->is_active = $request->get('is_active', 0);

        $year->save();

        session()->flash('success', __('dashboard.statuses.year_updated'));
        return response()->json(["redir"=>route('years.index')]);
    }


    public function destroy($id)
    {
        $mainyears = AcademicYear::find($id);

        $mainyears->delete();
        session()->flash('success', __('dashboard.statuses.year_deleted'));
    }


    public function activation()
    {
        $id = request()->id;

        $year = AcademicYear::findOrFail($id);
        if($year->is_active == 1){
            $year->is_active = 0;
        } else {
            $year->is_active = 1;
        }

       if($year->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.year_activation')
        ]);
       }
    }


}
