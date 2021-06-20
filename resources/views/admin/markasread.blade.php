@extends('admin.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header bg-success mb-3">Notificacion leida</div>
            @if(auth()->user())

            @forelse ($purchaseOrderNotifications as $purchaseOrderNotification)


            <div class="card shadow-lg rounded">


                <div class="card-body">

                    <div class="alert alert-ligth row">
                        <div class="col-12"> Atencion se realizo un nuevo pago :</div>
                        <div class="col-12"> usuario id:{{$purchaseOrderNotification->data['user_id']}}</div>
                        <div class="col-12"> usuario:{{ $user->find($purchaseOrderNotification->data['user_id'])->name}}
                        </div>
                        <div class="col-12"> Total del pago: $ {{$purchaseOrderNotification->data['total']}}</div>
                        <div class="col-12"> ID pago de mercado libre:
                            {{$purchaseOrderNotification->data['payment_id']}}</div>

                        <div class="col-12">con en status :
                            <span class="text-wrap badge-lg bg-warning rounded-pill p-1">
                                {{$purchaseOrderNotification->data['status']}}</span>
                        </div>

                    </div>
                </div>
            </div>
            @empty
            sin notificaiones

            @endforelse
            @endif
        </div>
        {{ $notificationsAll->links() }}
    </div>
</div>

@endsection