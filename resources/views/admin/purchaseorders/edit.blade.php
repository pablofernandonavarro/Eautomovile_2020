@extends('admin.layout')

@section('content')

@section('title')
<h1>Editar Orden de compra :</h1>
@endsection
<div class="card-body card-success">
    <div class="card-header">
        Datos generales order de compra
    </div>
    <div class="card-body bg-white">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Usuario</label>
                    <input class="form-control" value="{{$purchaseOrder->user->name}}">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Guia de correo numero</label>
                    <input class="form-control" type="text" id="" name="">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" type="text" id="" name="">
                </div>

            </div>
            <div class=" col-md-6">
                <div class="form-group">
                    <label>Total</label>
                    <input class="form-control" type="number" value="{{$purchaseOrder->total}}">
                </div>

            </div>
            <div class="col-md-6">

                <label>Observaciones</label>
                <textarea class="form-control" id="" name="">
             </textarea>


            </div>


        </div>
    </div>
    <div class="card-footer">

    </div>



</div>

@endsection