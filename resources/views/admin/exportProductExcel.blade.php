@extends('admin.layout')

@section('content')


<table>
    <thead>
    <tr>
        <th>Descripcion corta</th>
        <th>precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    {{$product}}
        <tr>
            <td>{{ $product->description_short }}</td>
            <td>{{ $product->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>






@endsection