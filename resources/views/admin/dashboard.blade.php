@extends('admin.layout')

@section('content')


<div class="row">
    <div class="card-primary ml-4 shadow-lg">
        <div class="card-header">
            <!-- .card-header -->

            <h3 class="card-title">Ordenes de compras</h3>
        </div>
        <div class="card-body ml-4">
            <a href="{{route('admin.purchaseOrder.index')}}">Listado ordenes de compras</a>
        </div>
    </div>

</div>









@endsection