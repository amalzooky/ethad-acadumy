<?php

namespace App\Http\Controllers\Dashboard\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Maatwebsite\Excel\Excel;
use PDF;
use Validator;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }


    public function index()
    {
        $roles = Role::whereNotIn("name",["student","owner","teacher"])->get();
        return view("dashboard.roles.index",compact('roles'));
    }

    public function create(Role $roles)
    {
        $permissions = config("roles.owner");
        return view("dashboard.roles.create",compact('permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|unique:roles',
        ]);

        $attributeNames =  [
            'name' => __('dashboard.roles.name'),
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

        $permissions = $request->get("permissions",[]);
        $role = Role::create(['name' => $request->name,'guard_name'=>"web"]);
        if(count($permissions)){
            $role->givePermissionTo($permissions);              
        }
        return response()->json(["redir"=>route('roles.index')]);

    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        $permissions = config("roles.owner");
        return view("dashboard.roles.edit",compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[\pL\s\-]+$/u',
                'min:3',
                Rule::unique('roles')->ignore($role)
            ],
        ]);

        $attributeNames =  [
            'name' => __('dashboard.roles.name'),
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

        $permissions = $request->get("permissions",[]);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($permissions);              
        return response()->json(["redir"=>route('roles.index')]);
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

    public function export($type){
        switch($type){
            case "pdf":
                $pdf = PDF::loadView("dashboard.roles.pdf",["roles"=>Role::all()]);
                return $pdf->download('Roles.pdf');
            break;
            case "print":
                $pdf = PDF::loadView("dashboard.roles.pdf",["roles"=>Role::all()]);
                return $pdf->stream('Roles.pdf');
            break;
            default:
                return $this->excel->download(new \App\Exports\RolesExport , 'Roles.'.$type);
        }

    }
}
