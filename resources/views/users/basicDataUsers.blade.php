@extends('master')
{{-- 
    

        if (count(Cart::getContent()) == 0) {
         
        

        // MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');


       

        // Agrega credenciales  
        MercadoPago\SDK::setAccessToken('TEST-3259208657251687-012011-776d3f76fad5986008ff10512342639d-182897662');

        
     // Crea un objeto de preferencia
$preference = new MercadoPago\Preference();


$cart = Cart::session(auth()->id())->getContent();

$item=array();
foreach ( $cart as  $carts) {

    $item = new MercadoPago\Item();
    $item->title = $carts->large_description;
    $item->quantity = $carts->quantity;
    $item->unit_price = Cart::getTotal();
    
}

$preference->items = array($item); 

 $preference->back_urls = array(
    "success" => "http://localhost:8000/checkoutthanks",
    // "failure" => "http://www.tu-sitio/failure",
    // "pending" => "http://www.tu-sitio/pending"
);
$preference->auto_return = "approved";

$preference->save();
}     
       
      
    
      
?> --}}
@section('content')

<div class="container">

    <div class="col-md-12 p-5">
        <div class="card-header mt-4 ">
            <h1 class="d-flex justify-content-center mt-4">Completa tus datos del envío</h1>
        </div>
        @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
        @endif

        <form action="{{route('users.basicDataUsers',$user->id)}}" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf

            <!-- ACCOUNT DATA  -->

            <h3 class="car-title mt-3">Datos de tu cuenta:</h3>
            <div class="card p-4 shadow-lg">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Nombre:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="name" value='{{$user->name}}'
                                placeholder="Ingrese su nombre ">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Apellido:</label>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_lastName"
                                value='{{$user->user_lastName}}' placeholder="Ingrese su Apellido">
                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <label>Email :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="email" value='{{$user->email}}'
                                placeholder="Ingrese su email">
                        </div>
                    </div>
                    <div class=" col-sm-4 mt-4">
                        <label>Telefono:</label>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_phone" value='{{$user->user_phone}}'
                                placeholder="Ingrese su numero de telefono">
                        </div>
                    </div>
                </div>
            </div>


            <h3 class="car-title mt-3">Domicilios:</h3>
            <div class="card p-4 shadow-lg">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Domicilio de entrega:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_deliveryAddress"
                                value='{{$user->user_deliveryAddress}}' placeholder="Domicilio de entrega">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Localidad de entrega:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_deliveryAddressLocation"
                                value='{{$user->user_deliveryAddressLocation}}' placeholder="Localidad de entrega">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Provincia:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_deliveryAddressProvince"
                                value='{{$user->user_deliveryAddressProvince}}' placeholder="Provincia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <label>Codigo Postal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_deliveryAddressPostalCode"
                                value='{{$user->user_deliveryAddressPostalCode}}' placeholder="Codigo postal">
                        </div>
                    </div>
                    <div class=" col-sm-8 mt-4">
                        <label>Referencias sobre domicilio:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_deliveryAddressRef"
                                value='{{$user->user_deliveryAddressRef}}'
                                placeholder="ej: esquina san martin (porton rojo)">
                        </div>
                    </div>

                </div>

            </div>





            <!-- BUTTON SUBMIT    -->

            <div class="d-flex justify-content-between mr-2">

                <button type="submit" class="col-md-12 mt-4 mb-4 btn btn-success btn-lg">Continuar con la
                    compra</button>
                </a>
            </div>

            <!-- /BUTTON SUBMIT    -->
        </form>

    </div>
</div>
@endsection