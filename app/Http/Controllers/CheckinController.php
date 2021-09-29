<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CheckinController extends Controller
{
    public function index()
    {
        $patients=DB::table('patients')->get();
        $rooms=DB::table('rooms')->where('availability','Yes')->get();
        return view('checkin.index',compact('patients','rooms'));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
        'patient_name' => 'required|max:255',
        'room_name' => 'required|max:10',
        'file' => 'mimes:jpg,jpeg,png,JPG,PNG,pdf,PDF,docs|max:10000',
        ]);
        $data=array();
        $data['patient_id']=$request->patient_name;
        $data['room_id']=$request->room_name;
        $data['admit_date']=$request->admit_date;
        $data['ptype']=$request->ptype;
        $data['company_name']=$request->company_name;
        $data['categories']=$request->categories;
        $data['swab_test_type']=$request->swab_test_type;
        $data['swab_test_result']=$request->swab_test_result;
        $data['advance_payment']=$request->advance_payment;
        // return $data;
        $test_file=$request->file('test_file');
        if ($test_file) {
            $test_file_name=hexdec(uniqid());
            $ext=strtolower($test_file->getClientOriginalExtension());
            $test_file_full_name=$test_file_name.'.'.$ext;
            $upload_path='public/upload/';
            $test_file_url=$upload_path.$test_file_full_name;
            $success=$test_file->move($upload_path,$test_file_full_name);
            $data['test_file']=$test_file_url;
            DB::table('checkins')->insert($data);
            $notification=array(
                'messege'=>'Successfully Patient Checked In',
                'alert-type'=>'success'
                 );
            // return redirect()->route('all.checkin')->with($notification);
        }else{
            DB::table('checkins')->insert($data);
           $notification=array(
                'messege'=>'Successfully Patient Checked In',
                'alert-type'=>'success'
                 );
     
        }

         DB::table('rooms')->where('id',$request->room_name)
         ->update(array('availability' => 'No'));


         return redirect()->route('all.checkin')->with($notification);
    }
    function all()
    {
        $medicines=DB::table('medicines')->get();
        $checkins=DB::table('checkins')->get();

        $patient_name=DB::table('checkins')
        ->join('patients','checkins.patient_id','patients.id')
        ->select('checkins.*','patients.name as patient_name')->get();
        return view('checkin.allcheckin',compact('checkins','medicines','patient_name'));
    }
    public function checkin_delete($id)
    {
        $delete=DB::table('checkins')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully CheckIn Deleted!',
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

}
