<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MealReportController extends Controller
{
    public function create(Request $request)
    {
        $data=array();
        $data['patient_id']=$request->meal_patient_id;
        $data['checkin_id']=$request->meal_checkin_id;
        $data['meal']=$request->meal;
        $data['delivered_by']=$request->delivered_by;
        $data['food_name']=$request->food_name;
        $data['food_price']=$request->food_price;
        $data['time']=$request->time;
        $insert=DB::table('mealreports')->insert($data);
        if ($insert) {
            $notification=array(
                'messege'=>'Successfully Meal Added',
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
        $mealreports=DB::table('mealreports')->get();
        return view('meal.allmeal',compact('mealreports'));
    }
    public function show($patient_id)
    {
        $meal_report = DB::table('mealreports')
        ->where('patient_id',$patient_id)->get();
        return view('meal.show',compact('meal_report'));
    }

}
