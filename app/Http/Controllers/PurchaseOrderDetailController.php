<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseOrderDetail;
use Illuminate\Http\Request;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use App\User;


class PurchaseOrderDetailController extends Controller
{
    public function show($id)

    {   

        $i=0;
        $purchaseTotal=0;
        $purchaseTotalFinal=0;
        $product         = Product::all();
        $purchaseOrders  = PurchaseOrder::find($id);
        $user = User::find($purchaseOrders->user_id);
        
        // $user = User::findOrFail('$purchaseOrders->user_id');
        // dd($user);
        $purchaseOrderDetails = $purchaseOrders->purchaseOrderDetails;
        // $product         = Product::find($purchaseOrderDetails->id);
        
        // dd($purchaseOrderDetails);
       
        return view('admin.purchaseorderdetails.show',compact('purchaseOrders','purchaseOrderDetails','user','product','i','purchaseTotal','purchaseTotalFinal'));
        
       
        
    }
}