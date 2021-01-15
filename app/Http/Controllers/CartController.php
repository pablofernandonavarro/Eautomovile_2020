<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Color;

class CartController extends Controller
{ 
    public function cart(){
        
        return view('cart-checkout');
    }
    public function add(Request $request){

    $product = Product::find($request->id);
    $picture = $product->pictures[0]->url_picture;
    $rowid = $request->id;
    // dd($pictures);
  
  

    Cart :: add ( array (
        'id'        => $rowid,
        'name'     => $request->name,
        'price'    => $request->price,
        'quantity'  => $request->quantity,
        'attributes' => array(
           
            'color' => $request->color,
            'picture'=> $picture,
          )
        
   ));

        return view('/cart-checkout');
    }
    
    public function removeItem(Request $request) {

       
        Cart::remove([
        'id' => $request->id,
        ]);
        return view('/cart-checkout');
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}
