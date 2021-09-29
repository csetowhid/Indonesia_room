<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function user_register()
    {
    	return view('users.register');
    }
    public function user_store(Request $request)
    {
        $validated = $request->validate([
        'email' => 'required|unique:users|max:255',
        'name' => 'required',
        'username' => 'required|unique:users',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:10000',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        $data['username']=$request->username;
        $data['password']=Hash::make($request->password);
        $data['usertype']=$request->usertype;
        $data['active_status']=$request->active_status;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('users')->insert($data);
            $notification=array(
                'messege'=>'Successfully User Created',
                'alert-type'=>'success'
                 );
             return redirect()->route('user.view')->with($notification);
            // return redirect()->route('user.view');
        }else{
            DB::table('users')->insert($data);
           $notification=array(
                'messege'=>'Successfully User Created',
                'alert-type'=>'success'
                 );
             return redirect()->route('user.view')->with($notification);
        }
    }
    public function user_view()
    {
        $users=DB::table('users')->get();
        return view('users.userview',compact('users'));
    }
    public function user_delete($id)
    {
        $delete=DB::table('users')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully User Deleted!',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
        }
    }
    public function user_edit($id)
    {
        $users=DB::table('users')->where('id',$id)->first();
        return view('users.useredit',compact('users'));
    }
    public function user_update(Request $request,$id)
    {
        $validated = $request->validate([
        'email' => 'required|unique:users|max:255',
        'username' => 'required|unique:users',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        $data['username']=$request->username;
        $data['password']=Hash::make($request->password);
        $data['usertype']=$request->usertype;
        $data['gender']=$request->gender;
        $data['active_status']=$request->active_status;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('users')->where('id',$id)->update($data);
            return redirect()->route('user.view');
        }else{
            $data['image']=$request->old_image;
            DB::table('users')->where('id',$id)->update($data);
            return redirect()->route('user.view');
        }
    }
}
