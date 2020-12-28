@include('layouts/partials.head')
@include('layouts/partials.nav-header')



<body>

    <div id="app">
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')

</body>

@include('layouts/partials.footer')