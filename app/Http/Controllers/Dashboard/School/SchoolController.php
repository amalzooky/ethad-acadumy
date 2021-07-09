<?php

namespace App\Http\Controllers\Dashboard\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::latest()->get();
        return view('dashboard.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.schools.create');
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
            'name' => 'required|unique:schools',
        ]);

        $attributeNames =  [
            'name' => 'إسم المدرسة',
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

        $school = new School;
        $school->name = $request->name;
        $school->save();
        session()->flash('success', 'تم إنشاء المدرسة بنجاح');

        return response()->json(["redir"=>route('schools.index')]);

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
    public function edit(School $school)
    {
        return view('dashboard.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:schools,name,' . $school->id,
        ]);

        $attributeNames =  [
            'name' => 'إسم المدرسة',
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

        $school->name = $request->name;
        $school->save();
        session()->flash('success', 'تم تعديل بيانات المدرسة بنجاح');

        return response()->json(["redir"=>route('schools.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();  
        session()->flash('success', 'تم حذف بيانات المدرسة بنجاح');

        return response()->json(["redir"=>route('schools.index')]); 
    }
}
