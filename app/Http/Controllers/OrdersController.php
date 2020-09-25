<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Hash;

class OrdersController extends Controller
{
    public function placeOrder(Request $request)
    {
        $foodid = $request->input('foodid');

        $stdid = $request->input('stdid');

        $price = $request->input('price');

        $amount = (int)$request->input('amount');

        $shopid = $request->input('shopid');

        $time = $request->input('time');

        $remaining = (int)DB::table('foods')->where('foodid',$foodid)->value('amount');

        if ($remaining<$amount){
            return response()->json(['Code'=>"Not Enough Is Remaining!"],400);

        } else {

            DB::table('orders')->insert([
                'foodid'=>$foodid,
                'stdid'=>$stdid,
                'price' => $price,
                'amount'=>$amount,
                'shopid' => $shopid,
                'time' => $time,
            ],);

            return response()->json(["Code"=>'Order Placed'],200);
        }



    }


    public function completeOrder(Response $response)
    {
        $orderid = $response->input('orderid');
        $shopid = $response->input('shopid');

        $order = (int)DB::table('orders')->where('orderid',$orderid)->get();

    }
}
