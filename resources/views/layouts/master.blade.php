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
    @notifyCss
    @livewireStyles
    @stack('css')
</head>
<body class="hold-transition @if(Request::is('login')) login-page @elseif(Request::is('lockscreen')) lockscreen @else sidebar-mini layout-fixed @endif">

@if(Request::is('login'))
    @yield('login-content')
@elseif(Request::is('lockscreen'))
    @yield('lockscreen-content')
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
        @if(!Request::is('invoice-print/'. (isset($id) ? $id : '')))
            <footer class="main-footer">
                <strong>Copyright MOVe GLOBAL &copy; 2020</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>
        @endif
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




{{--
<div class="callout callout-info">
    <h5><i class="fas fa-info"></i> Note:</h5>
    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
</div>
--}}

