<?php

namespace App\Http\Controllers;

use App\Cart;
use App\TransactionDetail;
use App\Transactions;
use Midtrans\Snap;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        // $user->update($request->except('total_price'));
        $carts = Cart::where('users_id', Auth::user()->id)->get();
        $code = mt_rand(00000, 99999);

        $transactions = Transactions::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => (int) $request->total_price,
            'transaction-status' => 'PENDING',
            'code' => 'STORE-' . $code,
        ]);

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transactions_id' => $transactions->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'resi' => '',
                'shipping_status' => 'PENDING',
                'code' => 'TRX-' . $code,
            ]);
        }

        Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->delete();
        return redirect()->route('cart');

        // INTEGRASI MIDTRANS
        /*
        \Midtrans\Config::$serverKey = Config::get('services.midtrans.serverKey');;
        \Midtrans\Config::$clientKey = Config::get('services.midtrans.clientKey');;
        \Midtrans\Config::$isProduction = Config::get('services.midtrans.isProduction');;
        \Midtrans\Config::$isSanitized = Config::get('services.midtrans.isSanitized');;
        \Midtrans\Config::$is3ds = Config::get('services.midtrans.is3ds');;

        $data = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transactions->total_price,
            ),
            'enabled_payments' => array(
                'gopay', 'permata_va', 'bri_va', 'bni_va', 'echannel',
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );
        try {
            $paymentUrl = Snap::createTransaction($data)->redirect_url;
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        */
    }
    public function callback(Request $request)
    {
    }
}
