@extends('master')


@section('content')
<div class="container mb-3" style="margin-top: 8%;">

    <h3>Mi carrito</h3>
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
                        <td>{{$loop->iteration}}</td>
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
                        <td>{{$loop->iteration}}</td>
                       
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
                <h2 class="text-danger ml-5"> ${{c(Cart::getTotal())}}</h2>
            </div>

        </div>


    </div>
    <div class="row justify-content-end mr-3">
        <a href="/index" class="btn btn-success mt-3 mr-3">seguir comprando</a>
        <a href="{{route('users.basicDataUsers',$user)}}" class="btn btn-primary mt-3 mr-3">Pagar</a>
    </div>
    @else
    <p>Carrito vacio</p>
    <a href="/index" class="btn btn-link btn-sm text-danger">Empezando Comprar</a>
    @endif

</div>
    @endsection