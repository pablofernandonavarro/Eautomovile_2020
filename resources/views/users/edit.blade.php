@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card-header ">
                <h1 class="d-flex justify-content-center">Edita tu Perfil</h1>
            </div>

            <form action="/users/{{$user->id}}" enctype="multipart/form-data" method="post"
                class='col-10 bg-gray-light mt-3'>
                @method('PUT')
                @csrf
                <label for="nombre">Nombre : </label>
                <input class="form-control" type="text" name="name" value='{{$user->name}}'>
                <label for="">email : </label>
                <input class="form-control" type="email" name="email" value='{{$user->email}}'>
                <label for="">Domicilio de entrega: </label>
                <input class="form-control" type="text" name="domicilio" value='{{$user->domicilio}}'>
                <label for="">Localidad de entrega: </label>
                <input class="form-control" type="text" name="localidad" value='{{$user->localidad}}'>
                <label for="">Provincia de entrega:: </label>
                <input class="form-control" type="text" name="provincia" value='{{$user->provincia}}'>
                <label for="">Codigo Postal de entrega:: </label>
                <input class="form-control" type="text" name="codigopostal" value='{{$user->codigopostal}}'>
                <label for="">Telefono : </label>
                <input class="form-control" type="text" name="telefono" value='{{$user->telefono}}'>
                <label for="">Razon Social:</label>
                <label class="row col-10">(opcional)</label>

                <input class="form-control" type="text" name="razonsocial" value='{{$user->razonsocial}}'>
                <label for="">Avatar :</label>
                <input class="form-control" type="file" name="avatar" value='{{$user->avatar}}'>
                <div>
                    <button type="submit"
                        class="mt-4 mb-4 btn btn-success text-align-center btn-lg btn-block">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection