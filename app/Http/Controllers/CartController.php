<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\PurchaseOrder;
use App\PurchaseOrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Color;
use App\Events\PurchaseOrderEvent;
use Maatwebsite\Excel\Concerns\ToArray;
use MercadoPago\Item;
use MP;
use App\Notifications\PurchaseOrderNotification;
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



   
    
   

}