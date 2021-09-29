<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MedicineController extends Controller
{
    public function index()
    {
    	// $users=DB::table('users')->get();
    	// return view('patient.index',compact('users'));
    	return view('medicine.index');
    }
    public function create(Request $request)
    {
    	$validated = $request->validate([
        'medicine_name' => 'required|max:255',
        'medicine_mg' => 'required|max:255',
        ]);
        $data=array();
        $data['medicine_name']=$request->medicine_name;
        $data['medicine_mg']=$request->medicine_mg;
        $data['description']=$request->description;
        $insert=DB::table('medicines')->insert($data);
        if ($insert) {
            $notification=array(
                'messege'=>'Successfully Medicine Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.medicine')->with($notification);
        }else{
           $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
                 );
             return redirect()->route('all.medicine')->with($notification);
        }
    }
    function all()
    {
        $medicines=DB::table('medicines')->get();
        return view('medicine.allmedicine',compact('medicines'));
    }
    public function medicine_edit($id)
    {
        $medicines=DB::table('medicines')->where('id',$id)->first();
        return view('medicine.edit',compact('medicines'));
    }
    public function medicine_update(Request $request,$id)
    {
        $validated = $request->validate([
        'medicine_name' => 'required|max:255',
        'medicine_mg' => 'required|max:255',
        ]);
        $data=array();
        $data['medicine_name']=$request->medicine_name;
        $data['medicine_mg']=$request->medicine_mg;
        $data['description']=$request->description;
        $update=DB::table('medicines')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Successfully Medicine Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.medicine')->with($notification);
        }else{
           $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
                 );
             return redirect()->route('all.medicine')->with($notification);
        }
    }
    public function medicine_delete($id)
    {
        $delete=DB::table('medicines')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Medicine Deleted!',
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
