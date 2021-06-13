@include('layouts/partials.head')
@include('layouts/partials.nav-header')

<title>@yield('titulo')</title>


<body>
    <div class="container">
        <div id="app">
            @yield('content')

            <script src="{{asset('js/app.js')}}"></script>
            @yield('scripts')
        </div>
    </div>

    @yield('script')
</body>
@include('layouts/partials.footer')