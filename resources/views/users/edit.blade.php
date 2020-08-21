@extends('master')
@section('content')

<div class="container">
    <div class="col-md-12 p-5">
        <div class="card-header ">
            <h1 class="d-flex justify-content-center mt-4">Edita tu Perfil</h1>
        </div>

        <form action="/users/{{$user->id}}" enctype="multipart/form-data" method="post">
            @method('PUT')
            @csrf

            <!-- ACCOUNT DATA  -->

            <h3 class="car-title mt-3">Datos de tu cuenta:</h3>
            <div class="card p-4">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Nombre de usuario:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_name" value='{{$user->user_name}}'
                                placeholder="nombre de usuario a eleccion">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Nombre y apellido:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="name" value='{{$user->name}}'
                                placeholder="Ingrese su nombre">
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
                            <input class="form-control" type="text" name="user_name" value='{{$user->cuit_cuil}}'
                                placeholder="numero de cuit o cuil">
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
                            <input class="form-control" type="text" name="razonsocial" value='{{$user->razonsocial}}'
                                placeholder="Ingrese razon social">
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
                            <input class="form-control" type="text" name="razonsocial" value='{{$user->phone}}'
                                placeholder="Ingrese su numero de telefono">
                        </div>
                    </div>


                </div>
            </div>

            <!-- /ACCOUNT DATA  -->

            <!-- FISCAL DATA  -->

            <h3 class="car-title mt-3">Datos Fiscales:</h3>
            <div class="card p-4">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Tipo de contribuyente:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_name" value='{{$user->user_type_cuit}}'
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
                            <input class="form-control" type="text" name="name" value='{{$user->user_iva_off}}'
                                placeholder="Exclusion de I.V.A.">
                        </div>
                    </div>
                </div>
            </div>
            <!-- FISCAL DATA  -->

            <!-- I.B.-->

            <h3 class="car-title mt-3">Datos Ingreso Brutos:</h3>
            <div class="card p-4">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Regimen:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="user_name" value='{{$user->user_ib_type}}'
                                placeholder="Tipo de contribuyente">
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
                            <input class="form-control" type="text" name="name" value='{{$user->user_ib_number}}'
                                placeholder="Exclusion de I.V.A.">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Provincias inscriptas:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="name" value='{{$user->user_ib_state}}'
                                placeholder="Exclusion de I.V.A.">
                        </div>
                    </div>
                </div>
            </div>

            <!--/I.B.-->

            <!-- CURRIER -->

            <h3 class="car-title mt-3">Domicilios:</h3>
            <div class="card p-4">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Domicilio de entrega:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="domicilio" value='{{$user->domicilio}}'
                                placeholder="Domicilio de entrega">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Localidad de entrega:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="localidad" value='{{$user->localidad}}'
                                placeholder="Localidad de entrega">
                        </div>
                    </div>
                    <div class=" col-sm-4 ">
                        <label>Provincia:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="name" value='{{$user->provincia}}'
                                placeholder="Provincia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mt-4 ">
                        <label>Codigo Postal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user-tag"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="codigopostal" value='{{$user->codigopostal}}'
                                placeholder="Codigo postal">
                        </div>
                    </div>
                    <div class=" col-sm-8 mt-4">
                        <label>Referencias sobre domicilio:</label>
                        <div class=" input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="localidad" value='{{$user->localidad}}'
                                placeholder="Localidad de entrega">
                        </div>
                    </div>

                </div>

            </div>

            <!-- /CURRIER -->

    </div>
    <div class="mt-2 d-flex justify-content-center">

        <img class="col-sm-2 d-flex " src="{{Storage::url($user->url_avatar)}}" alt="" width="50px"
            style="border-radius:100%">
        <input class="form-control col-sm-4 align-items-end" type="file" name="url_avatar"
            value='{{$user->url_avatar}}'>
    </div>
    <div class="mt-4">
        <button type="submit" class="mt-4 mb-4 btn btn-success text-align-center btn-lg btn-block">Enviar</button>
    </div>
    </form>


    @endsection