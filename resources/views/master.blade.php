@include('layouts/partials.head')
@include('layouts/partials.nav-header')

<title>@yield('titulo')</title>


<body>
    <div class="container">
        <div id="app">
            @yield('content')
        </div>
            
         {{-- @yield('scripts')  --}}
       
    </div>
    <script src="{{asset('js/app.js')}}"></script> 
     @yield('scripts') 
    
</body>
@include('layouts/partials.footer')