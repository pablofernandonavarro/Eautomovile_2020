<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\PurchaseOrder;
use App\PurchaseOrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Color;
use Maatwebsite\Excel\Concerns\ToArray;
use MercadoPago\Item;

use MP;

class CartController extends Controller
{ 
    public function index(){
        $user = Auth()->user();
      
        $cart = Cart::session(auth()->id())->getContent();
       
        return view('cart.index',compact('cart','user'));
    }

    public function add(Product $product,Request $request){
   
    $picture = $product->pictures[0]->url_picture;
    
    if ($request->color != 'Negro') {
         
        $saleCondition = new \Darryldecode\Cart\CartCondition(array(
        'name' => '20% adicional color',
        'type' => 'tax',
        'value' => '20%',
        ));
 
        Cart::session(auth()->id())->add(array(
            'id'            => $product->id,
            'product_id'    => $product->id,
            'name'          => $product->description_large,
            'price'         => $product->price,
            'quantity'      => $request->quantity,
            'conditions'    => $saleCondition,
            
            'attributes' => array(
                'color' => $request->color,
                'picture'=> $picture,
                
            ),
            'associatedModel' => $product,
        ));
  
       
    }
    else{
        Cart::session(auth()->id())->add(array(
            'id'            => $product->id,
            'name'          => $product->description_large,
            'price'         => $product->price,
            'quantity'      => $request->quantity,
            
            'attributes' => array(
                'color' => $request->color,
                'picture'=> $picture,
                
            ),
            'associatedModel' => $product
        ));
        
      
    }
  
        return redirect()->route('cart.index');
    }
    
    public function removeItem(Request $request) {

       
        Cart::session(auth()->id())->remove([
        'id' => $request->id,
        ]);
        return view('/cart.index');
    }

    public function clear(){
        Cart::session(auth()->id())->clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }


    public function checkoutThanks(Request $request,Product $product){

       
     
        $cart = Cart::session(auth()->id())->getContent();
        $cartTotal = Cart::getTotal();
        $user = Auth::user();

        $purchase_order= new PurchaseOrder;
        $purchase_order->user_id = $user->id;
        $purchase_order->total =$cartTotal;
        
       
        $purchase_order->save();
        
        $purchase_order_all = PurchaseOrder::all();

        
        
        foreach (Cart::getContent() as $item) {
           
             $product_id[]= $item->id;
           
            
             $purchase_order_detail= new PurchaseOrderDetail;

             $purchase_order_detail->purchase_order_id = $purchase_order_all->last()->id;
             $purchase_order_detail->product_id        = $item->model->id;
             $purchase_order_detail->color             = $item->attributes->color;
             $purchase_order_detail->quantity          = $item->quantity;
             $purchase_order_detail->price_unit         = $item->getPriceWithConditions();
            
             
             $purchase_order_detail->save();
             $purchase_order_detail->purchaseOrder()->associate($purchase_order_all->last()->id);
            
        }
       
        
      
        
   
        Cart::session(auth()->id())->clear();

        return view('checkoutMercadoPago.checkoutSuccess');
    }
    public function checkout(){

        $user = Auth()->user();
      
        $cart = Cart::session(auth()->id())->getContent();
       
        return view('checkoutMercadoPago/checkout',compact('cart','user'));
    }
    public function checkoutsuccess(){

          
       
        return view('checkoutMercadoPago/checkoutSuccess',compact('cart','user'));
    }
}
