<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Core App | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/master/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/master/dist/css/adminlte.min.css">
    {{--    link stack--}}
    <style>
        .nav .nav-treeview  {
            margin-left: 30px;
        }
        .dropdown-divider{
            opacity: 0.2
        }
    </style>
    @livewireStyles
    @stack('css')
    @notifyCss
</head>
<body class="hold-transition @if(Request::is('login')) login-page @else sidebar-mini layout-fixed @endif">

@if(Request::is('login'))
    @yield('login-content')
@else
    <div class="wrapper">
        <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- /.navbar -->

        <!-- Main Sidebar Container -->
    @include('layouts.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
        @yield('content')
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright MOVe GLOBAL &copy; 2020</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endif

@livewireScripts
<!-- jQuery -->
<script src="/master/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/master/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
@stack('js')
<!-- AdminLTE App -->
<script src="/master/dist/js/adminlte.js"></script>
@include('notify::messages')
@notifyJs
</body>
</html>
