<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Color;
use MercadoPago\SDK;
use MercadoPago\Preference;
class CartController extends Controller
{ 
    public function cart(){
        
        return view('cart-checkout');
    }
    public function add(Request $request){

    $product = Product::find($request->id);
    $picture = $product->pictures[0]->url_picture;
    $rowid = $request->id;
    // dd($pictures);
  
  

    Cart :: add ( array (
        'id'        => $rowid,
        'name'     => $request->name,
        'price'    => $request->price,
        'quantity'  => $request->quantity,
        'attributes' => array(
           
            'color' => $request->color,
            'picture'=> $picture,
          )
        
   ));

        return view('/cart-checkout');
    }
    
    public function removeItem(Request $request) {

       
        Cart::remove([
        'id' => $request->id,
        ]);
        return view('/cart-checkout');
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }

    public function mercadoPago(){


        require __DIR__ .  '/vendor/autoload.php';

        MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');


        require __DIR__ .  '/vendor/autoload.php';

        // Agrega credenciales  
        MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Mi producto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();

        return view('/cart-checkout',compact('preference'));
 }
}
