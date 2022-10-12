<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Order;
//use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Platformdata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AllDataApiController extends Controller
{
    public function index(Request $request)
    {

        $Platformdata =  Platformdata::all();
            return response()->json([
            'message'=> 'allPlatformdata',
            'status' => true ,
            'date' => $Platformdata,
            ]);

    }


    public function storeCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "price" => 'required',
            "user_id" => 'required',
            "section_id" => 'required',
            "clases_id" => 'required',
            "order_id" => 'nullable',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

      $cart =  Cart::create($request->all());

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $cart
        ], 201);
    //    Cart::create($request->all());
    }

    public function checkout(Request $request)
    {

        $user_id = Auth::user()->id;

        $carts = Cart::where('user_id' , $user_id)->whereNull('order_id')->get();
        $amount = 0;
        foreach ($carts as $cart ) :
        $amount = $cart->price;
        endforeach;
            $url = "https://eu-test.oppwa.com/v1/checkouts";
            $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                        "&amount=$amount" .
                        "&currency=USD" .
                        "&paymentType=DB";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $responseData = json_decode($responseData , true);
            $checkoutId = $responseData['id'];

            return view('M' , compact('checkoutId' , 'carts'));

    }


    public function thanks(Request $request)
    {

        //  return Auth::user();
        // $mm = Package::all()->last();
        // return $mm->clases_id;
        $user_id = Auth::user()->id;

         $carts = Cart::where('user_id' ,$user_id)->whereNull('order_id')->get();

         $amount = 0;
         foreach ($carts as $cart ) :
         $amount = $cart->price;
        endforeach;

          $resourcePath = request()->resourcePath;

          $url = "https://eu-test.oppwa.com/$resourcePath";
          $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $responseData = curl_exec($ch);
         if(curl_errno($ch)) {
             return curl_error($ch);
         }
         curl_close($ch);
         $responseData = json_decode($responseData , true);

          if($responseData['result']['code'] == '000.100.110'){



            $AddPackage = Cart::where('user_id' , 2)->latest()->first();

        Package::create([
            'user_id' => $AddPackage->user_id,
            'clases_id' => $AddPackage->clases_id,
            'section_id' =>$AddPackage->section_id,
            'amount' => $amount,
        ]);
        $order = Order::create([
            'total' => $amount ,
            'user_id' => 3
            ]);
          $mm =  Cart::where('user_id' ,3)
                ->whereNull('order_id')
                ->update(['order_id' => $order->id
                ]);

            Payment::create([
                'total' => $amount ,
                'user_id' => 3,
                'tranaction_id' => $responseData['id'],
                'order_id' => $order->id,
            ]);


          }


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('invoice' ,  ['carts' => $carts]);
        return   $pdf->stream();

    }



}
