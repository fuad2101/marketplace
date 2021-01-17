<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Redirect;

class DetailController extends Controller
{
    public function index($id){

        $product = Product::with('galleries','user')->where('slug',$id)->firstOrFail();
         return view('pages.details',[
             'product' => $product,
         ]);

    }

    public function add($id){
        $data = [
            'products_id'=>$id,
            'users_id'=>Auth::user()->id,
        ];
        Cart::create($data);

        return redirect()->route('cart');
    }
}
