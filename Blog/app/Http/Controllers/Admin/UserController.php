<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
       
        $admins = User::all();
        return view('admin.user.index', compact('admins'));
    }

    public function create(){
       
        $roles  = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        
        // $data = $request->all();
        // echo "<pre>"; print_r($data);
              // Validation Data
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|max:100|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
    
            // Create New Admin
            $admin = new User();
            $admin->name = $request->name;	
            $admin->email = $request->email;
            $admin->is_admin = 1;
            $admin->status = 1;
            $admin->password = bcrypt($request->password);
            $admin->save();
    
            if ($request->roles) {
                $admin->assignRole($request->roles);
            }
    
            session()->flash('success', 'Roel has been created !!');
            return redirect('admin/users');
    }

    public function edit($id){
        
        $admin = User::find($id);
        $roles  = Role::all();
        return view('admin.user.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        
           // Create New Admin
           $admin = User::find($id);

           // Validation Data
           $request->validate([
               'name' => 'required|max:50',
               'email' => 'required|max:100|email|unique:users,email,' . $id,
               'password' => 'nullable|min:6|confirmed',
           ]);
   
   
           $admin->name = $request->name;
           $admin->email = $request->email;
           $admin->is_admin = 1;
           $admin->status = 1;
           if ($request->password) {
               $admin->password = bcrypt($request->password);
           }
           $admin->save();
   
           $admin->roles()->detach();
           if ($request->roles) {
               $admin->assignRole($request->roles);
           }
   
           session()->flash('success', 'Role has been updated !!');
               
           return redirect('admin/users');
    }

    public function destroy($id=null){
       
        User::where('id',$id)->delete();
        return redirect()->back()->with("success","Role has been deleted !!");
    }

    public function updateUserStatus(Request $request){
       
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            User::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
}
