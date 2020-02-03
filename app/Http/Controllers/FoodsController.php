<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Hash;

class FoodsController extends Controller
{
    public function addFood(Request $request){

        $name = $request->input('name');

        $price = $request->input('price');

        $shopid = $request->input('shopid');

        $desc = $request->input('desc');

        $photo = $request->input('avatar');

        
    }
}
