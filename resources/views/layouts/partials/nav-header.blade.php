<body>
    <header>
        <nav class="container-fluid col-12">
            <div class="header_barra_navegacion row bg-primary">
                <div class="col-4 mr-auto">
                    <a href="{{'/inicio'}}">
                        <img src=" {{ asset('storage/admin_picture/Logotipo.png') }}" width="300" height="70" alt="">
                    </a>
                </div>

                @guest
                <div class="header_usuarios container">

                    <div class="header_nav_item_ingresar row d-flex">
                        <a class="nav-link text-light col-1 ml-auto" href="{{ '/inicio' }}">{{ __('Inicio')}}</a>
                        <a class="nav-link text-light col-2 ml-auto" href="#">{{ __('Nosotros') }}</a>
                        <a class="nav-link text-light col-2 mr-2" href="#">{{ __('Preguntas Frecuentes') }}</a>
                        <a class="nav-link text-light col-2 mr-2" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                        @if (Route::has('register'))
                        <a class="nav-link text-light col-2 mr-2"
                            href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                        <a class="nav-link text-light col-2 mr-2" href="{{ route('login') }}">{{ __('Carrito')}}
                        </a>
                    </div>


                    @endif
                    @else

                    <a class="nav-link text-light col-1 mr-2" href="{{ '/inicio' }}">{{ __('Inicio')}}
                    </a>
                    <a class="nav-link text-light col-1 mr-3" href="{{ route('login') }}">{{ __('Carrito')}}
                    </a>
                    <div class="header_nav_item_ingresar nav-item dropdown col-1 mr-3">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img width="40px" style="border-radius:40%"
                                src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" alt="Avatar">
                            {{ Auth::user()->firstName }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <a class="dropdown-item" href=" {{'usuario/'.Auth::user()->id.'/edit'}}">
                                {{ __('Editar Perfil') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>


                @if(Auth::user()->email == 'admin@gmail.com')





                <div class="col-12 text-center bg-primary ">
                    <h5 class="bg-primary">Panel administrador</h5>
                    <div class="text-center bg-primary">
                        <div class="row text-dark">
                            {{-- <a href="{{route('Product.index')}}" class="navbar-brand col-3 text-dark">Productos</a>
                            --}}
                            <div class="dropdown navbar-brand col-3 text-dark">
                                <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Gestion de articulos
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('Product.index')}}">ABM de Productos</a>
                                    <a class="dropdown-item" href="{{route('Type.index')}}">Gestionar Tipo de
                                        producto</a>
                                    <a class="dropdown-item" href="{{route('Color.index')}}">Gestionar colores del
                                        producto</a>
                                    <a class="dropdown-item" href="{{route('Mark.index')}}">Gestionar Marca del
                                        automotor</a>
                                    <a class="dropdown-item" href="{{route('Modelo.index')}}">Gestionar Modelo del
                                        automotor</a>
                                    <a class="dropdown-item" href="{{route('Year.index')}}">Gestionar años de
                                        fabricacion del automotor</a>
                                </div>
                            </div>



                            <a href="" class="navbar-brand col-2 text-dark ">Combos</a>
                            <a href="{{ route ('usuario.index') }}" class="navbar-brand col-2 text-dark">Usuarios</a>
                            <a href="" class="navbar-brand col-2 text-dark">descuentos</a>
                            <a href="" class="navbar-brand col-2 text-dark">Adm. Preguntas</a>
                        </div>
                    </div>
                    @endif
                    @endguest
                </div>
        </nav>
    </header>