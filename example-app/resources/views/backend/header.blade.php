<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('backend/plugins/fontawesome-free/css/all.min.css', []) }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', []) }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css', []) }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('backend/plugins/jqvmap/jqvmap.min.css', []) }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('backend/css/adminlte.min.css', []) }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', []) }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('backend/plugins/daterangepicker/daterangepicker.css', []) }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('backend/plugins/summernote/summernote-bs4.min.css', []) }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ url('backend/img/AdminLTELogo.png', []) }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ url('backend/img/user2-160x160.jpg', []) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="{{ route('dashboard', []) }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('create') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Create
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('edit', []) }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Edit
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('detail', []) }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Detail
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/tables/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Simple Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/jsgrid.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>jsGrid</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    @yield('content')

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ url('backend/plugins/jquery/jquery.min.js', []) }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('backend/plugins/jquery-ui/jquery-ui.min.js', []) }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js', []) }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('backend/plugins/chart.js/Chart.min.js', []) }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('backend/plugins/sparklines/sparkline.js', []) }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('backend/plugins/jqvmap/jquery.vmap.min.js', []) }}"></script>
    <script src="{{ url('backend/plugins/jqvmap/maps/jquery.vmap.usa.js', []) }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('backend/plugins/jquery-knob/jquery.knob.min.js', []) }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('backend/plugins/moment/moment.min.js', []) }}"></script>
    <script src="{{ url('backend/plugins/daterangepicker/daterangepicker.js', []) }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', []) }}"></script>
    <!-- Summernote -->
    <script src="{{ url('backend/plugins/summernote/summernote-bs4.min.js', []) }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', []) }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('backend/js/adminlte.js', []) }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('backend/js/demo.js', []) }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('backend/js/pages/dashboard.js', []) }}"></script>
</body>

</html>
