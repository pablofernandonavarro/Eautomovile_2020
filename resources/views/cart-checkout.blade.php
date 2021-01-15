@extends('master')



@section('content')



<div class="container mb-3" style="margin-top: 8%;">

    <h3>Mi carrito</h3>
    <hr>
    <div class="row">


        <div class="shoppingCart col-md-8 bg-light border ml-3 mr-1"> 
            @if (count(Cart::getContent()))
            <table class="table table-striped ">
                <thead>
                    <th>ID</th>
                    <th>Images</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td></td>
                        <td style="width: 80%;">{!!$item->name!!}</td>
                        <td >${{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <form action="{{route('cart.removeItem')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
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
            <hr>
        </div>

    </div>

</div>



    @endsection