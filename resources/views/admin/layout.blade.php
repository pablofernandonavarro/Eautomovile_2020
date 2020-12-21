<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>E-automovile | administracion</title>

    <!-- App -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition sidebar-mini">
    <div id="">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
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
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                                class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
                <!-- Brand Logo -->
                <a href="{{url('index')}}" class="brand-link">
                    <img src="{{asset('storage/admin_picture/Logotipo.png')}}" alt="Logo"
                        class="brand-image  elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">.</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{Storage::url($user->url_avatar)}}" class="img-circle elevation-2"
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
                <div class="content-header">
                    <div class="container-fluid">

                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                @yield('content')

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">


            </footer>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Bootstrap 4 -->
    {{-- <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script> --}}

    <script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
    <!-- App js-->
    <script src="{{asset('js/app.js')}}"></script>

    @yield('scripts')


</body>

</html>