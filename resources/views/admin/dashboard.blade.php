@extends('admin.layout')

@section('content')


<div class="row">
    <div class="card card-warning mx-3">
        <div class="card-header">
            <H4 class="card-title">Actualizacion Precios Proveedor:</h4>
        </div>
        <div class="card-body">
            <form action="{{route('products.import.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <p>{{Session::get('message')}}</p>
                </div>
                @endif
                @if(isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{$error}}
                    @endforeach

                </div>
                @endif
                <input type="file" name='file'>
                <button>Importar lista de Precio</button>
            </form>

        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

</div>





</form>








@endsection