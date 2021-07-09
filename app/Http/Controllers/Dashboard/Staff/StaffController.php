<?php

namespace App\Http\Controllers\Dashboard\Staff;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Excel;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;


use PDF;
use DB;
use Validator;
use App\User;
use App\Staff;
use App\City;

class StaffController extends Controller
{
    private $excel;
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
        $staff = Staff::latest()->get();
        return view("dashboard.staff.index",compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::latest()->get();
        $roles = Role::latest()->whereNotIn('name',['teacher','student','owner'])->get();
        $groups = DB::table('groups')->get();
        return view("dashboard.staff.create",compact('cities','roles', 'groups'));
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
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'full_name' => 'required|string|unique:users',
            'mobile_number' => 'required|numeric|unique:users',
            'telephone_number' => 'numeric|Nullable|unique:users',
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => 'url|Nullable|unique:users',
            'role' => 'required'
        ]);

        $attributeNames =  [
            'username' => __('global.username'),
            'email' => __('global.email'),
            'password' => __('global.password'),
            'full_name' => __('global.full_name'),
            'mobile_number' => __('global.mobile_number'),
            'telephone_number' => __('global.telephone_number'),
            'city_id' => __('global.city'),
            'date_of_birth' => __('global.date_of_birth'),
            'sex' => __('global.sex'),
            'facebook_url' => __('global.facebook_url'),
            'role' => __('dashboard.roles.role'),
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

        if($request->has('avatar')){
            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
            $image = $request->avatar->storePubliclyAs('public/uploads/staff/avatar', $filename);
            $avatar = 'storage/uploads/staff/avatar/' . $filename;
        }

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = $request->get('is_active', 0);
        $user->full_name = $request->full_name;
        $user->mobile_number = $request->mobile_number;
        $user->telephone_number = $request->telephone_number;
        $user->city_id = $request->city_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->facebook_url = $request->facebook_url;
        $user->avatar = $avatar;

        $user->save();
        $user->assignRole($request->role);
        $staff = new Staff;
        $staff->user_id = $user->id;
        $staff->save();

        if($request->groups){
            foreach($request->groups as $group)
            {
                $getGroup = \Groups::group($group);
                $getGroup->addMembers($user->id);
            }
        }


        session()->flash('success', __('dashboard.statuses.staff_created'));
        return response()->json(["redir"=>route('staff.index')]);
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
    public function edit(Staff $staff)
    {
        $cities = City::latest()->get();
        $roles = Role::latest()->whereNotIn('name',['teacher','student','owner'])->get();
        return view("dashboard.staff.edit",compact('staff','cities','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $user = User::find($staff->user_id);

        $validator = Validator::make($request->all(), [
            'username' => ['required',Rule::unique('users')->ignore($user)],
            'email' => ['required','email',Rule::unique('users')->ignore($user)],
            'full_name' => ['required','string',Rule::unique('users')->ignore($user)],
            'mobile_number' => ['required','numeric',Rule::unique('users')->ignore($user)],
            'telephone_number' => ['Nullable','numeric',Rule::unique('users')->ignore($user)],
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'facebook_url' => ['Nullable','url',Rule::unique('users')->ignore($user)],
            'role'=>'required'
        ]);

        $attributeNames =  [
            'username' => __('global.username'),
            'email' => __('global.email'),
            'password' => __('global.password'),
            'full_name' => __('global.full_name'),
            'mobile_number' => __('global.mobile_number'),
            'telephone_number' => __('global.telephone_number'),
            'city_id' => __('global.city'),
            'date_of_birth' => __('global.date_of_birth'),
            'sex' => __('global.sex'),
            'facebook_url' => __('global.facebook_url'),
            'role'=>__('dashboard.role.role')
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

        if($request->has('avatar')){
            File::delete($user->avatar);
            $filename = $request->username . '_' .  $request->avatar->getClientOriginalName();
            $image = $request->avatar->storePubliclyAs('public/uploads/staff/avatar', $filename);
            $avatar = 'storage/uploads/staff/avatar/' . $filename;
            $user->avatar = $avatar;
        }

        $user->username = $request->username;
        $user->email = $request->email;

        if($request->password) $user->password = bcrypt($request->password);
        $user->is_active = $request->get('is_active', 0);
        $user->full_name = $request->full_name;
        $user->mobile_number = $request->mobile_number;
        $user->telephone_number = $request->telephone_number;
        $user->city_id = $request->city_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->facebook_url = $request->facebook_url;
        $user->active_date = $request->active_date;
        $user->save();
        $user->assignRole($request->role);
        return response()->json(["redir"=>route('staff.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//    public function delete($id)
//    {
//        $staff = Staff::findOrFail($id);
//        $staff->user->delete();
//        session()->flash('success', 'تم حذف الشريحة بنجاح');
//
//        return response()->json(["redir"=>route('sliders.index')]);
//    }
    public function destroy(Staff $staff)
    {
        $staff->delete();
        $staff->user->delete();
        session()->flash('success', __('dashboard.statuses.staff_deleted'));
    }

    public function activation(){
        $id = request()->id;

        $user = User::findOrFail($id);

        if($user->is_active == 1){
            $user->is_active = 0;
        } else {
            $user->is_active= 1;
        }

       if($user->save()){
        return response()->json([
            'success' =>  __('dashboard.statuses.staffs_activation')
        ]);

       }
    }

    public function export($type){
        switch($type){
            case "pdf":
                $staff = Staff::latest()->get();
                $pdf = PDF::loadView("dashboard.staff.pdf",["staff"=>$staff]);
                return $pdf->download('staff.pdf');
            break;
            case "print":
                $staff = Staff::latest()->get();
                $pdf = PDF::loadView("dashboard.staff.pdf",["staff"=>$staff]);
                return $pdf->stream('staff.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\StaffExport , 'staff.'.$type);
        }
    }
}
