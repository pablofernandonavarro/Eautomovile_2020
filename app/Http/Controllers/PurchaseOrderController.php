<?php

namespace App\Http\Controllers;

use App\Product;
use App\PurchaseOrder;
use Illuminate\Http\Request;
use App\PurchaseOrderDetail;
use App\User;

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
        
    }

   
    public function store(Request $request)
    {
        
    }

  
   
    
    public function edit(PurchaseOrder $purchaseOrder,$id)

    {  
       
        $purchaseOrder = PurchaseOrder::find($id);
        
       
        $user = PurchaseOrder::find($id)->with('user')->get()->first();
       
             return view('admin.purchaseorders.edit',compact('user','purchaseOrder'));
            
    }

  
    public function update(Request $request, PurchaseOrder $purchaseOrder,$id)
    {   
        $user = PurchaseOrder::find($id)->with('user')->get()->first();
        // dd($user->id);
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
}
