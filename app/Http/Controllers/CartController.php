<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;


class CartController extends Controller
{
    public function add(Request $request){

    $product = Product::find($request->product_id);
  
    Cart::add(
            $product->id,
            $product->name,
            $product->quantity,
            $product->price,
        );
        return view('cart.checkout');
    }
}
