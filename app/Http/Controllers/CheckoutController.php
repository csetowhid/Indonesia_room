<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CheckoutController extends Controller
{
    public function index()
    {
    	$patients=DB::table('patients')->get();
        return view('checkout.index',compact('patients'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
        'patient_id' => 'required|max:255',
        'file' => 'mimes:jpg,jpeg,png,JPG,PNG,pdf,PDF,docs|max:10000',
        ]);
        $data=array();
        $data['patient_id']=$request->patient_id;
        $data['patient_name']=$request->patient_name;
        $data['room_id']=$request->room_id;
        $data['checkin_id']=$request->checkin_id;
        $data['advance_payment']=$request->advance_payment;
        $data['swab_test_type']=$request->swab_test_type;
        $data['swab_test_date']=$request->swab_test_date;
        $data['swab_test_result']=$request->swab_test_result;
        $data['upload_test_result']=$request->upload_test_result;
        $data['test_clearance_note']=$request->test_clearance_note;
        $data['checkout_date']=$request->checkout_date;
        $data['meal_cost']=$request->meal_cost;
        $data['report_cost']=$request->report_cost;
        $data['medicine_cost']=$request->medicine_cost;
        $note=$request->file('note');
        if ($note) {
            $note_name=hexdec(uniqid());
            $ext=strtolower($note->getClientOriginalExtension());
            $note_full_name=$note_name.'.'.$ext;
            $upload_path='public/upload/';
            $note_url=$upload_path.$note_full_name;
            $success=$note->move($upload_path,$note_full_name);
            $data['note']=$note_url;
            DB::table('checkouts')->insert($data);

            $notification=array(
                'messege'=>'Successfully Patient Checked Out',
                'alert-type'=>'success'
                 );
        }else{
            DB::table('checkouts')->insert($data);
           $notification=array(
                'messege'=>'Successfully Patient Checked Out',
                'alert-type'=>'success'
                 );
            
        }


        DB::table('rooms')->where('id',$request->room_id)
        ->update(array('availability' => 'Yes'));

         return redirect()->route('all.checkout')->with($notification);
    }

    function all()
    {
    	$checkouts=DB::table('checkouts')->get();
        return view('checkout.allcheckout',compact('checkouts'));
    }
    public function checkoutindex($patient_id)
    {
        $patient_name=DB::table('checkins')
        ->join('patients','checkins.patient_id','patients.id')
        ->where('patient_id',$patient_id)
        ->select('checkins.*','patients.name as patient_name')->first();
        $checkins=DB::table('checkins')->where('patient_id',$patient_id)->first();

        $report_cost = DB::table('medicalreports')
        ->where('checkin_id','=',$checkins->id)
        ->where('patient_id','=',$checkins->patient_id)
        ->sum('report_cost');


        $meal_total_cost = DB::table('mealreports')
        ->where('checkin_id','=',$checkins->id)
        ->where('patient_id','=',$checkins->patient_id)
        ->sum('food_price');

        $medicine_cost = DB::table('medicinereports')
        ->where('patient_id','=',$checkins->patient_id)
        ->sum('price');


        return view('patientcheckout.index',compact('checkins','patient_name','meal_total_cost','report_cost','medicine_cost'));
    }
    public function show($id,$patient_id)
    {
        $settings=DB::table('settings')->first();
        $checkouts=DB::table('checkouts')->where('id',$id)->first();

        $patient=DB::table('checkins')
        ->join('patients','checkins.patient_id','patients.id')
        ->where('patient_id',$patient_id)
        ->select('checkins.*','patients.email as patient_email', 'patients.mobile as patient_mobile', 'patients.address as patient_address')->first();
         //echo ($patient_email->patient_email);

        $meal_report = DB::table('mealreports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->get();


        $medicine_report = DB::table('medicinereports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->get();

        $medical_report = DB::table('medicalreports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->get();

        $medical_report_sum = DB::table('medicalreports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->sum('report_cost');

        $medicine_report_sum = DB::table('medicinereports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->sum('price');

        $meal_sum = DB::table('mealreports')
        ->where('patient_id','=',$checkouts->patient_id)
        ->sum('food_price');


        return view('checkout.show',compact('checkouts','patient','meal_report','medicine_report','medical_report','medical_report_sum','medicine_report_sum','meal_sum','settings'));


    }
}
