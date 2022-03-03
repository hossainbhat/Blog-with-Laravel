<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    public $user;
    public function index()
    {
        $roles =  Role::all();
        return view("admin.role.roles")->with(compact('roles'));
    }

    
    public function create()
    {
      
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        // dd($permission_groups);
        return view('admin.role.create', compact('all_permissions','permission_groups'));
    }

    public function store(Request $request)
    {
        // echo "<pre>"; print_r($request->all());die;
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        // Process Data
        $role = Role::create(['name' => $request->name, 'guard_name'=>'web']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
       
        return redirect('admin/rolse')->with("success","Role has been Successfully created!!");   
    }

    public function edit($id)
    {
        $role = Role::findById($id,'web');
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.role.edit', compact('all_permissions','permission_groups','role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        $role = Role::findById($id,'web');
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        return redirect('admin/rolse')->with("success","Role has been updated!!");   
    }

    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->back()->with("success","Role has been deleted !!");   
    }

}
