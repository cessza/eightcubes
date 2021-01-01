<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Admin;
use Hash;
use Image;

class AdminController extends Controller
{
    public function index(){
        Session::put('page','index');
        return view('oms_admin.index');
    }

    public function settings(){
        Session::put('page','settings');
    //    echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('oms_admin.settings')->with(compact('adminDetails'));
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all(); 
         //   echo "<pre>"; print_r($data); die;

        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        $customMessage = [
            'email.required' => 'Email is Required',
            'email.email' => 'Valid Email is Required',
            'password.required' => 'Password is Required',
        ];

        $this->validate($request,$rules,$customMessage);


        if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return redirect('admin/index');
        }else{
            Session::flash('error_message','Invalid Email or Password');
            return redirect()->back();
        }
        }
        return view('oms_admin.login');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function chkCurrentPassword(Request $request){
        $data = $request->all();
     //   echo "<pre>"; print_r($data); 
        if(Hash::check($data['current_pass'],Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
        //    echo "<pre>"; print_r($data); die;  
        //titgnan kung ang password ay tama  
        if(Hash::check($data['current_pass'],Auth::guard('admin')->user()->password)){
            //ikumpara kung ang bago at kumpirmang password ay tama
            if($data['new_pass']==$data['confirm_pass']){
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pass'])]);
                Session::flash('success_message','Password has been updated successfully');
            }else{
                Session::flash('error_message','New Password and Confirm password is not Match');
                return redirect()->back();
            }
            }else{
                Session::flash('error_message','Your current password is incorrect');
            }
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request){
        Session::put('page','update-admin-details');
        if($request->isMethod('post')){
            $data =$request->all();
        //    echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' =>'required|regex:/^[\pL\s\-]+$/u',
                'admin_contact' => 'required|numeric',
                'admin_image' => 'image'
            ];
            $customMessages = [
                'admin_name.required' => 'Name is Required',
                'admin_name.regex' => 'Valid Name is Requires',
                'admin_contact.required' => 'Contact Number is Required',
                'admin_image.image' => 'Valid Image is Require'
            ];
            $this->validate($request,$rules,$customMessages);

            //mag uplod ng imahe
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //kuha ng ekstensyon ng fayl
                    $extension = $image_tmp->getClientOriginalExtension();
                    //kuha ng bagong imahe
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    //uplod ng imahe
                    Image::make($image_tmp)->save($imagePath);
                }else if(!empty($data['current_admin_image'])){
                    $imageName = $data['current_admin_image'];
                }else{
                    $imageName ="";     
                }
            }


            //iapdet ang detalye ng administasyon
            Admin::where('email',Auth::guard('admin')->user()->email)->update
            (['name'=>$data['admin_name'],'contactNo'=>$data['admin_contact'],'image'=>$imageName]);
            Session::flash('success_message','Admin details updated successfully');
            return redirect()->back();
        }
        return view('oms_admin.update_admin_details');
    }
 
}
