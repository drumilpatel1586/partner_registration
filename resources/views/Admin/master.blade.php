<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title>Noble Causes Manager - Dashboard</title>

    {{-- css --}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/dashboard.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href={{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
    <!-- JQVMap -->
    <link rel="stylesheet" href={{asset("plugins/jqvmap/jqvmap.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css")}}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{asset("plugins/daterangepicker/daterangepicker.css")}}>
    <!-- summernote -->
    <link rel="stylesheet" href={{asset("plugins/summernote/summernote-bs4.min.css")}}> 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    
    <div class="wrapper">
        
        <nav class="main-header navbar navbar-expand  navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars mt-2"></i></a>
                </li>
                <a href="index" class="brand-link">
                    <img src="logo2.png" alt="Noble Causes logo" class="brand-image" style="opacity: .8">
        
                </a>
            </ul>
        
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
        
        
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
        
            </ul>
        </nav>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-3">
            <!-- Brand Logo -->
        
            <!-- Sidebar -->
            <div class="sidebar">
        
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
                    <div class="info">
                        <a href="#" class="d-block">Volunteer</a>
                    </div>
                </div>
        
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                     
                        <li class="nav-item">
                            <a href="index" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
        
                                </p>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a href="v_profile" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p> My Profile
        
                                </p>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a href="edit_v_profile" class="nav-link">
                                <i class="nav-icon fa fa-edit"></i>
                                <p> Edit Profile
        
                                </p>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a href="food_delivery" class="nav-link">
                                <i class="nav-icon fa fa-truck"></i>
                                <p> Food Delivery
        
                                </p>
                            </a>
        
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Remaining Donations
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="manage_food_donation" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Food Donations
                                        </p>
                                    </a>
                                </li>
        
                                <li class="nav-item">
                                    <a href="manage_book_donation" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Book Donations</p>
                                    </a>
                                </li>
        
                                <li class="nav-item">
                                    <a href="manage_requested_book_donation" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Requested Book Donations</p>
                                    </a>
                                </li>
        
                                <li class="nav-item">
                                    <a href="manage_requested_book_pickup" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Requested Book Pickup</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>
        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Picked Up Donations
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pickedup_food_donations" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Food Donations</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
        
                        <li class="nav-item">
                            <a href="v_changePassword" class="nav-link">
                                <i class="nav-icon fa fa-lock"></i>
                                <p> Change Password
        
                                </p>
                            </a>
        
                        </li>
        
                        <li class="nav-item">
        
                            <a href="volunteer_logout" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
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
            <strong>Copyright &copy; 2024 <a href="index">D_J_Patel</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>
