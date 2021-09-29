<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingsController extends Controller
{
    public function index()
    {
    	return view('settings.index');
    }
    public function create(Request $request)
    {
    	$validated = $request->validate([
        'company_logo' => 'mimes:jpg,jpeg,png,JPG,PNG|max:8000',
        'signature_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:8000',
        ]);

        $data=array();
        $data['company_name']=$request->company_name;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['signature_name']=$request->signature_name;

        $company_logo=$request->file('company_logo');
        $signature_image=$request->file('signature_image');

        if($company_logo && $signature_image) {

            $company_logo_name=hexdec(uniqid());
            $signature_image_name=hexdec(uniqid());

            $company_logo_ext=strtolower($company_logo->getClientOriginalExtension());
            $signature_image_ext=strtolower($signature_image->getClientOriginalExtension());

            $company_logo_full_name=$company_logo_name.'.'.$company_logo_ext;
            $signature_image_full_name=$signature_image_name.'.'.$signature_image_ext;

            $upload_path='public/upload/';

            $company_logo_url=$upload_path.$company_logo_full_name;
            $signature_image_url=$upload_path.$signature_image_full_name;

            $company_logo_success=$company_logo->move($upload_path,$company_logo_full_name);
            $signature_image_success=$signature_image->move($upload_path,$signature_image_full_name);

            $data['company_logo']=$company_logo_url;
            $data['signature_image']=$signature_image_url;

            DB::table('settings')->insert($data);
            $notification=array(
                'messege'=>'Successfully Settings Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('settings.all')->with($notification);
        }else{
            DB::table('settings')->insert($data);
           $notification=array(
                'messege'=>'Successfully Settings Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('settings.all')->with($notification);
        }

    }
    public function all()
    {
        $settings=DB::table('settings')->get();
        return view('settings.all',compact('settings'));
    }

    public function settings_delete($id)
    {
        $delete=DB::table('settings')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Settings Deleted!',
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
    public function settings_edit($id)
    {
        $settings=DB::table('settings')->where('id',$id)->first();
        return view('settings.edit',compact('settings'));
    }
    public function settings_update(Request $request, $id)
    {
        $validated = $request->validate([
        'company_logo' => 'mimes:jpg,jpeg,png,JPG,PNG|max:8000',
        'signature_image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:8000',
        ]);

        $data=array();
        $data['company_name']=$request->company_name;
        $data['mobile']=$request->mobile;
        $data['address']=$request->address;
        $data['signature_name']=$request->signature_name;

        $company_logo=$request->file('company_logo');
        $signature_image=$request->file('signature_image');

        if($company_logo || $signature_image) {

            $company_logo_name=hexdec(uniqid());
            $signature_image_name=hexdec(uniqid());

            $company_logo_ext=strtolower($company_logo->getClientOriginalExtension());
            $signature_image_ext=strtolower($signature_image->getClientOriginalExtension());

            $company_logo_full_name=$company_logo_name.'.'.$company_logo_ext;
            $signature_image_full_name=$signature_image_name.'.'.$signature_image_ext;

            $upload_path='public/upload/';

            $company_logo_url=$upload_path.$company_logo_full_name;
            $signature_image_url=$upload_path.$signature_image_full_name;

            $company_logo_success=$company_logo->move($upload_path,$company_logo_full_name);
            $signature_image_success=$signature_image->move($upload_path,$signature_image_full_name);

            $data['company_logo']=$company_logo_url;
            $data['signature_image']=$signature_image_url;

            DB::table('settings')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Settings Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('settings.all')->with($notification);
        }else{
             $data['company_logo']=$request->old_company_logo;
             $data['signature_image']=$request->old_signature_image;
            DB::table('settings')->where('id',$id)->update($data);
           $notification=array(
                'messege'=>'Successfully Settings Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('settings.all')->with($notification);
        }
    }
}
