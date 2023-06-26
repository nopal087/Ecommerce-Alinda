<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    //     public function checkout(Request $request)
    //     {
    //         // return $request->all();;
    //         $request->request->add(['status' => 'Unpaid', 'payment_id' => uniqid()]); //add request
    //         // dd($request->all());
    //         // $order = Order::create($request->all());

    //         // Set your Merchant Server Key
    //         \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //         \Midtrans\Config::$isProduction = false;
    //         // Set sanitization on (default)
    //         \Midtrans\Config::$isSanitized = true;
    //         // Set 3DS transaction for credit card to true
    //         \Midtrans\Config::$is3ds = true;

    //         $params = array(
    //             'transaction_details' => array(
    //                 'order_id' => '1',
    //                 'gross_amount' => '10000'
    //             ),
    //             'customer_details' => array(
    //                 'first_name' => $request->nama,
    //                 'last_name' => ' ',
    //                 'phone' => $request->phone,
    //             ),
    //         );

    //         $snapToken = \Midtrans\Snap::getSnapToken($params);
    //         return view('User.Checkout', compact('snapToken'));
    //     }

    //     // fungsi midtrans callback untuk melakukan reques apakah pesanan yang telah dipesan sudah berhasil atau tidak dengan menampilkan status pesanan lunas atau belum lunas.
    //     public function callback(Request $request)
    //     {
    //         $serverKey = config('midtrans.server_key');
    //         $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    //         if ($hashed == $request->signature_key) {
    //             if ($request->transaction_status == 'settlement' or $request->transaction_status == 'capture') {
    //                 $order = Order::where('payment_id',  $request->order_id)->first();
    //                 $order->update(['status' => 'Paid']);
    //             }
    //         }
    //     }
    // }
}
