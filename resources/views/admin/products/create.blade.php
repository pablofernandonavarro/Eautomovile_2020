@extends('admin.layout')

@section('content')


<h1 class="h1 text-center col-md-12"> Crear Producto:</h1>
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Productos</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('estilos')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endsection

@section('scripts')

<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('adminlte/ckeditor/ckeditor.js')}}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('#category_id').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });

</script>

@endsection





<div id="apiproduct">




  <form action="{{ route('admin/products.store') }}" method="POST" enctype="multipart/form-data">
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
                  <input class="form-control" type="number" id="visit" name="visit" value="{{old('visit')}}">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('visit','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>

              <!--  visit -->


              <!-- count_sale -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Ventas</label>
                  <input class="form-control" type="number" id="ventas" name="count_sale" value="{{old('count_sale')}}">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('count_sale','<small class="alert alert-danger col-md-12" role="alert">:message
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
                  <input class="form-control" type="text" id="nombre" name="sku" value="{{old('sku')}}">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('sku','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>

              <!-- / sku-->

              {{-- <div class="slug col-md-6">
                <!-- slug -->

                <div class="form-group">
                  <label>Slug</label>
                  <input class="form-control" type="text" id="slug" name="slug">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('slug','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div> --}}

              <!-- /slug -->

              <div class="color col-md-6">
                <!-- color -->

                <div class="row ">
                  <label>Color</label>
                  @foreach($colors as $color)
                  <div class="form-check p-3">
                    <label class="form-check-label p-2 ml-1">
                      <input type="checkbox" class="form-check-input" name="color_id[]" id="" value="{{$color->id}}"
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

                    @if (old('pattern_id') == $pattern->id)
                    <option value="{{ $pattern->id }}" selected>{{$pattern->pattern_name}} </option>
                    @else
                    <option value="{{ ($pattern->id) }}">{{$pattern->pattern_name}} </option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <!--pattern -->

              <div class="brand col-md-6">
                <!-- brand -->

                <label>Marca</label>
                <select name="brand_id" id="brand_id" class="form-control " style="width: 100%;">
                  @foreach($brands as $brand)

                  @if (old('brand_id') == $brand->id)
                  <option value="{{ $brand->id }}" selected>{{$brand->brand_name}} </option>
                  @else
                  <option value="{{ ($brand->id) }}">{{$brand->brand_name}} </option>
                  @endif
                  @endforeach
                </select>
              </div>

              <!-- /brand -->

              <div class="category col-md-6">
                <!-- cayegory -->

                <label>Categoria</label>
                <select name="category_id" id="category_id" class="form-control " style="width: 100%;">
                  @foreach($categories as $category)

                  @if (old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{$category->category_name}} </option>
                  @else
                  <option value="{{ ($category->id) }}">{{$category->category_name}} </option>
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
                    value="{{old('date_start')}}">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('date_start','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>

              <!--/date start-->

              <div class="date_finish col-md-6">
                <!--date finish-->

                <div class="form-group">
                  <label>Fecha de finalizacion fabricacion del Modelo</label>
                  <input type="date" name="date_finish" id="category_id" class="form-control " style="width: 100%; "
                    value="{{old('date_finish')}}">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('date_finish','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>
              <!--/date finish-->

              <div class="quantity col-md-6">
                <!-- quantity-->

                <div class="form-group">
                  <label>cantidad</label>
                  <input type="number" name="quantity" id="quantity" class="form-control " style="width: 100%;" min="0"
                    value="{{old('quantity')}}" step="1">
                </div>
                <div class="col-md-12">
                  {!!$errors->first('quantity','<small class="alert alert-danger col-md-12" role="alert">:message
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
                    <input class="form-control" type="number" id="price" name="price" min="0" value="{{old('price')}}"
                      step="1">

                  </div>
                  <br>
                  <div class="col-md-12">
                    {!!$errors->first('price','<small class="alert alert-danger col-md-12" role="alert">:message
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
                    <input class="form-control" type="number" id="discount_rate" name="discount_rate" step="any" min="0"
                      max="100" value="0">
                    <div class="input-group-prepend">
                      <span class="input-group-text">%</span>
                    </div>

                  </div>

                  <br>
                  <div class="progress">
                    <div id="barraprogreso" class="progress-bar" role="progressbar"
                      v-bind:style="{width: porcentajededescuento+'%'}" aria-valuenow="0" aria-valuemin="0"
                      aria-valuemax="100">
                      @{{ porcentajededescuento }}%</div>
                  </div>
                </div>
                <div class="col-md-12">
                  {!!$errors->first('discount_rate','<small class="alert alert-danger col-md-12" role="alert">:message
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
                    rows="3">{{old('description_short')}}</textarea>
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
                    rows="5">{{old('description_large')}}</textarea>
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

                  <textarea class="form-control ckeditor" name="spec" id="epec" rows="3">{{old('spec')}}</textarea>

                </div>
                <div class="col-md-12">
                  {!!$errors->first('spec','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Datos de interes:</label>

                  <textarea class="form-control ckeditor" name="data_interest" id="datos_interest"
                    rows="5">{{old('data_interest')}}</textarea>

                </div>
                <div class="col-md-12">
                  {!!$errors->first('data_interest','<small class="alert alert-danger col-md-12" role="alert">:message
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

              <label for="imagenes">Añadir imágenes</label>

              <input type="file" class="form-control-file" name="url_picture[]" id="url_picture[]" multiple
                accept="image/*">

              <div class="description">
                Un número ilimitado de archivos pueden ser cargados en este campo.
                <br>
                Límite de 2048 MB por imagen.
                <br>
                Tipos permitidos: jpeg, png, jpg, gif, svg.
                <br>
              </div>

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
              <div class="col-md-6">
                <div class="form-group">


                  <label>Estado</label>
                  <select name="active" id="estado" class="form-control " style="width: 100%;">
                    {{-- @foreach($estados_productos as $estado)
                    
                     @if ($estado == 'Nuevo')
                        <option value="{{ $estado }}" selected="selected">{{ $estado }}</option>
                    @else
                    <option value="{{ $estado }}">{{ $estado }}</option>
                    @endif
                    @endforeach --}}
                  </select>


                </div> -
                <!-- /.form-group -->

              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <!-- checkbox -->
                <div class="form-group clearfix">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="activo" name="active">
                    <label class="custom-control-label" for="activo">Activo</label>
                  </div>

                </div>

                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="slider" name="slider">
                    <label class="custom-control-label" for="slider">Aparece en el Slider principal</label>
                  </div>
                </div>

              </div>



            </div>
            <!-- /.row -->




            <div class="row">
              <div class="col-md-12">
                <div class="form-group">

                  <a class="btn btn-danger" href="#">Cancelar</a>
                  <input :disabled="deshabilitar_boton==1" type="submit" value="Guardar" class="btn btn-primary">

                </div>
                <!-- /.form-group -->

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






      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



  </form>
</div>

@endsection