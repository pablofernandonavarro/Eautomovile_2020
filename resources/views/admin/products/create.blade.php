@extends('admin.layout')

@section('content')
@include('admin.messages')

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

  <script src="{{asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>


  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
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
        <!-- /.card Datos del producto-->



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



              <div class="color col-md-6">
                <!-- color -->

                <div class="row ">
                  <label>Color</label>
                  @foreach($colors as $color)
                  <div class="form-check p-3">
                    <label class="form-check-label p-2 ml-1">
                      <input type="checkbox" checked class="form-check-input" name="color_id[]" id=""
                        value="{{$color->id}} "
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
                <input type="text" class="form-control" id="brand" name="brand_id" disabled>
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



            </div>

          </div>

          <div class="card-footer">
          </div>
        </div>



        <!-- Providers-->

        <div class="card card-secondary mt-3">
          <div class="card-header">
            <h3 class="card-title">Proveedor :</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  <label>Codigo producto / Proveedor:</label>
                  <div class="input-group">
                    <input class="form-control" type="number" id="supplier_product_code" name="supplier_product_code"
                      value="{{old('supplier_product_code')}}">


                  </div>

                  <br>

                </div>
                <div class="col-md-6">
                  {!!$errors->first('supplier_product_code','<small class="alert alert-danger col-md-12"
                    role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>
              <div class="supplier col-md-6">
                <!-- Supplier -->

                <div class="form-group">
                  <label>Proveedor</label>
                  <select name="supplier_id" id="suppier" class="form-control " style="width: 100%;">
                    @foreach($suppliers as $supplier)

                    @if (old('supplier') == $supplier->id)
                    <option value="{{ $supplier->id }}" selected>{{$supplier->supplier_businessName}} </option>
                    @else
                    <option value="{{ ($supplier->id) }}">{{$supplier->supplier_businessName}} </option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-12">
                  {!!$errors->first('supplier_id','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>

              </div>



              <div class="supplier col-md-6 ">
                <!-- Supplier_code-->

                <div class="form-group">
                  <label>Codigo Proveedor</label>
                  <input type="text" id="supplier_code" class="form-control " min="0" value="{{$supplier->id}}"
                    disabled>
                </div>
                <div class="col-md-12">
                  {!!$errors->first('supplier_code','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>

              </div>


              <div class="col-md-6">
                <div class="form-group">

                  <label>Precio de lista:</label>
                  <div class="input-group">

                    <input class="form-control" type="text" id="supplier_price_list" name="supplier_price_list"
                      value="{{old('supplier_price_list')}}">

                  </div>
                  <br>
                  <div class="col-md-12">
                    {!!$errors->first('supplier_price_list','<small class="alert alert-danger col-md-12"
                      role="alert">:message
                    </small>')!!}
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
                    <input class="form-control" type="number" id="supplier_discount" name="supplier_discount" step="any"
                      min="0" max="100" value="{{$supplier->supplier_discount}}">
                    <div class="input-group-prepend">
                      <span class="input-group-text">%</span>
                    </div>

                  </div>
                </div>
                <div class="col-md-12">
                  {!!$errors->first('supplier_discount','<small class="alert alert-danger col-md-12"
                    role="alert">:message
                  </small>')!!}
                </div>
                <br>

              </div>

              <!-- /.col -->




              <div class="col-md-6">
                <div class="form-group">

                  <label>Utilidad :</label>
                  <div class="input-group">
                    <input class="form-control" type="number" id="utility" name="utility" step="any" min="0" max="100"
                      value="{{old('utility')}}">
                    <div class="input-group-prepend">
                      <span class="input-group-text">%</span>
                    </div>

                  </div>

                  <br>

                </div>
                <div class="col-md-6">
                  {!!$errors->first('utility','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">

              <label>Costo :</label>
              <div class="input-group">

                <input class="form-control" id="cost" name="cost" value="">

              </div>
              <br>
              <div class="col-md-12">
                {!!$errors->first('cost','<small class="alert alert-danger col-md-12" role="alert">:message
                </small>')!!}
              </div>
              <br>


            </div>
            <!-- /.form-group -->

          </div>
        </div>
        <div class="card-footer">
        </div>
      </div>
      <!-- /Providers-->



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

                <label>Precio de Venta:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input class="form-control" id="price" name="price" value="{{old('price')}}" step="1">

                </div>
                <br>
                <div class="col-md-12">
                  {!!$errors->first('price','<small class="alert alert-danger col-md-12" role="alert">:message
                  </small>')!!}
                </div>
                <br>


              </div>
              <!-- /.form-group -->

            </div>
            <!-- /.col -->




            <div class="col-md-6">
              <div class="form-group">

                <label>Porcentaje de descuento sobre al Producto :</label>
                <div class="input-group">
                  <input class="form-control" type="number" id="price_discount" name="price_discount" step="any" min="0"
                    max="100" value="{{old('price_discount')}}">
                  <div class="input-group-prepend">
                    <span class="input-group-text">%</span>
                  </div>

                </div>

                <br>

              </div>
              <div class="col-md-12">
                {!!$errors->first('price_discount','<small class="alert alert-danger col-md-12" role="alert">:message
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
              accept="image/*" value="{{old ('url_picture[]')}}">

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
<script type="text/javascript">
  let model             = document.getElementById('pattern_id');
  let brand             = document.getElementById('brand');
  let description_short = document.getElementById('description_short');

  model.addEventListener('change',(e) => {
    fetch(`http://localhost:8000/api-brands/${e.target.value}`)
    .then(response => response.json())
    .then(data => brand.value = data.brand_name)
    
    .catch(error => console.log(error))
  });
</script>
<script type="text/javascript">
  (function (){

    var costo =0;
    var utility = 0;
    var descuento =0;
    var precio = 0;
  
    
    var fillcost = function(){
    var costo = parseFloat(supplier_price_list.value)-parseFloat(supplier_price_list.value*parseFloat(supplier_discount.value/100));
      cost.value = costo.toFixed(2);
    };

    var fillprice = function(){
      var utility = document.getElementById('utility');
      var cost = document.getElementById('cost');
      var descuento = cost.value * (utility.value/100);
       var  precio = parseFloat(cost.value)+parseFloat(descuento);
      price.value = precio.toFixed(2);
    };
  

  var list_price = document.getElementById('supplier_price_list');
  var supplier_discount = document.getElementById('supplier_discount');
  var utility = document.getElementById('utility');
  var cost = document.getElementById('cost');
  var price = document.getElementById('price');

  list_price.addEventListener('change', fillcost);
  utility.addEventListener('change', fillprice);
}());


 
 
</script>

@endsection