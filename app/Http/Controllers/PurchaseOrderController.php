<?php

namespace App\Http\Controllers;

use App\PurchaseOrder;
use Illuminate\Http\Request;


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
           
            return view('admin.orders.index',compact('purchaseOrders'));
      
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {   
        
        $purchaseOrders = PurchaseOrder::with('user')->findOrFail($id);

        return view('admin.orders.show',compact('purchaseOrders'));
    }

    
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

  
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

  
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
