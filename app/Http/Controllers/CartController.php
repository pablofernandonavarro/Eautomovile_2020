<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use App\Color;
use MercadoPago\Item;
use MP;

class CartController extends Controller
{ 
    public function index(){

        $cart = Cart::getContent();
        
        return view('cart.index',compact('cart'));
    }

    public function add(Product $product){

    
    $picture = $product->pictures[0]->url_picture;
     
     
  
  

    Cart::session(auth()->id())->add ( array (
        'id'            => $product->id,
        'name'          => $product->name,
        'price'         => $product->price,
        'quantity'      => $product->quantity,
        'associateModel'=> $product,
        'attributes' => array(
           
            'color' => $request->color,
            'picture'=> $picture,
          )
        
   ));
   $cart= Cart::getContent();
  
   $purchase_order = new PurchaseOrder;
  
   foreach ($cart as $item) {
       $purchase_order = new PurchaseOrder;

       $purchase_order->status = $item->name;
       $purchase_order->product_id = 1;
       //    $purchase_order->price = $item->price;
       $purchase_order->quantity= $item->quantity;
       $purchase_order->user_id = 1;
      
       $purchase_order->save();
   }  
   // Crea un ítem en la preferenc








        return redirect()->route('cart.index');
    }
    
    public function removeItem(Request $request) {

       
        Cart::remove([
        'id' => $request->id,
        ]);
        return view('/cart.index');
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }



}
