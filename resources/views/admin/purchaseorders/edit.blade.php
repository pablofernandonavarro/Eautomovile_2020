@extends('admin.layout')

@section('content')

@section('title')
<h1>Editar Orden de compra :</h1>
<h3>{{$purchaseOrder->user->name}}</h3>
@endsection
<div class="card-body card-success">
    <div class="card-header">
        Datos generales order de compra
    </div>
    <form action="{{route('admin.purchaseorders.update',$purchaseOrder)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="card-body bg-white">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input class="form-control" value="{{$purchaseOrder->user->id}}" placeholder="{{$user->name}}"
                            name="user_id" readonly>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Guia de correo numero</label>
                        <input class="form-control" type="text" id="" name="guide_number"
                            value="{{$purchaseOrder->guide_number}}">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" type="text" id="status" name="status"
                            value="{{$purchaseOrder->status}}">
                    </div>

                </div>
                <div class=" col-md-6">
                    <div class="form-group">
                        <label>Total</label>
                        <input class="form-control" name="total" value="{{$purchaseOrder->total}}">
                    </div>

                </div>
                <div class="col-md-12">

                    <label>Observaciones</label>
                    <textarea class="form-control" id="observation" name="observation">
                        {{$purchaseOrder->observation}}
                    </textarea>


                </div>

                <button class="btn btn-primary mt-3 ml-auto" type="submit">Actualizar</button>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </form>


</div>

@endsection