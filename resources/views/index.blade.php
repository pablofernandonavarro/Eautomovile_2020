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
    <div class="wrapperCard ">
        <div class="carousel owl-carousel">
            <div class="card card-1 "></div>
            <div class="card card-2"></div>
            <div class="card card-3"></div>
            <div class="card card-4"></div>
            {{-- <div class="card card-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.5702327759664!2d-58.56000008560956!3d-34.589739480463074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7da7344b409%3A0xba90acbad93ac597!2sE%20Automovile!5e0!3m2!1ses!2sar!4v1610364635308!5m2!1ses!2sar"
                    width="480" height="80" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0">
                </iframe>
            </div> --}}


        </div>
    </div>
</div>


{{-- -----------------   /carrousel-card ----------------------- --}}

<div>
    <h1 class="text-black display-flex text-center"> Selecione su Cubre alfombra Vapren :</h1>
</div>
<div class="centralSearch shadow col-12 col-lg-12 d-flex justify-content-center ">

    <div class="d-flex justify-content-center ml-4 ">
        <form class="row" action="{{route('productSearch')}}" method="get">
            @csrf



            <div class="col-12 col-lg-5 row">
                <label class="h4 text-white col-md-12 col-lg-4">Uso:</label>
                <select class="form-select col-xs-4 col-md-12" name="category_id" id="utility"
                    aria-label="Default select example">
                    <option disabled="disabled" selected>Escoger un valor</option>
                    @foreach($categories as $category)

                    <option class="form-control" value="{{ $category->id }}">
                        {{$category->category_name}} </option>
                    @endforeach

                </select>
                {!!$errors->first('category_id','<small class="alert alert-danger col-md-12" role="alert">:message
                </small>')!!}
            </div>


            <div class="col-12 col-lg-4 row">
                <label class="h4 text-white col-md-12 col-lg-4">Modelo:</label>
                <select class="form-select col-xs-4 col-md-12" name="pattern_id" id="patterns">
                    <option disabled="disabled" selected>Escoger un valor</option>
                    @foreach($patterns as $pattern)

                    <option class="options" value="{{ $pattern->id }}">{{$pattern->pattern_name}}
                    </option>
                    @endforeach
                </select>
                {!!$errors->first('pattern_id','<small class="alert alert-danger col-md-12" role="alert">:message
                </small>')!!}
            </div>


            <div class="col-12 col-lg-3 row">
                <label class="h4 text-white col-md-12">Año:</label>
                <input class="form-select col-md-12" type="number" name="year" id="years" max="2025" min="1960"
                    placeholder="Ingrese el año">


                {!!$errors->first('year','<small class="alert alert-danger " role="alert">:message
                </small>')!!}
            </div>
            <div class="col mt-2 mb-2">
                <button type="submit" class="btn  btn-success">
                    <i class="fas fa-search ml-1"></i>

                    Buscar
                </button>
            </div>



        </form>
    </div>
</div>




<h1 class="d-flex justify-content-center text-danger mt-4">El resultado de tu busquedas es:</h1>
{{-- ---------------------------- Card-products --------------------- --}}

<div>
    <div class="container d-flex justify-content-center mt-2">

        <div class="row">
            @foreach ($products as $product)


            <div class="col-md-4 ">
                {{-- <a href="{{route("productShowApp")}}"></a> --}}
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="card-img-actions"> <img src="{{'/storage/'.$product->pictures[0]->url_picture}}"
                                class="card-img img-fluid img-thumbnail" alt=""> </div>
                    </div>
                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-2"> <a href="{{url("productShowApp/".$product->id)}}"
                                    class="text-default mb-2" data-abc="true">{!!$product->description_large!!}</a>
                            </h6> <a href="#" class="text-muted" data-abc="true">Uso
                                :{{$product->category->category_name}}</a>
                        </div>
                        <h3 class="mb-0 font-weight-semibold">${{$product->price}}</h3>
                        <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i
                                class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                        <div class="text-muted mb-3">{{$product->visit}}</div>
                        <a href="/productShowApp/{{$product->slug}}" type="button" class="btn bg-cart">
                            <i class="fas fa-eye"></i>
                            Ver</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
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