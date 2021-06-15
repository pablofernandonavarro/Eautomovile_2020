@extends('master') 
@php


require base_path('/vendor/autoload.php');

MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));


$preference = new MercadoPago\Preference();


 if (count(Cart::getContent()) > 0) {

//  $cart = Cart::session(auth()->id())->getContent();
 
 foreach ( $cart as $cart_product) {
     
   
    $item = new MercadoPago\item();
  
    $item->title      = $cart_product->name;
    $item->quantity   = $cart_product->quantity;
    $item->unit_price = round($cart_product->getPriceWithConditions ());

    $cart_products[]=$item;
    
 }



 $preference->back_urls = array(
    "success" => "http://localhost:8000/cart/checkoutSuccess",
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";


$preference->items = $cart_products;
$preference->save();

 }




@endphp

@section('content')
<div class="container mb-3 " style="margin-top: 14%;">

    <h3>Mi Compra</h3>
    <hr>
    <div class="row">


        <div class="shoppingCart col-md-7 bg-light border ml-3 ">
            @if (count(Cart::getContent())>0)
            <table class="table table-striped ">
                <thead>
                    <th>Item</th>
                    <th>Imagenes</th>
                    <th>Descripcion</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>
                            <img src="{{'/storage/'.$item->attributes->picture}}" alt="foto" width="50px">
                        </td>
                        <td style="width: 80%;">{!!$item->name!!}</td>
                        <td>{{$item->attributes->color}}</td>
                        <td>${{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <form action="{{route('cart.removeItem')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-link btn-sm text-danger">eliminar item</button>

                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <form action="{{route('cart.clear')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-link btn-sm text-danger">Eliminar todos los item del
                        carrito</button>

                </form>
            </div>




        </div>


        <div class="purchaseSummary col-md-4 ml-5 bg-light border p-3">
            <h6>RESUMEN DE COMPRA:</h6>
            <table class="table table-striped ">
                <thead>
                    <th>Item</th>
                    <th>Precio</th>
                    <th>adicional 20% color</th>
                    <th>subtotal</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->getPriceWithConditions()-$item->price}}</td>
                        <td>{{$item->quantity*($item->price+$item->getPriceWithConditions()-$item->price)}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <div class="row">
                <h4 class="ml-1">Total:</h4>
                <h2 class="text-danger ml-5"> ${{round(Cart::getTotal())}}</h2>
            </div>

        </div>


    </div>
    <div class="row justify-content-end mr-3">
        <div class="cho-container mt-3">
            
        </div>


    </div>
    @else
    <p>Carrito vacio</p>
    <a href="/index" class="btn btn-link btn-sm text-danger">Empezando Comprar</a>
    @endif

</div>
@endsection



@section('scripts')
    

<script src="https:sdk.mercadopago.com/js/v2"></script>





<script>
   
      const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
            locale: 'es-AR'
      });
    
      mp.checkout({
          preference: {
              id: '{{$preference->id}}'
          },
          render: {
                container: '.cho-container',  
                label: 'Pagar',  
          }
    });
</script>

@endsection