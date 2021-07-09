<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $roleAndPermissions = config("roles");
        foreach($roleAndPermissions as $key=>$permissions){
            if(is_array($permissions)){
                foreach($permissions as $permission){
                    Permission::create(['name' => $permission,"guard_name"=>"web"]);
                }
                $createRole = Role::create(["name"=>$key,"guard_name"=>"web"]);
                $createRole->givePermissionTo($permissions);   
            }
        }
        // Dev
        $user = App\User::where("email","admin@gmail.com")->first();
        return response()->json($user->assignRole('owner'));
    }
}
