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
        $checkmobile = Validator::make($request->json()->all(), [
            'mobile' => 'required'
        ]);

        $checkpws = Validator::make($request->json()->all(), [
            'pws' => 'required'
        ]);

        return response()->json(['name'=>$fname.' '.$name,'email'=>$email]);
    }
}
