@extends('admin.layout')

@section('content')


<div class="row ml-5">

    <h3 class="col-6">Importar Datos desde excel:</h3>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success col-3 mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
        formato Requerido
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formato del archivo excel a subir</h5>

            </div>
            <div class="modal-body">
                <div class="col-10 alert alert-danger d-flex justify-content-center aling-center mx-auto">
                    <div class="column ">
                        <div>Atencion!!!</div>

                        <p>El archico excel debe ser con las columnas con estos titulos:</p>
                        <ul>
                            <li>a)sku </li>
                            <li>b) precio_lista_proveedor</li>
                            <li>c) descuento_del_proveedor</li>
                            <li>d) costo</li>
                            <li>e) precio_de_venta</li>
                            <li>f) proveedor</li>
                            <li>g) marca</li>
                            <li>h) modelo</li>
                            <li>i) categoria</li>
                        </ul>
                        <p>El archivo no puede tener formulas solo valores en numeros</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>



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


<div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('products.import.excel')}}">
        {{ csrf_field() }}




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
    </form>

</div>


<br />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title d-flex justify-content-center">Datos importados</h3>
    </div>
    <div class="panel-body col-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>sku</th>
                    <th>Lista Proveedor</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                </tr>
                @foreach($products as $row)
                <tr>

                    <td>{{ $row->sku }}</td>
                    <td>$ {{ $row->supplier_price_list}}</td>
                    <td>{{ $row->brand_id}}</td>
                    <td>{{ $row->pattern_id}}</td>
                    <td>{{ $row->category_id}}</td>

                    <td>{{ $row->supplier_id}}</td> 
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>






@endsection