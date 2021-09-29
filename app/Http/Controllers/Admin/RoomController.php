<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class RoomController extends Controller
{
    function index()
    {
    	return view('rooms.index');
    }
    function create(Request $request)
    {
    	$validated = $request->validate([
        'name' => 'required|max:255',
        'building' => 'required|max:255',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['building']=$request->building;
        $data['quality']=$request->quality;
        $data['price']=$request->price;
        $data['availability']=$request->availability;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('rooms')->insert($data);
            $notification=array(
                'messege'=>'Successfully Room Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.room')->with($notification);
        }else{
            DB::table('rooms')->insert($data);
           $notification=array(
                'messege'=>'Successfully Room Added',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.room')->with($notification);
        }
    }
    function all()
    {
    	$rooms=DB::table('rooms')->get();
        return view('rooms.allroom',compact('rooms'));
    }
    public function room_delete($id)
    {
        $delete=DB::table('rooms')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Room Deleted!',
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
    function room_edit($id)
    {
        $rooms=DB::table('rooms')->where('id',$id)->first();
        return view('rooms.edit',compact('rooms'));
    }
    function room_update(Request $request,$id)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'floor' => 'required|max:255',
        'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['floor']=$request->floor;
        $data['building']=$request->building;
        $data['quality']=$request->quality;
        $data['price']=$request->price;
        $data['square_feet']=$request->square_feet;
        $data['availability']=$request->availability;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            // unlink($request->old_image);
            DB::table('rooms')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Room Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.room')->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('rooms')->where('id',$id)->update($data);
           $notification=array(
                'messege'=>'Successfully Room Updated',
                'alert-type'=>'success'
                 );
             return redirect()->route('all.room')->with($notification);
        }
    }
    public function room_view($id)
    {
        $rooms=DB::table('rooms')->where('id',$id)->first();
        return view('rooms.view',compact('rooms'));
    }
}
