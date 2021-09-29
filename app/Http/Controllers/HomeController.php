<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patients=DB::table('patients')->count('id');
        $users=DB::table('users')->count('id');
        $checkouts=DB::table('checkouts')->count('id');
        $rooms=DB::table('rooms')->where('availability','Yes')->COUNT('id');
        return view('home',compact('patients','users','checkouts','rooms'));
    }
}
