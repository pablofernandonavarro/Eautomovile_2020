@extends('admin.layout')

@section('content')


<h1 class="h1 text-center col-md-12"> Ver Producto:</h1>
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Productos</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

<script src="{{asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<form action="{{ route('admin.products.show',$products->id) }}" method="get" enctype="multipart/form-data">
    @csrf

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
                                    value="{{$products->visit}}" disabled>

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
                                    value="{{$products->count_sale}}" disabled>
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
                                <input class="form-control" type="text" id="nombre" name="sku"
                                    value="{{$products->sku}}" disabled>
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('sku','<small class="alert alert-danger col-md-12"
                                    role="alert">:message
                                </small>')!!}
                            </div>
                            <br>
                        </div>

                        <!-- / sku-->

                        <div class="slug col-md-6">
                            <!-- slug -->

                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" type="text" id="slug" name="slug"
                                    value="{{$products->slug}}" disabled>
                            </div>
                            <div class="col-md-12">
                                {!!$errors->first('slug','<small class="alert alert-danger col-md-12"
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
                                            value='{{ $color->color_name }}' checked>



                                        {{ $color->color_name }}
                                    </label>
                                </div>
                                @endforeach
                                <!-- /color -->
                            </div>
                        </div>
                        <div class="pattern col-md-6">
                            <!-- pattern -->

                            <div class="form-group">
                                <label>Modelo</label>
                                <input name="pattern_id" id="pattern_id" class="form-control " style="width: 100%;"
                                    value="{{$products->pattern->pattern_name}}" disabled>


                            </div>
                        </div>
                        <!--pattern -->

                        <div class="brand col-md-6">
                            <!-- brand -->

                            <label>Marca</label>
                            <input name="brand_id" id="brand_id" class="form-control " style="width: 100%;"
                                value="{{$products->brand->brand_name}}" disabled>


                        </div>

                        <!-- /brand -->

                        <div class="category col-md-6">
                            <!-- cayegory -->

                            <label>Categoria</label>
                            <input name="category_id" id="category_id" class="form-control " style="width: 100%;"
                                value="{{$products->category->category_name}}" checked disabled>

                        </div>

                        <!-- /category -->

                        <div class="date_start col-md-6">
                            <!--date start-->

                            <div class="form-group">
                                <label>Fecha de inicio fabricacion del Modelo</label>
                                <input type="date" name="date_start" id="" class="form-control " style="width: 100%;"
                                    value="{{$products->date_start}}" disabled>
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
                                    style="width: 100%; " value="{{$products->date_finish}}" disabled>
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
                                    style="width: 100%;" min="0" value="{{$products->quantity}}" step="1" disabled>
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
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">Proveedor :</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="supplier col-md-6">
                            <!-- Supplier -->
                            @foreach ($products->suppliers as $supplier)


                            <div class="form-group">
                                <label>Proveedor</label>
                                <input type="text" class=" form-control" value="{{$supplier->supplier_businessName}}"
                                    disabled>
                            </div>
                            @endforeach

                        </div>



                        <div class="supplier col-md-6 ">
                            <!-- Supplier_code-->

                            <div class="form-group">
                                <label>Codigo Proveedor</label>
                                <input type="text" id="supplier_code" class="form-control " min="0"
                                    value="{{$products->supplier_id}}" disabled>
                            </div>


                        </div>


                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Precio de lista:</label>
                                <div class="input-group">

                                    <input class="form-control" type="text" id="supplier_price_list"
                                        value="{{$products->supplier_price_list}}" value="" disabled>

                                </div>
                                <br>



                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->




                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Procentaje de descuento (Proveeedor):</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" id="supplier_discount"
                                        name="supplier_discount" step="any" min="0" max="100"
                                        value="{{$products->supplier_discount}}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>

                                </div>
                            </div>


                            <br>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Costo :</label>
                                <div class="input-group">

                                    <input class="form-control" id="cost" name="cost" value="{{$products->cost}}"
                                        disabled>

                                </div>
                                <br>

                                <br>


                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->
                        <div class="supplier col-md-6 ">
                            <!-- Supplier_code-->

                            <div class="form-group">
                                <label>Codigo Producto / Proveedor</label>
                                <input type="text" id="supplier_product_code" class="form-control "
                                    value="{{$products->supplier_product_code}}" disabled>
                            </div>


                        </div>


                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Utilidad :</label>
                                <div class="input-group">
                                    <input class="form-control" id="utility" name="utility" "
                                       value=" {{$products->utility}}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>

                                </div>

                                <br>

                            </div>

                            <br>

                        </div>


                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>


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
                                        value="{{$products->price}}" step="1" disabled>

                                </div>
                                <br>

                                <br>


                            </div>
                            <!-- /.form-group -->

                        </div>
                        <!-- /.col -->




                        <div class="col-md-6">
                            <div class="form-group">

                                <label>Porcentaje de descuento</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" id="price_discount" name="price_discount"
                                        step="any" min="0" max="100" value="{{$products->price_discount}}" disabled>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>

                                </div>

                                <br>

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
                                <textarea dislable class="form-control ckeditor" name="description_short" id="description_short"
                                    rows="3">{!!$products->description_short!!} </textarea>
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
                                <textarea dislable class="form-control ckeditor" name="description_large" id="descripcion_larga"
                                    rows="5">{!!$products->description_large!!}</textarea>
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

                                <textarea dislable class="form-control ckeditor" name="spec" id="epec"
                                    rows="3">{!!$products->spec!!}</textarea>

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

                                <textarea dislable class="form-control ckeditor" name="data_interest" id="datos_interest"
                                    rows="5">{!!$products->data_interest!!}</textarea>

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




            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Imágenes</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="form-group">


                        @foreach ($products->pictures as $product)

                        <img style="width:150px; height:150px;" src="{{'/storage/'.$product->url_picture}}" alt="foto"
                            class="img-fluid mb-2">

                        @endforeach
                    </div>


                </div>


                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <!-- /.card -->


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
                                        @if($products->active=="on")
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="activo">Activo</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input dislable type="checkbox" class="custom-control-input" id="slider"
                                        name="slider" @if($products->slider == "on")
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="slider">Aparece en el Slider
                                        principal</label>
                                </div>
                            </div>

                        </div>



                    </div>
                    <!-- /.row -->









                </div>



                <!-- /.card-body -->
                <div class="card-footer">

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{route('admin.products.index')}}" class="btn btn-success">volver a listado de
                            productos</a>
                    </div>
                    <!-- /.form-group -->

                </div>
            </div>
            <!-- /.row -->
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->






    @endsection