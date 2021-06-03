<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseOrder;
use Illuminate\Http\Request;
use App\PurchaseOrderDetail;


class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.p
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $purchaseOrders = PurchaseOrder::with('user')->get();
          
             return view('admin.purchaseorders.index',compact('purchaseOrders'));
      
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
   
    
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

  
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

  
    public function destroy($id)
    { 
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->delete();
        return  back();
    }
}
