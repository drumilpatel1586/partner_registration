<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Quantum Network</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Google Font: Source Sans Pro -->
        
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->

        <!-- Load Font Awesome Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"  type="text/css">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Load DataTables CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="icon" href="https://crm.qntmnet.com/QN-CDN/images/favicon.png" type="image/x-icon">
        <!-- Load AdminLTE Theme -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

        <!-- Load Bootstrap CSS -->
        <link rel="stylesheet" href="https://crm.qntmnet.com/QN-CDN/css/bootstrap.min.css">

        <!-- Theme style -->
            
 
       @stack('push-style')

    </head>


    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.header')

            @include('layouts.sidebar')

            @yield('content')

            @include('layouts.footer')
        </div>
        
     @stack('push-script')
    </body>



</html>