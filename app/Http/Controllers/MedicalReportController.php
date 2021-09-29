<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MedicalReportController extends Controller
{
    public function create(Request $request)
    {
        $data=array();
        $data['patient_id']=$request->patient_id;
        $data['checkin_id']=$request->checkin_id;
        $data['doctor_name']=$request->doctor_name;
        $data['nurse_name']=$request->nurse_name;
        $data['date']=$request->date;
        $data['temperature']=$request->temperature;
        $data['blood_pressure']=$request->blood_pressure;
        $data['oxygen_saturation']=$request->oxygen_saturation;
        $data['breathing']=$request->breathing;
        $data['report_cost']=$request->report_cost;
        $data['notes']=$request->notes;
        //dd($data);
        $insert=DB::table('medicalreports')->insert($data);
        if ($insert) {
            $notification=array(
                'messege'=>'Successfully Report Added',
                'alert-type'=>'success'
                 );
             return redirect()->back()->with($notification);
        }else{
           $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
                 );
             return redirect()->back()->with($notification);
        }
    }
    function all()
    {
        $medicalreports=DB::table('medicalreports')->get();
        return view('medical_report.allreport',compact('medicalreports'));
    }
    public function show($patient_id)
    {
        $medical_report = DB::table('medicalreports')
        ->where('patient_id',$patient_id)->get();
        return view('medical_report.show',compact('medical_report'));
    }
}
