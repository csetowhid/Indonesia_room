<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PatientController extends Controller
{
    public function index()
    {
    	$users=DB::table('users')->get();
    	return view('patient.index',compact('users'));
    }
    public function create(Request $request)
    {
    	$validated = $request->validate([
        'name' => 'required|max:255',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['nid']=$request->nid;
        $data['birth_date']=$request->birth_date;
        $data['gender']=$request->gender;
        $data['relative_name']=$request->relative_name;
        $data['relative_mobile']=$request->relative_mobile;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('patients')->insert($data);
            $notification=array(
                'messege'=>'Successfully Patient Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.patients')->with($notification);
        }else{
            DB::table('patients')->insert($data);
           $notification=array(
                'messege'=>'Successfully Patient Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.patients')->with($notification);
        }
    }

    function all()
    {
    	$patients=DB::table('patients')->get();
        return view('patient.allpatients',compact('patients'));
    }
    public function patient_delete($id)
    {
        $delete=DB::table('patients')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Patient Deleted!',
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
    public function patient_edit($id)
    {
        $patients=DB::table('patients')->where('id',$id)->first();
        return view('patient.edit',compact('patients'));
    }
    public function patient_update(Request $request,$id)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['relative_name']=$request->relative_name;
        $data['relative_mobile']=$request->relative_mobile;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('patients')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Patient Data Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.patients')->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('patients')->where('id',$id)->update($data);
           $notification=array(
                'messege'=>'Successfully Patient Data Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.patients')->with($notification);
        }
    }
    public function checkinindex()
    {
        return view('checkin.index');
    }
}
