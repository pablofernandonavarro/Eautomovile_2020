<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'eautomovile') }}</title>
    <title>E-automovile | administracion</title>

    <!-- App -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('styles')
</head>


<body class="hold-transition sidebar-mini">
    <div id="">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex JustifyRight">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/admin/dashboard" class="nav-link">Panel Control</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3 col-7">
                    <div class="input-group input-group-sm col-10">
                        <input class="form-control form-control-navbar " type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->





                <div class="dropdown">
                    <p class="dropdown-toggle" id='notification' type="
                        button" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">155</span>
                    </p>

                    <ul class="dropdown-menu" aria-labelledby="notification">

                        <li><a class="dropdown-item" href=" #">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href=" #">Something else here</a></li>
                    </ul>

                    {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div> --}}
                </div>


            </nav>
        </div>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
            <!-- Brand Logo -->
            <a href="{{url('index')}}" class="brand-link">
                <img src="{{asset('admin_picture/Logotipo.png')}}" alt="Logo" class="brand-image  elevation-3"
                    style="opacity: 1.8">
                <span class="brand-text font-weight-light">.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('avatars/'.Auth::user()->url_avatar)}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Pablo navarro</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Tareas a realizar-->
                        <li class="nav-item">
                            <a href="note_crud" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tareas a Realizar
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <!-- /Tareas a realizar-->
                        <button type="button" class="btn btn-secondary">Productos</button>


                        <!-- /Products nav-bar-->

                        <li class="nav-item has-treeview btn-secondary">
                            <a href="{{route('admin.products.index')}}" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Productos
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>

                        <!-- /Product nav-bar-->

                        <!-- Category nav-bar-->
                        <li class="nav-item has-treeview btn-secondary">
                            <a href="/admin/category_crud" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Categorias
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>
                        <!-- /Category nav-bar-->



                        <!-- Brand nav-bar-->
                        <li class="nav-item has-treeview btn-secondary">
                            <a href="/admin/brand_crud" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Marca automotor
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>

                        <!-- Brand nav-bar-->


                        <!-- Color nav-bar-->

                        <li class="nav-item has-treeview btn-secondary">
                            <a href="/admin/color_crud" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Colores
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>


                        <!-- /color nav-bar-->




                        <!-- Pattern nav-bar-->

                        <li class="nav-item has-treeview btn-secondary">
                            <a href="/admin/pattern_crud" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Modelos
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>

                        <!-- /Pattern nav-bar-->


                        <p class="btn btn-danger mt-3 mb-0">Proveedores</p>
                        <!-- Supplier nav-bar-->

                        <li class="nav-item has-treeview bg-danger">
                            <a href="/admin/supplier_crud" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Proveedores
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>

                        <!-- /Supplier nav-bar-->

                        <!-- Supplier update nav-bar-->

                        <li class="nav-item has-treeview bg-danger">
                            <a href="/admin/importProductExcel" class="nav-link active">
                                <i class="nav-icon active"></i>
                                <p>
                                    Actualizar Precios
                                    <i class="right fas"></i>
                                </p>
                            </a>
                        </li>

                        <!-- Supplier update nav-bar-->



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header text-center">
                @yield('title')
            </div>
            <div class="container-fluid">


            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')

            <!-- /.content -->
            <!-- /.container-fluid -->
        </div>





        <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Bootstrap 4 -->

        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->

        <script src="{{asset('adminlte/plugins/ckeditor/config.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



        <script type="text/javascript" src="/js/app.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
        </script>

        @yield('scripts')


</body>
<footer class="main-footer">


</footer>


</html>