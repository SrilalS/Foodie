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

        $amount = $request->input('amount');

        $shopid = $request->input('shopid');

        $desc = $request->input('desc');

        $photo = $request->input('avatar');

        DB::table('foods')->insert([
            'name'=>$name,
            'price'=>$price,
            'amount'=>$amount,
            'desc' => $desc,
            'shopid' => $shopid,
        ],);

        return response()-> json(['code'=>'Success!'],200);
    }

    public function getFood(Request $request){

        $shopid = $request->input('shopid');

        $name = DB::table('foods')->get();

        return response()-> json(['Food'=>$name],200);
    }

    public function getFoodfromOneShop(Request $request){

        $shopid = $request->input('shopid');

        $name = DB::table('foods')->where('shopid',$shopid)->get();

        return response()-> json(['Food'=>$name],200);
    }

    public function foodsearch(Request $request){

        $key = $request->input('key');

        $name = DB::table('foods')->where('name',$key)->get();

        return response()-> json(['Results'=>$name],200);
    }
}
