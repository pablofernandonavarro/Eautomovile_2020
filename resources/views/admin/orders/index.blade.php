@extends('admin.layout')

@section('content')


<table class="table table-striped ml-lg-auto">
    <thead>
        <th>Id</th>
        <th>fecha de compra</th>
        <th>Usuario </th>
        <th>Estado</th>
        <th>Total compra</th>
        <th>Observaciones</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach ($purchaseOrders as $purchaseOrder)
        <tr>
            <td>{{$purchaseOrder->id}}</td>
            <td>{{Str::limit($purchaseOrder->created_at,10)}}</td>
            <td>{{$purchaseOrder->user->name}}</td>
            <td>{{$purchaseOrder->status}}</td>
            <td>${{$purchaseOrder->total}}</td>
            <td>{{$purchaseOrder->guide_number}}</td>
            <td><a href="/admin/purchaseOrder/{{$purchaseOrder->id}}" class="btn btn-warning btn-small">ver</a>
                <a href="" class="btn btn-primary btn-small">editar</a>
                <a href="" class="btn btn-danger btn-small">eliminar</a>
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection