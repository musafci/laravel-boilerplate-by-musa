<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>@yield('title', config('app.name', 'SOL Portal'))</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sub-menu-tree.css')}}">
    <link rel="stylesheet" href="{{asset('/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom-admin.css')}}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

    <!-- Select2 Plugin CSS | Search Box for Multiple Selector -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css')}}">

    <style type="text/css">
        .form-group.has-error label, .form-group.has-error .help-block {
            color: #dd4b39;
        }
    </style>

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini sidebar-no-expand layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('partials._navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials._sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials._breadcrumb')

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; {{date('Y')}} <a href="{{route('dashboard')}}">{{ config('app.name') }}</a>.</strong> All rights reserved. @if (Auth::user()->version)version-{{Auth::user()->version}}@endif
    </footer>

    <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
       <!-- Control sidebar content goes here -->
       <h1>sssssssssssssss</h1>
   </aside>
    <!-- /.control-sidebar -->
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<!-- Sub menu Tree -->
<script src="{{ asset('js/sub-menu-tree.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- Select2 Plugin js -->
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<!-- Bootstrap Multi Select  -->
<script src="{{ asset('js/bootstrap4-multi-select.js') }}"></script>

<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

@yield('scripts')
</body>
</html>
