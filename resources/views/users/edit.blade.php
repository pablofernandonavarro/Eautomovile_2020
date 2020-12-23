@extends('master')
@section('content')

<div class="container">
    <div class="col-md-12 p-5">
        <div class="card-header mt-4 ">
            <h1 class="d-flex justify-content-center mt-4">Edita tu Perfil</h1>
        </div>

        <form action="/users/{{$user->id}}" enctype="multipart/form-data" method="post">
            @method('PUT')
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
                    <div class="col-sm-4 mt-4">
                        <label>CUIT o CUIL:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_cuit" value='{{$user->user_cuit}}'
                                placeholder="Ingrese su numero de cuit o cuil">
                        </div>
                    </div>
                    <div class=" col-sm-4 mt-4">
                        <label>Razon social:</label>
                        <div class=" input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-building"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_businessName"
                                value='{{$user->user_businessName}}' placeholder="(no obligatorio)">
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

            <!-- /ACCOUNT DATA  -->

            <!-- FISCAL DATA  -->

            <h3 class="car-title mt-3">Datos Fiscales:</h3>
            <div class="card p-4 shadow-lg">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Tipo de contribuyente:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_ivaType" value='{{$user->user_ivaType}}'
                                placeholder="Tipo de contribuyente">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Exclusion de I.V.A.</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_ivaExclusion"
                                value='{{$user->user_ivaExclusion}}' placeholder="Exclusion de I.V.A.">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FISCAL DATA  -->

            <!-- I.B.-->

            <h3 class="car-title mt-3">Datos Ingreso Brutos:</h3>
            <div class="card p-4 shadow-lg">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Regimen:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_ibRegiment"
                                value='{{$user->user_ibRegiment}}' placeholder="Tipo de regimen I.B.">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Numero I.B.:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_ibNumber"
                                value='{{$user->user_ibNumber}}' placeholder="Numero I.B.">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Provincias inscriptas:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_ibProvince"
                                value='{{$user->user_ibProvince}}' placeholder="Provincias inscripta en I.B.">
                        </div>
                    </div>
                </div>
            </div>

            <!--/I.B.-->

            <!-- CURRIER -->

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

            <!-- /CURRIER -->

            <!-- CARDS    -->
            <h3 class="car-title mt-3">Tarjetas:</h3>
            <div class="card p-4 shadow-lg">
                <div class="row">
                    <div class="col-md-5 ">
                        <label>Ingrese numero de tarjeta:</label>
                        <div class=" input-group mb-2">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-credit-card"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="" value=''
                                placeholder="Ingrese numero de tarjeta">
                        </div>
                        <label>Ingrese nombre y apellido:</label>
                        <div class=" input-group mb-2">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-credit-card"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="" value=''
                                placeholder="Ingrese nombre y apellido del titular">
                        </div>
                        <label>fecha expiracion:</label>
                        <div class=" input-group mb-2">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-credit-card"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="" value=''
                                placeholder="Ingrese fecha de expiracion">
                        </div>
                        <label>Ingrese codigo de seguridad:</label>
                        <div class=" input-group mb-2">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-credit-card"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="" value=''
                                placeholder="Ingrese codigo de seguridad">
                        </div>
                        <label>DNI titular de la tarjeta:</label>
                        <div class=" input-group mb-2">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-credit-card"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="" value=''
                                placeholder="Ingrese numero DNI del titular">
                        </div>

                    </div>
                    <div class="col-md-5 p-5">
                        <img src="{{Storage::url('picture_app/tarjetas anverso y reverso.png')}}" alt="">
                    </div>

                </div>
                <div class="d-flex">
                    <a href="" class="ml-auto btn btn-primary">Agregar tarjeta</a>
                </div>
            </div>
            <!-- / CARDS    -->

            <!-- IMAGE AVATAR    -->

            <div class="mt-2 d-flex justify-content-center">


                <img class="col-sm-2 d-flex " src="{{asset('avatars/'.Auth::user()->url_avatar)}}" alt="" width="50px"
                    style="border-radius:100%">
                <div class="label">
                    <h2>Seleccione una foto de perfil</h2>
                    <input class="col-sm-4 align-items-end" type="file" name="url_avatar" value='{{$user->url_avatar}}'>
                </div>

            </div>

            <!-- /IMAGE AVATAR    -->

            <!-- BUTTON SUBMIT    -->

            <div class="d-flex justify-content-between">
                <button type="submit" class="col-md-12 mt-4 mb-4 btn btn-success btn-lg">Enviar datos para
                    actualizar</button>
            </div>

            <!-- /BUTTON SUBMIT    -->
        </form>
    </div>
</div>


@endsection