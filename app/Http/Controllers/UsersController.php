<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Hash;

class UsersController extends Controller
{
    public function add(Request $request){
        //
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $stdid = $request->input('stdid');

        $pws = $request->input('pws');
        $mobile = $request->input('mobile');

        $nic = $request->input('nic');
        $email = $request->input('email');
        $dob = $request->input('dob');

        $faculty = $request->input('faculty');
        $batch = $request->input('batch');
        $avatar = $request->input('avatar');

        //Validators

        $checkemail = DB::table('users')->select('email')->where('email','=',$email)->exists();
        $checkmobile = DB::table('users')->select('mobile')->where('mobile','=',$mobile)->exists();
        $checkstdid = DB::table('users')->select('stdid')->where('stdid','=',$stdid)->exists();
        $checknic = DB::table('users')->select('nic')->where('nic','=',$nic)->exists();

        if ($checkemail === true){
            return response()->json([
                'code'=>'Account with the Same Email Exists!'
            ],400);
        }elseif ($checkmobile === true){
            return response()->json([
                'code'=>'Account with the Same Phone Number Exists!'
            ],400);
        }elseif ($checkstdid === true){
            return response()->json([
                'code'=>'Account with the Same Student ID Exists!'
            ],400);
        }elseif ($checknic === true){
            return response()->json([
                'code'=>'Account with the Same Student ID Exists!'
            ],400);
        }else{
//DB
        DB::table('users')->insert([
            'nic'=>$nic,
            'mobile'=>$mobile,
            'password'=>Hash::make($pws),
            'email' => $email,
            'stdid' => $stdid,
            'dob'=> $dob,
            'faculty' => $faculty,
            'batch' => $batch,
            'fname' => $fname,
            'lname' => $fname,
        ],);


        return response()->json(['code'=>'User Added!'],200);
        }
        

        
    }

    public function login(Request $requestget){
        $stdid = $requestget->input('stdid');
        $pws = $requestget->input('password');

        $checkpws = DB::table('users')->select('password')->where('password','=',$pws)->get();
        $checkstdid = DB::table('users')->select('stdid')->where('stdid','=',$stdid)->get();

        if ($stdid == $checkstdid){
            if (Hash::check($pws, $checkpws)) {
                // The passwords match...
            } else {
                return response()->json(['code'=>'Wrong Student ID or Password!'],400);
            }
        } else {
            return response()->json(['code'=>'Wrong Student ID or Password!'],400);
        }

        
    }
}
