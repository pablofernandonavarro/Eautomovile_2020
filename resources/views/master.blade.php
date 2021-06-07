@include('layouts/partials.head')
@include('layouts/partials.nav-header')

<title>@yield('titulo')</title>


<body>
    <div class="container">
        <div class="mt-5" id="app">
            @yield('content')
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        @yield('scripts')
    </div>
</body>

@include('layouts/partials.footer')