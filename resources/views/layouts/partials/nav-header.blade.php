<header>
 
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light bg-primary fixed-top">
            <div class="container">
                <a href="" class="navbar-brand">
                    <div id="pictue:logo">
                        <img src="{{ asset('storage/admin_picture/Logotipo.png') }}" alt="" width="200">
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#NavBar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @guest
                <div class="collapse navbar-collapse" id="NavBar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Inicio')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Nosotros')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Preguntas Frecuentes')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar')}}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Carrito')}}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('register') }}">{{ __('Registrarme')}}</a></li>
                    </ul>

                    @endif

                    @else
                    <div class="collapse navbar-collapse" id="NavBar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="#">{{ __('Inicio')}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">{{ __('Carrito')}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">{{ __('Nosotros')}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">{{ __('Preguntas Frecuentes')}}</a></li>

                            <li class="nav-item dropdown col-1">
                                <a id="navbarDropdown" class="nav-item dropdown-toggle text-light" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <img width="40px" style="border-radius:40%"
                                        src="{{asset('/storage/avatars/butaca_bebe.jpg')}}" alt="">
                                       
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <a class="dropdown-item" href=" {{'users/'.Auth::user()->id.'/edit'}}">
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
                @endguest
        </nav>
    </div>
</header>