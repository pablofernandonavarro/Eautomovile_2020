@extends('master')
@section('styles')

<link rel="stylesheet" href="{{asset('css/productShowApp.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">

@endsection

@section('content')


<div class="container-fluid bg-mid-gray" style="margin-top: 8%;">
    <form action="{{route('cart.add',$product->id)}}" method="GET">
        @csrf


        <div class="main row ml-2 mr-2">

            <div class="col-md-7 bg-white border mt-3">
                <div class="row ">
                    <div>
                        @foreach ($product->pictures as $picture)
                        <div class="mt-2 mb-2 col-md-2 ml-2 mt-4">
                            <a href="">
                                <img class="img border" src="{{'/storage/'.$picture->url_picture}}" width="100px">
                            </a>
                        </div>

                        @endforeach
                    </div>

                    <img class="principalPicture img" src="{{'/storage/'.$picture->url_picture}}">

                </div>
            </div>

            <div class="col-md-5 bg-white border mt-3">
                <div class="sku mt-3">
                    <span class="sku text-secondary">Sku{{$product->sku}}</span>
                </div>
                <div class="description">
                    <h2 class="description">{!!$product->description_large!!}</h2>
                </div>
                <div class="price">
                    <h2 class="price">${{$product->price}}</h2>
                </div>
                <div class="creditCard row">
                    <div class="ml-2 mr-2">
                        <img src="/credit_Card.png" alt="foto" width="25px">
                    </div>
                    <div class="text-success">
                        Paga en con tarjeta :
                    </div>
                </div>

                <div class="mt-2 ml-5">
                    <img src="/visa.png" alt="" width="35px">
                    <img src="/mastercard.png" alt="" width="35px">
                    <img src="/cabal.png" alt="" width="35px">
                </div>
                <div class="currier row">
                    <div class="ml-1 mr-2">
                        <img src="/currier.png" alt="foto" width="50px">
                    </div>
                    <div class="mt-4">
                        Envios a todo el pais.
                    </div>
                </div>
                <div>
                    <span class="text-muted ml-5">Conoce los tiempos y las formas de Envios</span>
                    <a class="text-primary ml-3" href="{{route('currier')}}">ingresa</a>
                </div>
                <label class="description mt-4 mb-4">Color</label>
                <div>
                    <select name="color" id="color" class="form-control">

                        @foreach($product->colors as $color)
                        @if($color->color_name == "Negro")
                        <option value="{{ $color->color_name }}" selected>
                            {{$color->color_name}}
                        </option>
                        @else
                        <option value="{{ $color->color_name }}">
                            {{$color->color_name}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>


                <div>
                    <input type="number" class="quantity border mt-4" name="quantity" value="1">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{!!$product->description_large!!}">
                    <input type="hidden" name="price" value="{{$product->price}}">

                    <button type="submit" class="btn btn-primary btn-lg ml-3">Agregar a carrito</button>
                </div>
    </form>

    <div class="protetedBuy mt-5 row">

        <div class="ml-4 mr-2">
            <img src="/protetedBuy.png" alt="foto" width="40px">
        </div>
        <div class="mt-3">
            <span class="text-primary">Compra protegida,</span>
            certificado ssl compra 100% segura.
        </div>
    </div>
    <div>
        <label for="" class="description text-danger mt-5 h3 p-3">Atencion !! El producto que no es color Negro
            tiene un
            recargo
            del
            20%</label>
    </div>

</div>

<div class="col-md-12 bg-white border mb-3 ">
    <div class="p-3">
        {!!$product->spec!!}
    </div>
</div>
</div>



</div>



@endsection