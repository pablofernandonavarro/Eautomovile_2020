@extends('master')



@section('content')
<?php


        MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');


       

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
?>


<div class="container mb-3" style="margin-top: 8%;">

    <h3>Mi carrito</h3>
    <hr>
    <div class="row">


        <div class="shoppingCart col-md-8 bg-light border ml-3 mr-1">
            @if (count(Cart::getContent()))
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
                                <button type="submit" class="btn btn-link btn-sm text-danger">eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <p>Carrito vacio</p>
            @endif

        </div>


        <div class="purchaseSummary col-md-3 ml-5 bg-light border p-3">
            <h6>RESUMEN DE COMPRA:</h6>
            <table class="table table-striped ">
                <thead>
                    <th>Item</th>
                    <th>subtotal</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{ $item->getPriceSum()}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <div class="row">
                <h4 class="ml-1">Total:</h4>
                <h2 class="text-danger ml-5"> ${{Cart::getTotal()}}</h2>
            </div>

        </div>


    </div>
    <div class="row justify-content-end mr-3">
        <a href="/" class="h5 text-primary mt-3 mr-3">Comparar más productos</a>
        <form action="/pagar" method="post">
            @csrf
            <script
            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
            data-preference-id="<?php echo $preference->id; ?>">
          </script>
        </form>
    </div>

   

    @endsection