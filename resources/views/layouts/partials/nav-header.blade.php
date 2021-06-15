

<header class="container-fluid">

    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light bg-primary fixed-top mb-5">
            <div class="container">
                <a href="/index" class="navbar-brand">
                    <div id="pictue:logo">
                        <img src="{{ asset('admin_picture/Logotipo.png') }}" alt="" width="350">
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#NavBar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @guest
                <div class="collapse navbar-collapse" id="NavBar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item fw-bolder"><a class=" ITEM nav-link text-white"
                                href="{{asset('/nosotros')}}">{{ __('Nosotros')}}</a>
                        </li>
                        <li class="nav-item"><a class="ITEM nav-link text-white" href="/">{{ __('Inicio')}}</a>
                        </li>
                        {{-- <li class="nav-item"><a class="ITEM nav-link text-white"
                                href="#">{{ __('Preguntas Frecuentes')}}</a>
                        </li> --}}
                        <li class="nav-item"><a class="ITEM nav-link text-white"
                                href="{{ route('login') }}">{{ __('Ingresar')}}</a>
                        </li>
                        @if (Route::has('register'))

                        <li class="nav-item"><a class="ITEM nav-link text-white"
                                href="{{ route('register') }}">{{ __('Registrarme')}}</a></li>
                        <li class="nav-item">
                            <a class="ITEM nav-link text-white" href="{{route('cart.index')}}">
                                <img src="{{ asset('admin_picture/shopping_cart.png')}}" alt="carrito" width="40">
                            </a>
                        </li>

                    </ul>

                    @endif

                    @else
                    <div class="collapse navbar-collapse" id="NavBar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item text-white"><a class="ITEM nav-link text-white"
                                    href="/">{{ __('Inicio')}}</a></li>

                            <li class="nav-item fw-bolder"><a class=" ITEM nav-link text-white"
                                    href="{{asset('/nosotros')}}">{{ __('Nosotros')}}</a>
                            </li>
                            {{-- <li class="nav-item fw-bolder"><a class="ITEM nav-link text-white"
                                    href="#">{{ __('Preguntas Frecuentes')}}</a></li> --}}
                            <li class="nav-item fw-bolder">
                                <a class="ITEM nav-link" href="{{route('cart.index')}}">
                                    <img src="{{ asset('admin_picture/shopping_cart.png')}}" alt="carrito" width="40">
                                </a>
                            </li>

                            <li class="nav-item dropdown col-1">
                                <a id="navbarDropdown" class="nav-item dropdown-toggle text-light" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>


                                    <span>{{ Auth::user()->name }} <span class="caret"></span>

                                        <img width="40px" style="border-radius:100%"
                                            src="{{asset('avatars/'.Auth::user()->url_avatar)}}" alt="" width="30px">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <a class="dropdown-item" href=" {{'/users/'.Auth::user()->id.'/edit'}}">
                                        {{ __('Editar Perfil') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
                @if(Auth::check() && Auth::user()->user_role == "admin")
                <a href="/admin/dashboard" class="btn btn-warning btn-sm">Administracion</a>
                @endif
                @endguest
            </div>
        </nav>
    </div>
</header>