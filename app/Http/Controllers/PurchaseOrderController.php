<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseOrder;
use Illuminate\Http\Request;
use App\PurchaseOrderDetail;
use App\User;
use Cart;
use App\Events\PurchaseOrderEvent;
use App\Notifications\PurchaseOrderNotification;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
{
   
    public function index()
    {    
        $purchaseOrders = PurchaseOrder::with('user')->get();
           return view('admin.purchaseorders.index',compact('purchaseOrders'));
      
    }


    public function edit(PurchaseOrder $purchaseOrder,$id){  
       
        $purchaseOrder = PurchaseOrder::find($id);
        $user = PurchaseOrder::find($id)->with('user')->get()->first();
       
            return view('admin.purchaseorders.edit',compact('user','purchaseOrder'));
            
    }

  
    public function update(Request $request, PurchaseOrder $purchaseOrder,$id)
    {   
        $user = PurchaseOrder::find($id)->with('user')->get()->first();
     
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->guide_number  = $request->input('guide_number');
        $purchaseOrder->status        = $request->input('status');
        $purchaseOrder->observation   = $request->input('observation');
        $purchaseOrder->total         = $request->input('total');
        $purchaseOrder->user_id       = $request->input('user_id');
        $purchaseOrder->save();

        return redirect('admin/purchaseorders');
        
    }

  
    public function destroy($id)
    { 
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->delete();

        return  back();
    }

    public function checkout(Cart $cart){
       
        $user = Auth()->user();
        $cart = Cart::session(auth()->id())->getContent();
        
        return view('cart.checkout',compact('cart','user'));
    }

    public function store(Cart $cart, Request $request){

        $user = Auth()->user();

        $cart = Cart::session(auth()->id())->getContent();
    
        
        $cartTotal = Cart::getTotal();
    
        
         $data =  $request->all();
         $data['user_id'] =  $user->id;
         $data['total']   = $cartTotal;
         $purchase_order = PurchaseOrder::create($data);
         event(new PurchaseOrderEvent($purchase_order));
       
        
        
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

      

        return view('checkoutSuccess');

    }
    public function markNotification(){

        $purchaseOrderNotifications= auth()->user()->unreadNotifications;
       
        return view('admin.markasread', compact('purchaseOrderNotifications'));
    }



}
