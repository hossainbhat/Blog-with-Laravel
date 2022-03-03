<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function profile(){
        return view('admin.profile.profile');
	}

    public function profileEdit(Request $request){
        if ($request->isMethod('post')) {
            // echo "<pre>"; print_r($request->all());die;
            $data = $request->all();

            $rulse = [
                'name' => 'required',
                'mobile' => 'required',
				'city' => 'required',
				'address' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'mobile.required' =>'mobile is required',
				'city.required' =>'city is required',
                'address.required' =>'address is required',
				
            ];

            $this->validate($request,$rulse,$customMessage);

             //upload image
             if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $imagePath = 'uploads/images/admin_profile/'.$fileName;

                    Image::make($image_tmp)->resize(150, 150)->save($imagePath);

                }
            }else if(!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }
            User::where('email',Auth::user()->email)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'address'=>$data['address'],'city'=>$data['city'],'zipcode'=>$data['zipcode'],'country'=>$data['country'],'facebook'=>$data['facebook'],'twitter'=>$data['twitter'],'instagram'=>$data['instagram'],'image'=>$fileName]);

            return redirect()->back()->with("success_message","Admin Details has been updated Successfully");
        }
        return view("admin.profile.profile_edit");
    }

    public function deleteProfileImage($id=null){
        $porfileImage = User::select('image')->where('id',$id)->first();

        $portfolio_image_path = "uploads/images/admin_profile/";
        if (file_exists($portfolio_image_path.$porfileImage->image)) {
            unlink($portfolio_image_path.$porfileImage->image);
        }

        User::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Portfolio Image has been deleted Successfully!");
    }

    public function changePassword(){
        return view("admin.profile.change_password");
    }
    public function chkPassword(Request $request){
        $data = $request->all();

        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];
       
        if(Hash::check($current_password,Auth::user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
       
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(Hash::check($data['current_pwd'],Auth::user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password has been updated Successfully!');
                }else{
                   Session::flash('error_message','new Password & confirm password not match!');
                }

            }else {

                Session::flash('error_message','Incorrect Current Password!');
            }
           return redirect()->back();
      }
    }



}
