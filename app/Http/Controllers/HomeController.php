<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }

    // For Redirect 
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->role_id == '2') {


                $userid = Auth::user()->id;
                $totalleavedata = DB::table('leaves')
                    ->select('leaves.*')
                    ->where('leaves.user_id', '=', $userid)
                    ->count();
                return view('staff.dashboardstaff', ['totalleaves' => $totalleavedata]);

            } else {
                $deptid = Auth::user()->dept_id;
                $roleid = Auth::user()->role_id;
                // $productdata = DB::select('SELECT * FROM users WHERE dept_id = $deptid ');
                $deptdata = DB::table('users')
                    ->select('users.*')
                    ->where('users.dept_id', '=', $deptid)
                    ->where('users.role_id', '!=', $roleid)
                    ->count();

                //    dd($deptdata);

                return view('hod.dashboard', ['deptdata' => $deptdata]);
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Dashboard Function
     */
}
