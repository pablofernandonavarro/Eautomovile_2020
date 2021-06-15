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
        <th></th>
        <th>Accion</th>
        <th></th>

    </thead>
    <tbody>
        @foreach ($purchaseOrders as $purchaseOrder)
        <tr>
            <td>{{$purchaseOrder->id}}</td>
            <td>{{Str::limit($purchaseOrder->created_at->format('d-m-y H:i'))}}</td>
            <td>{{$purchaseOrder->user->name}}</td>
            <td>{{$purchaseOrder->status}}</td>
            <td>${{$purchaseOrder->total}}</td>
            <td>{{$purchaseOrder->observation}}</td>
            <td>
                <a href="{{route('admin.purchaseorderdetails.show',$purchaseOrder->id)}}"
                    class="btn btn-warning btn-sm">Detalle
                </a>
            </td>
            <td>
                <a href="{{route('admin.purchaseorders.edit',$purchaseOrder->id)}}"
                    class="btn btn-primary btn-sm">editar</a>
            </td>
            <td>
                <form action="{{route('admin.purchaseorders.destroy',$purchaseOrder->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
            </td>
           

        @endforeach
       
    </tr>
    </tbody>
</table>

@endsection