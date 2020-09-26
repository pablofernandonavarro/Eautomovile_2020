@extends('admin.layout')

@section('content')
{{-- @include('admin.messages') --}}


@section('titulo', 'Administración de productos')

@section('breadcrumb')
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection



{{-- <style type="text/css">
    .table1 {
        width: 100%;
        margin-bottom: 5%;
        color: #212529;
        text-align: center;
    }

    .table1 td,
    .table1 th {
        padding: 2rem;
        vertical-align: center;
        border-top: 2px solid #dee2e6;
    }
</style> --}}


<div id="confirmareliminar" class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sección de productos</h3>
                @include('admin.messages')
                <div class="card-tools">

                    <form>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="nombre" class="form-control float-right" placeholder="Buscar"
                                value="{{ request()->get('nombre') }}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div>
                <a class=" m-2 float-right btn btn-primary" href="{{ route('admin.products.create') }}">Crear</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive mt-2 ">


                <table class="table1 table-head-fixed col-md-12 table-striped text-center">
                    <thead class="mb-3">
                        <tr class="my-3 bg-primary mb-3">
                            <th class="h5">ID</th>

                            <th class="h5">Imagen</th>
                            <th class="h5">Descripcion Corta</th>
                            <th class="h5">Precio</th>
                            <th class="h5">Activo</th>
                            <th class="h5">Slider</th>
                            <th class="h5"> Sku</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td> {{$product->id }} </td>

                            <td>
                                @if ($product->pictures->count()<=0 ) <img style="height: 100px;    width: 100px;"
                                    src="{{ asset('storage/picture_app/product_picture_default.jpg')}}"
                                    class="rounded-circle">
                                    @else
                                    <img style="height: 100px;    width: 100px;"
                                        src="{{ '/storage/'.$product->pictures[0]->url_picture }}" class="img">
                                    @endif
                            </td>
                            <td> {{$product->description_short}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->active}} </td>
                            <td> {{$product->slider}} </td>

                            <td> {{$product->sku}} </td>
                            <td> <a class="btn btn-default"
                                    href="{{ route('admin.products.show',$product->id) }}">Ver</a>
                            </td>

                            <td> <a class="btn btn-info"
                                    href="{{ route('admin.products.edit',$product->id) }}">Editar</a>
                            </td>


                            <td>
                                <form action="{{route('admin.products.destroy',$product->id)}}" method="POST"
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
                {{-- {{ $product->appends($_GET)->links() }} --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->



@endsection