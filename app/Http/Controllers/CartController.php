<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Hash;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $id = $request->input('id');
        $amount = $request->input('amount');
        $shopid = $request->input('shopid');
        $comb = [$shopid,$id,$amount];
        session()->push('crt',$comb);
        return redirect()->route('cart');
    }

    public function makeorder(Request $requestmake)
    {
        $flag = $requestmake->input('flag');
        if ($flag=='clr'){
            session()->forget('crt');
            return redirect()->route('cart');
        } else {
            $ordersarr = session('crt');
            $time = $requestmake->input('time');
            $JSON = json_encode($ordersarr);
            DB::table('orders')->insert([
                'OrderJSON'=>$JSON,
                'timetopickup'=>$time,
                'stdid'=>session('id'),
            ],);

            session()->forget('crt');
            return redirect()->route('cart');
        }

    }
}
