@extends('layouts.app')

@section('content')
<div class="container">
    
        <div class="col-12 col-md-12 mt-5">
            <div class="col-12 col-md-8 card">
                <div class="col-12 col-md-12 card-header">{{ __('Felicitaciones') }}</div>

                <div class="col-12 col-md-12 card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Estas logeado!!') }}
                </div>

            </div>

        </div>
        <div class="col-12 col-md-8 mt-5 mb-5">
            <a href="index" class="btn btn-primary btn-block">Ingresar</a>
        </div>
   
</div>
@include('layouts/partials.footer')
@endsection