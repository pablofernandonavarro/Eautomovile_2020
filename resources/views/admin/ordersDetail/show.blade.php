@extends('admin.layout')

@section('content')

<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
        <div class="card-header p-4">
            <a class="pt-2 d-inline-block" href="index.html" data-abc="true">E-automovile.com.ar</a>
            <div class="float-right">
                <h3 class="mb-0">E-automovile.com.ar</h3>
                Date: 12 Jun,2019
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">e-AUTOMOVILE</h3>
                    <div>Direccion:</div>
                    <div>Localidad:</div>
                    <div>Codigo Postal:</div>
                    <div>Telefono :</div>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark mb-1">{{$purchaseOrders->user->name}}</h3>
                    <div>Direccion de entrega:{{$purchaseOrders->user->user_deliveryAddress}}</div>
                    <div>Codigo localidad:{{$purchaseOrders->user->user_deliveryAddressLocation}}</div>
                    <div>Provincia :{{$purchaseOrders->user->user_deliveryAddressProvince}}</div>
                    <div>Codigo Postal:{{$purchaseOrders->user->user_deliveryAddressPostalCode}}</div>
                    <div>Telefono:{{$purchaseOrders->user->user_phone}}</div>
                    <div>Email:{{$purchaseOrders->user->email}}</div>
                </div>
            </div>
            <div class="table-responsive-sm">


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Color</th>
                            <th>Description</th>
                            <th class="right">Precio</th>
                            <th class="center">Cantidad</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalle as $item)

                        <tr>
                            <td class="center">1</td>
                            <td class="left strong">{{$item->color}}</td>
                            <td class="left">{{$item->product_id}}</td>
                            <td class="right">{{$item->price_unit}}</td>
                            <td class="center">{{$item->quantity}}</td>
                            <td class="right">{{$item->price_unit*$item->quantity}}</td>
                        </tr>

                    </tbody>
                </table>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Subtotal</strong>
                                </td>
                                <td class="right">$28,809,00</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Discount (20%)</strong>
                                </td>
                                <td class="right">$5,761,00</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">VAT (10%)</strong>
                                </td>
                                <td class="right">$2,304,00</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong> </td>
                                <td class="right">
                                    <strong class="text-dark">$20,744,00</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
        </div>
    </div>
</div>
@endsection