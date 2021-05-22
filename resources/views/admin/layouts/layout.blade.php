<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title') - Coaching</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('admin_assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin_assets/lte/bower_components/font-awesome/css/font-awesome.min.css')}}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admin_assets/lte/bower_components/Ionicons/css/ionicons.min.css')}}" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_assets/lte/dist/css/AdminLTE.min.css')}}" />

    <link rel="stylesheet" href="{{asset('admin_assets/lte/dist/css/skins/_all-skins.min.css')}}" />

    <link rel="stylesheet" href="{{asset('admin_assets/assets/css/style.css')}}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
    <!-- PNotify -->
    <link rel="stylesheet" href="{{ asset('PNotify/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('PNotify/animate.css') }}">
    <link href="{{ asset('PNotify/PNotifyBrightTheme.css') }}" rel="stylesheet" type="text/css" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('page-css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <div class="content-wrapper">

            @yield('content')

        </div>

        @include('admin.partials.footer')

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{asset('admin_assets/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('admin_assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin_assets/lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_assets/lte/dist/js/adminlte.min.js')}}"></script>

    <!-- SlimScroll -->
    <script src="{{asset('admin_assets/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin_assets/lte/dist/js/demo.js')}}"></script>

    @stack('page-scripts')

    <script src="{{asset('admin_assets/assets/js/scripts.js')}}"></script>

    <!-- PNotify -->
    <script src="{{ asset('PNotify/PNotify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('PNotify/animate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('PNotify/confirm.js') }}" type="text/javascript"></script>
    <script src="{{ asset('PNotify/message.js') }}" type="text/javascript"></script>

    <!-- validaiton, success, error, alert message -->
    @include('admin.message-PNotify')

</body>

</html>