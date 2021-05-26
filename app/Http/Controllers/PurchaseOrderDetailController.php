<?php

namespace App\Http\Controllers;

use App\PurchaseOrderDetail;
use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\User;
use DetailPurchase;

class PurchaseOrderDetailController extends Controller
{
    public function show($id)
    {   
        $Purchase    = PurchaseOrder::findOrfail($id)->with('purchaseOrderDetails');
        // $detailPurchase = PurchaseOrderDetail::findOrfail($Purchase);
        // dd($detailPurchase);
        // $purchaseOrder    = $detailPurchase->purchase_order_id;

        // $purchaseOrder = PurchaseOrder::find($purchaseOrder);
        dd($Purchase);
        
        // dd($purchaseOrder);
        return view('admin.ordersDetail.show',compact('purchaseOrders','detailPurchase'));
        
       
        
    }
}