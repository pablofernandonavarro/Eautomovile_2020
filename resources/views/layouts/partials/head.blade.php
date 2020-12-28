<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="cubre alfombras,automotor,interior,baul,cubre interior" />
    <meta name="author" content="pablo navarro">
    <title>Eautomovile</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/styles/nav_header.css')}}">
    {{-- ------------------- jquery -------------------- --}}


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    {{-- ------------------- /jquery -------------------- --}}

    @yield('styles')
    <!-- LINK FRONT  CSS -->

    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css"> 


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 



    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
</head>