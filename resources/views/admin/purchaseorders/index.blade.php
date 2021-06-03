@extends('admin.layout')

@section('content')

<h1 class="h1 text-center">Ordenes de compras</h1>
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
            <td>{{Str::limit($purchaseOrder->created_at,15)}}</td>
            <td>{{$purchaseOrder->user->name}}</td>
            <td>{{$purchaseOrder->status}}</td>
            <td>${{$purchaseOrder->total}}</td>
            <td>{{$purchaseOrder->guide_number}}</td>
            <td><a href="{{route('admin.purchaseorderdetails.show',$purchaseOrder->id)}}"
                    class="btn btn-warning btn-small">Detalle
                    :</a>
                <a href="" class="btn btn-primary btn-small">editar</a>
                <form action="{{route('admin.purchaseorders.destroy',$purchaseOrder->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>

            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection