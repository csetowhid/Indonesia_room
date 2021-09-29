<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MedicineReportController extends Controller
{
	public function index($patient_id)
	{
		$medicines=DB::table('medicines')->get();
		$checkins=DB::table('checkins')->where('patient_id',$patient_id)->first();
		return view('medicinereport.index',compact('medicines','checkins'));
        // dd($checkins);
	}
    public function create(Request $request)
    {
        $data=array();
        $data['patient_id']=$request->patient_id;
        $data['checkin_id']=$request->checkin_id;
        $data['medicine_name']=$request->medicine_name;
        $data['medicine_mg']=$request->medicine_mg;
        $data['price']=$request->price;
        $data['created_at']=$request->created_at;
        $insert=DB::table('medicinereports')->insert($data);
        if ($insert) {
            $notification=array(
                'messege'=>'Successfully Medicine Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.checkin')->with($notification);
        }else{
           $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
                 );
             return redirect()->route('all.checkin')->with($notification);
        }
    }
    function all()
    {
        $patient_name=DB::table('medicinereports')
        ->join('patients','medicinereports.patient_id','patients.id')
        ->select('medicinereports.*','patients.name as patient_name')->get();

        $medicinereports=DB::table('medicinereports')->get();
        return view('medicinereport.allreport',compact('medicinereports','patient_name'));
    }
    public function show($patient_id)
    {
        $medicine_report = DB::table('medicinereports')
        ->where('patient_id',$patient_id)->get();
        return view('medicinereport.show',compact('medicine_report'));
    }
}
