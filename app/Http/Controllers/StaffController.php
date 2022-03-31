<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\leave;

class StaffController extends Controller
{

    /**
     * For Dashboard
     */
    public function Dashboard1()
    {
        $userid = Auth::user()->id;
        $totalleavedata = DB::table('leaves')
            ->select('leaves.*')
            ->where('leaves.user_id', '=', $userid)
            ->count();
        return view('staff.dashboardstaff',['totalleaves'=>$totalleavedata]);
    }


    /**
     * to show leaves
     */
    public function ShowLeave()
    {
        $userid = Auth::user()->id;
        $leavedata = DB::table('leaves')
            ->select('leaves.*')
            ->where('leaves.user_id', '=', $userid)
            ->get();

        return view('staff.showleave',['leavedata'=>$leavedata]);
    }

    /**
     * to create leave
     */
    public function CreateLeave()
    {
        return view('staff.createleave');
    }

    /**
     * to post leave
     */
    public function PostLeave(Request $req)
    {
        $validate = $req->validate([
            'leavefromdate' => 'required',
            'leavetodate' => 'required',
            'reason' => 'required',
        ]);

        $deptid = Auth::user()->dept_id;
        $userid = Auth::user()->id;

        if ($validate) 
        {
            $leavefromdate = $req->leavefromdate;
            $leavetodate = $req->leavetodate;
            $reason = $req->reason;
            $useriid = $userid;
            $departmentid = $deptid;
            $status = "pending";
            
            $leave = new leave;

                $leave->leave_from_date = $leavefromdate;
                $leave->leave_to_date = $leavetodate;
                $leave->reason = $reason;
                $leave->status = $status;
                $leave->user_id = $useriid;
                $leave->dept_id = $departmentid;
               
                if ($leave->save()) {
                    return redirect('/leavemanagement');
                } else {
                    return back()->with('errMsg', 'User Not Added');
                }

        }
    }

    /**
     * to view leave
     */
    public function ViewLeave($id)
    {
        $userleavedata = DB::table('leaves')
            ->select('leaves.*')
            ->where('leaves.id', '=', $id)
            ->get();

            return view('staff.showleavedeatil',['leavedeatil'=>$userleavedata]);
    }

    /**
     * show leave deatils
     */
    public function ShowLeaveDeatils($id){
        $leavedeatils = leave::where('id',$id)->first();
       
        return view('staff.showleavedeatil',compact('leavedeatils'));
    }

}
