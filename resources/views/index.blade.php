@extends('master')

@section('styles')
<link rel="stylesheet" href="{{asset('css/card_index.css')}}">

<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet" />

{{-- -----------------   carrousel-card ----------------------- --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

{{-- -----------------   /carrousel-card ----------------------- --}}
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
@if (session()->has('messages_search'))
<div class="alert alert-success">
    {{ session('messages_search') }}
</div>
@endif

{{-- -----------------   carrousel-card ----------------------- --}}

<div class="bodyCard ">
    <div class="wrapperCard bg-primary" >
        <div class="carousel owl-carousel">
            <div class="card card-1 h-5">
            
                Preguntas frecuentes :
                
            </div>
            <div class="card card-2">
                B</div>
            <div class="card card-3">
                C</div>
            <div class="card card-4">
                D</div>
            <div class="card card-5">
                E</div>
        </div>
    </div>
</div>


{{-- -----------------   /carrousel-card ----------------------- --}}
<div class="firstPhoto container-fluid">
    <div>
        <h1 class="text-black display-flex text-center mt-2"> Selecione su Cubre alfombra Vapren :</h1>
    </div>
    <div class="centralSearch shadow justify-content-center">
        <div class="text-align-center">
            <label class="h3 text-white" style="width: 13%;">Uso:</label>
            <label class="h3 text-white" style="width: 43%;">Modelo:</label>
            <label class="h3 text-white" style="width: 33%;">Año:</label>
        </div>
        <div class="row p-2 justify-content-center">
            <form action="{{route('productSearch')}}" method="get">
                @csrf
                <select class="category bg-white h3" name="category_id" id="utility" selected="hola">
                    @foreach($categories as $category)
                    <option class="form-control" value="{{ $category->id }}" selected>
                        {{$category->category_name}} </option>
                    @endforeach

                </select>


                <select class="pattern bg-white h3" name="pattern_id" id="patterns">

                    @foreach($patterns as $pattern)

                    <option class="options" value="{{ $pattern->id }}" selected>{{$pattern->pattern_name}}
                    </option>
                    @endforeach
                </select>



                <input class="inputDate mt-2" type="date" name="year" id="years" placeholder="Ingrese el año">


                <button type="submit" class="btn btn-primary mx-lg-5">
                    Buscar
                </button>
            </form>
        </div>
    </div>
</div>
<br>
@if (session('messages_search'))
<br>
<div class="alert alert-danger col-md-10" role="alert">
    <strong>Aviso :</strong> asfsafasfasfa<button type="button" class="close" data-dismiss="alert" alert-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


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
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#utility').select2();
        $('#patterns').select2();
      
    });
</script>


<script>
    $(".carousel").owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
          0:{
            items:1,
            nav: false
          },
          600:{
            items:2,
            nav: false
          },
          1000:{
            items:3,
            nav: false
          }
        }
      });
</script>


@endsection