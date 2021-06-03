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
                    <h3 class="text-dark mb-1">{{$user->name}}</h3>
                    <div>Direccion de entrega:{{$user->user_deliveryAddress}}</div>
                    <div>Codigo localidad:{{$user->user_deliveryAddressLocation}}</div>
                    <div>Provincia :{{$user->user_deliveryAddressProvince}}</div>
                    <div>Codigo Postal:{{$user->user_deliveryAddressPostalCode}}</div>
                    <div>Telefono:{{$user->user_phone}}</div>
                    <div>Email:{{$user->email}}</div>
                </div>
            </div>
            <div class="table-responsive-sm">


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="center">Cantidad</th>
                            <th class="center">Sku</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th class="right">Precio</th>
                            <th class="right">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($purchaseOrderDetails as $item )

                        {{$i = $i+1}}

                        <tr>
                            <td class="center">{{$i}}</td>
                            <td class="center">{{$item->quantity}}</td>
                            <td class="center">{!!$product->find($item->product_id)->sku!!}</td>
                            <td class="left">{!!$product->find($item->product_id)->description_large!!}</td>
                            <td class="left strong">{{$item->color}}</td>
                            <td class="right">{{$item->price_unit}}</td>
                            <td class="right">{{$item->price_unit*$item->quantity}}</td>
                            {{$purchaseTotal =  $item->price_unit*$item->quantity}}
                            {{$purchaseTotalFinal = $purchaseTotalFinal+$purchaseTotal}}
                        </tr>

                    </tbody>
                    @endforeach
                </table>

            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right">{{$purchaseTotalFinal}}</td>
                            </tr>
                            {{-- <tr>
                                <td class="left">
                                    <strong class="text-dark">Discount (20%)</strong>
                                </td>
                                <td class="right">{{$item->price_unit*$item->quantity}}</td>
                            </tr> --}}
                            {{-- <tr>
                                <td class="left">
                                    <strong class="text-dark">I.V.A. (21%)</strong>
                                </td>
                                <td class="right">{{}}</td>
                            </tr> --}}
                            {{-- <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong> </td>
                                <td class="right">
                                    <strong class="text-dark">$20,744,00</strong>
                                </td>
                            </tr> --}}
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