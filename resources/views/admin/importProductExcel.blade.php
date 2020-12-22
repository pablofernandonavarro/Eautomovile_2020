@extends('admin.layout')

@section('content')


<div class="container">
    <h3 align="center">Importar Datos desde excel:</h3>
    <br />
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        Errores de Actualizacion<br><br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{route('products.import.excel')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Seleccione el archivo a para importacion de datos:</label></td>
                    <td width="30">
                        <input type="file" name="file" />
                    </td>
                    <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Actualizar">
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>

    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Customer Data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>sku</th>
                        <th>Precio de lista Proveedor</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                    </tr>
                    @foreach($products as $row)
                    <tr>
                        <td>{{ $row->sku }}</td>
                        <td>{{ $row->supplier_price_list}}</td>
                        <td>{{ $row->brand->brand_name}}</td>
                        <td>{{ $row->pattern->pattern_name}}</td>
                        <td>{{ $row->category->category_name}}</td>

                        <td>{{ $row->supplier_id}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>






@endsection