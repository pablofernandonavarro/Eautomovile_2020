@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Felicitaciones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estas logeado!!') }}
                </div>
                
            </div>
            
        </div>
        <div class="col-md-8 mt-4">
            <a href="index"class="btn btn-primary d-flex justify-content-end align-items-center">Ingresar</a>
        </div>
    </div>
</div>
@endsection
