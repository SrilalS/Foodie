<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function Logout(Request $request){
        session()->put('lgd','0');
        return redirect()->route('index');
    }

    public function addnew(Request $request){
        session()->put('lgd','0');
        return redirect()->route('index');
    }
}
