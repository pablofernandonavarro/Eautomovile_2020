@extends('admin.layout')

@section('content')
{{-- @include('admin.messages') --}}

<h1 class="h1 text-center col-md-12"> Editar Producto:</h1>
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Productos</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection
<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
<form action="{{ url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="card card-success">
                <!-- card success-->
                <div class="card-header">
                    <!-- card-header-->
                    <h3 class="card-title">Datos generados automáticamente</h3>


                </div>
                <!-- /.card-header -->

                <!-- card-body-->
                <div class="card-body">

                    <!-- row -->
                    <div class="row">

                        <!--  visit -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Visitas</label>
                                <input class="form-control" type="number" id="visit" name="visit"
                                    value="{{$product->visit}}">
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('visit','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>

                        <!--  visit -->


                        <!-- count_sale -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ventas</label>
                                <input class="form-control" type="number" id="ventas" name="count_sale"
                                    value="{{$product->count_sale}}">
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('count_sale','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>


                        <!-- /count_sale -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <!--card footer-->

                <div class="card-footer">

                </div>

                <!-- /card footer-->
            </div>
            <!-- /.card success-->



            <div class="card card-info">
                <!--card info-->

                <div class="card-header">
                    <!-- .card-header -->

                    <h3 class="card-title">Datos del producto</h3>
                </div>

                <!-- /.card-header -->

                <div class="card-body">
                    <!--card body -->

                    <div class="row">
                        <!--row-->
                        <div class="sku col-md-6">
                            <!--sku -->

                            <div class="form-group">
                                <label>Sku</label>
                                <input class="form-control" type="text" id="nombre" name="sku" value="{{$product->sku}}"
                                    disabled>
                            </div>
                            <p class="font-weight-light text-red">El sku no puede ser editado </p>
                            <div class="col-md-12">
                                {!!$errors->first('sku','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>


                        <!-- /slug -->

                        <div class="color col-md-6">
                            <!-- color -->

                            <div class="row ">
                                <label>Color</label>
                                @foreach($colors as $color)
                                <div class="form-check p-3">
                                    <label class="form-check-label p-2 ml-1">
                                        <input type="checkbox" class="form-check-input" name="color_id[]" id=""
                                            value="{{$color->id}}" checked
                                            {{(is_array(old('color_id')) && in_array($color->id,old('color_id')) ) ?  'checked ' : '' }} />
                                        {{ $color->color_name }}


                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <!-- /color -->
                        </div>

                        <div class="pattern col-md-6">
                            <!-- pattern -->

                            <div class="form-group">
                                <label>Modelo</label>
                                <select name="pattern_id" id="pattern_id" class="form-control " style="width: 100%;">

                                    @foreach($patterns as $pattern)
                                    @if ( $pattern->id == $product->pattern->id)
                                    <option value="{{ $pattern->id }}" selected>{{$pattern->pattern_name}} </option>
                                    @else
                                    <option value="{{ $pattern->id }}">{{$pattern->pattern_name}} </option>

                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--pattern -->

                        <div class="brand col-md-6">
                            <!-- brand -->

                            <label>Marca</label>
                            <input type="text" class="form-control" id="brand" name="brand_id" disabled>


                        </div>

                        <!-- /brand -->

                        <div class="category col-md-6">
                            <!-- cayegory -->

                            <label>Categoria</label>
                            <select name="category_id" id="category_id" class="form-control " style="width: 100%;">
                                @foreach($categories as $category)

                                @if ($category->category_name == $product->category->category_name)
                                <option value="{{ $category->id }}" selected="selected">
                                    {{ $category->category_name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- /category -->

                        <div class="date_start col-md-6">
                            <!--date start-->

                            <div class="form-group">
                                <label>Fecha de inicio fabricacion del Modelo</label>
                                <input type="date" name="date_start" id="" class="form-control " style="width: 100%;"
                                    value="{{$product->date_start}}">
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('date_start','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>

                        <!--/date start-->

                        <div class="date_finish col-md-6">
                            <!--date finish-->

                            <div class="form-group">
                                <label>Fecha de finalizacion fabricacion del Modelo</label>
                                <input type="date" name="date_finish" id="category_id" class="form-control "
                                    style="width: 100%; " value="{{$product->date_finish}}">
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('date_finish','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>
                        <!--/date finish-->

                        <div class="quantity col-md-6">
                            <!-- quantity-->

                            <div class="form-group">
                                <label>cantidad</label>
                                <input type="number" name="quantity" id="quantity" class="form-control "
                                    style="width: 100%;" min="0" value="{{$product->quantity}}" step="1">
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('quantity','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>

                        <!-- /quantuty-->

                    </div>
                </div>
                <!--/card-body-->
                <div class="card-footer">
                    <!-- card footer-->
                </div>
                <!-- card footer-->
            </div>
            <!-- /.card info-->



            <div class="card card-success">
                <!-- card success -->

                <div class="card-header">
                    <!-- card-header -->
                    <h3 class="card-title">Sección de Precios</h3>


                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <div class="row">
                        <!-- card-row -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Precio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input class="form-control" type="number" id="price" name="price" min="0"
                                        value="{{$product->price}}" step="1">

                                </div>
                                <br>
                                <div class="col-md-12">
                                    {!!$errors->first('price','<small class="alert alert-danger col-md-12"
                                        role="alert">:message
                                    </small>')!!}
                                </div>
                                <br>

                                <br>
                                <span id="descuento">

                                    @{{ generardescuento }}

                                </span>
                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->




                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Porcentaje de descuento</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" id="discount_rate" name="discount_rate"
                                        step="any" min="0" max="100" value="0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>

                                </div>

                                <br>
                                <div class="progress">
                                    <div id="barraprogreso" class="progress-bar" role="progressbar"
                                        v-bind:style="{width: porcentajededescuento+'%'}" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('discount_rate','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>

                        </div>
                        <!-- /.col -->


                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <!-- /.card -->

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Descripciones del producto</h3>
                        </div>
                        <div class="card-body ">
                            <!--product Description -->

                            <div class="form-group">
                                <!-- Descriptin-short -->

                                <label>Descripción corta:</label>
                                <textarea class="form-control ckeditor" name="description_short" id="description_short"
                                    rows="3">{{$product->description_short}}</textarea>
                                <br>
                                <div class="col-md-12">
                                    {!!$errors->first('description_short','<small class="alert alert-danger col-md-12"
                                        role="alert">:message
                                    </small>')!!}
                                </div>

                            </div>
                            <!-- / Description-short -->

                            <div class="form-group">
                                <!-- Descriptin-large -->

                                <label>Descripción larga:</label>
                                <textarea class="form-control ckeditor" name="description_large" id="descripcion_larga"
                                    rows="5">{{$product->description_large}}</textarea>
                                <br>
                                <div class="col-md-12">
                                    {!!$errors->first('description_large','<small class="alert alert-danger col-md-12"
                                        role="alert">:message
                                    </small>')!!}
                                </div>

                            </div>
                            <!-- /Descriptin-large -->

                        </div>
                        <!--product Description body -->

                        <div class="card-footer">

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 prouct descripction-->




                <div class="col-md-6">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Especificaciones y otros datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Especificaciones:</label>

                                <textarea class="form-control ckeditor" name="spec" id="epec"
                                    rows="3">{{$product->spec}}</textarea>

                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('spec','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label>Datos de interes:</label>

                                <textarea class="form-control ckeditor" name="data_interest" id="datos_interest"
                                    rows="5">{{$product->data_interest}}</textarea>

                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('data_interest','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <!-- card-footer-->

                        </div>
                        <!--  /card-footer-->
                    </div>

                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->



            </div>
            <!-- /.row -->
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Administración</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6">

                            <!-- checkbox -->
                            <div class="form-group clearfix">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="activo" name="active"
                                        @if($product->active == 'on') checked @endif>
                                    <label class="custom-control-label" for="activo">Activo</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="slider" name="slider"
                                        @if($product->slider == 'on') checked @endif>
                                    <label class="custom-control-label" for="slider">Aparece en el Slider
                                        principal</label>
                                </div>
                            </div>

                        </div>



                    </div>
                    <!-- /.row -->





                    <!-- /.row -->




                </div>



                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            {{-- IMAGE  --}}

            <div class="card card-info">
                <!--card info-->

                <div class="card-header">
                    <!-- .card-header -->

                    <h3 class="card-title">Agregar imagenes</h3>
                </div>


                <div class="card-body">
                    <div class="form-group has-label">
                        <label for="images">Añadir Imagenes</label>
                        <input type="file" name="url_picture[]" id="url_picture[]" class="form-control" placeholder=""
                            aria-describedby="helpId" multiple accept="image/*">
                        <small id="helpId" class="text-muted">Puede Agregar hasta 8 imagenes por auto </small>
                        <br>
                        <small id="helpId" class="text-muted">El limite Puede ser 1024 mb por imagen</small>
                        <br>
                        <small id="helpId" class="text-muted">Puede Agregar archivos de tipo jpeg,png, jpg, gif</small>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- card-footer-->

                </div>
                <!--  /card-footer-->
                <!--/IMAGE -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <a class="btn btn-danger" href="#">Cancelar</a>
                    <input type="submit" value="Guardar" class="btn btn-primary">

                </div>
            </div>
        </div>


</form>







<div id="app">
    <div class="container col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Imágenes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body row">

                @foreach ($product->pictures as $picture)
                <form class="row" action="{{ url('admin/pictures/'.$picture->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <div id="idimagen-{{$picture->id}}">
                        <a href="{{'/storage/'.$picture->url_picture}}" data-toggle="lightbox"
                            data-title="Id:{{ $picture->id }}" data-gallery="example-gallery" class="col-sm-4">
                            <img style="width:150px; height:150px;" src={{'/storage/'.$picture->url_picture}}
                                class="img-fluid" />
                        </a>
                        <br>
                        <button typ="submit" class="btn btn danger">

                            <i class="fas fa-trash-alt" style="color:red"></i> Id:{{ $picture->id }}
                        </button>

                    </div>
                    @endforeach

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
            </div>
        </div>

    </div>
</div>



<!-- /.card -->



<!-- /.card -->






<!-- /.container-fluid -->

<!-- /.content -->




<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>

<script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.js"></script>

<script type="text/javascript">
    let model = document.getElementById('pattern_id');
    let brand = document.getElementById('brand');
    model.addEventListener('change',(e) => {
      fetch(`http://localhost:8000/api-brands/${e.target.value}`)
      .then(response => response.json())
      .then(data => brand.value = data.brand_name)
      
      .catch(error => console.log(error))
    });
</script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('#category_id').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  

    //uso de lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true,
      });
    });
});
</script>
<script src="/js/apiproduct.js"></script>
@endsection