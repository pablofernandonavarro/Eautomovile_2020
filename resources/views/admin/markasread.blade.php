@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($purchaseOrderNotifications as $purchaseOrderNotification)
                
           
            <div class="card">
                <div class="card-header">Notificaciones sin leer
                </div>
                <div class="card-body">
                    @if(auth()->user())

                        <div class="alert alert-warning">
                            {{$purchaseOrderNotification->data['time']}}
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection