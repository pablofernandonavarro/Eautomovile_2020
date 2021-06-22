@extends('master')

@section('styles')

@endsection

@section('content')
<br>
<br>
<br>
<br>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col-1">#</th>
            <th scope="col-4">Descripcion</th>
            <th scope="col-2">Uso</th>
            <th scope='col-2'>Marca</th>
            <th scope="col-2">Codigo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )


        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{!!$product->description_large!!}</td>
            <td>{{$product->category->category_name}}</td>
            <td>{!!$product->brand->brand_name!!}</td>
            <td>{!!$product->sku!!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$products_all->links()}}
@endsection