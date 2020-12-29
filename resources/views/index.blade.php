@extends('master')

@section('styles')
<link rel="stylesheet" href="{{asset('css/card_index.css')}}">

<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endsection



@section('content') <br>
<br>
<br>
<br>
@if (session()->has('info'))
<div class="alert alert-success">
    {{ session('info') }}
</div>
@endif
<br>
<div class="firstPhoto">
    <div>
        <h1 class="text-white display-flex text-center mt-2"> Selecione su vehiculo:</h1>
    </div>
    <div class="centralSearch shadow justify-content-center">
        <div class="text-align-center">
            <label class="h3 text-white" style="width: 13%;">Uso:</label>
            <label class="h3 text-white" style="width: 43%;">Modelo:</label>
            <label class="h3 text-white" style="width: 33%;">Año:</label>
        </div>
        <div class="row p-2 justify-content-center">

            <select class="category bg-white h3" name="usuario" id="utility">
                @foreach($categories as $category)
                <option class="form-control">{{$category->category_name}} </option>
                @endforeach

            </select>


            <select class="pattern bg-white h3" name="pattern_id" id="patterns">

                @foreach($patterns as $pattern)

                <option class="options" value="{{ $pattern->id }}" selected>{{$pattern->pattern_name}}
                </option>
                @endforeach
            </select>



            <select class="years bg-white h3" type="text" name="year" id="years" placeholder="Ingrese el año">
                @for ($i = 1900; $i < 2100; $i++) <option class="h3">{{$i}}</option>

                    @endfor
            </select>
            <button class="btn btn-primary mx-lg-5">
                Buscar
            </button>

        </div>
    </div>
</div>




{{-- ---------------------------- Card-products --------------------- --}}
<br>
<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">
        @foreach ($products as $product)


        <div class="col-md-4 mt-2">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="{{'/storage/'.$product->pictures[0]->url_picture}}"
                            class="card-img img-fluid" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2"
                                data-abc="true">{{$product->description_short}}</a> </h6> <a href="#" class="text-muted"
                            data-abc="true">Uso :{{$product->category->category_name}}</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">${{$product->price}}</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i
                            class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">{{$product->visit}}</div> <button type="button" class="btn bg-cart"><i
                            class="fa fa-cart-plus mr-2"></i> Agregar al carrito </button>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<br>

@endsection

@section('scripts')

<script src="/adminlte/plugins/select2/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#utility').select2();
        $('#patterns').select2();
        $('#years').select2();
    });
</script>

@endsection