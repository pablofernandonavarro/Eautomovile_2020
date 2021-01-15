<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;


class CartController extends Controller
{  
    public function cart(){
  
        return view('cart-checkout');
    }
    
    public function add(Request $request){

    $product = Product::find($request->id);
    $rowId = $request->id;
    
//   dd($request);
    Cart::add(array(
        'id' => $rowId,
        'name' => $product->description_large,
        'price' => $product->price,
        'quantity' => $request->quantity,
        'attributes' => array(
            "url_pictures"=> $product->pictures,
        ),
        'associatedModel' => $product,
            
     ));
        return view('cart-checkout');
    }
    public function removeItem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}
