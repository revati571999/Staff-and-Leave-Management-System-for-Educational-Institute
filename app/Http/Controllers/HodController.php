<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class HodController extends Controller
{

    /**
     * redirect to dashbboard
     */
    public function dashboard()
    {
        $deptid = Auth::user()->dept_id;
        $roleid = Auth::user()->role_id;
        // $productdata = DB::select('SELECT * FROM users WHERE dept_id = $deptid ');
        $deptdata = DB::table('users')
            ->select('users.*')
            ->where('users.dept_id', '=', $deptid)
            ->where('users.role_id', '!=', $roleid)
            ->count();
        return view('hod.dashboard', ['deptdata' => $deptdata]);
    }

    /**
     * to show staff data
     */
    public function showstaff()
    {
        $deptid = Auth::user()->dept_id;
        $roleid = Auth::user()->role_id;
        // $productdata = DB::select('SELECT * FROM users WHERE dept_id = $deptid ');
        $deptdata = DB::table('users')
            ->select('users.*')
            ->where('users.dept_id', '=', $deptid)
            ->where('users.role_id', '!=', $roleid)->get();


        return view('hod.showstaff', ['deptdata' => $deptdata]);
    }

    /**
     * To create staff
     */

    public function CreateStaff()
    {
        $roledata = role::all();
        $deptdata = department::all();
        return view('hod.createstaff', ['roledata' => $roledata], ['deptdata' => $deptdata]);
    }

    /**
     * to post staff
     */
    public function PostStaff(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'contactnumber' => 'required',
            'password' => 'required',
            'role' => 'required',
            'department' => 'required',


        ]);

        if ($validate) {
            $name = $req->name;
            $username = $req->username;
            $email = $req->email;
            $password = $req->password;
            $contactnumber = $req->contactnumber;
            $department = $req->department;
            $role = $req->role;
            $image = $req->image;

            //    echo "$firstname and $lastname  and $email  and $password  and $cpassword  and $status and $role";

            $user = new User;

            $user->name = $name;
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->contact_number = $contactnumber;
            $user->role_id = $role;
            $user->dept_id = $department;
            $user->image = $image;

            if ($user->save()) {
                return redirect('/staffmanagement');
            } else {
                return back()->with('errMsg', 'User Not Added');
            }
        }
    }

    /**
     * to hod leave management
     */
    public function hodleavemanagement()
    {
        $deptid = Auth::user()->dept_id;

        $hodleavedata = DB::table('leaves')
            ->select('leaves.*')
            ->where('leaves.dept_id', '=', $deptid)
            ->get();




        return view('hod.hodleavemanagement', ['hodleavedata' => $hodleavedata]);
    }


    /**
     * edit leave
     */
    public function edithodleave($id)
    {

        $editleavedata = leave::find($id);
        return view('hod.editleave', ['editleavedata' => $editleavedata]);
    }

    /**
     * Update staff leave
     */
    public function PosthodeditLeave(Request $req, $id)
    {

        $validate = $req->validate([
            'status' => 'required',
        ]);

        if ($validate) {

            leave::where('id', $req->id)->update([
                'status' => $req->status,

            ]);
            return redirect('/hodleavemanagement');
        }
    }

    /**
     * to delete staff deatils
     */

    public function delete($id)
    {
        $userdata=User::find($id);
        if($userdata->delete()){
            return response()->json(['msg'=>"user deleted"]);
        }
        else{
            return response()->json(['msg'=>"user could not be deleted"]);
        }
        
    
    }
    
    public function viewstaff($id){
        $staffdetail = User::where('id',$id)->first();
       
        return view('hod.viewstaff',compact('staffdetail'));
    }
    
}
