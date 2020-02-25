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

        $pws = $request->input('password');
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
            'password'=>hash('sha256', $pws),
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

        $checkpws = DB::table('users')->where('stdid',$stdid)->value('password');
        $checkstdid = DB::table('users')->where('stdid',$stdid)->value('stdid');

        if ($stdid === $checkstdid){
            if (hash('sha256', $pws)== $checkpws) {
                return response()->json(['code'=>'Success!'],200);
            } else {
                return response()->json(['code'=>'Wrong Student ID or Password!'],401);
            }
        } else {
            return response()->json(['code'=>'Wrong Student ID or Password!'],402);
        }

        
    }

    public function update(Request $requestupdate){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $stdid = $request->input('stdid');

        $pws = $request->input('password');
        $mobile = $request->input('mobile');

        $nic = $request->input('nic');
        $email = $request->input('email');
        $dob = $request->input('dob');

        $faculty = $request->input('faculty');
        $batch = $request->input('batch');
        $avatar = $request->input('avatar');

        //TO-DO//
        
    }
}
