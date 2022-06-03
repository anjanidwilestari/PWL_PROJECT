<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Bolang Gunung || @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('styleAdmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('styleAdmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('styleAdmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('styleAdmin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('styleAdmin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('styleAdmin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('styleAdmin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('styleAdmin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('styleAdmin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('styleAdmin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{ asset('styleAdmin/vendors/normalize-css/normalize.css" rel="stylesheet')}}">
    <link href="{{ asset('styleAdmin/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet')}}">
    <link href="{{ asset('styleAdmin/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet')}}">
    <!-- Bootstrap Colorpicker -->
    <link href="{{ asset('styleAdmin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">

    <link href="{{ asset('styleAdmin/vendors/cropper/dist/cropper.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('styleAdmin/build/css/custom.min.css')}}" rel="stylesheet">

    <!--Shortcut Icon -->
    <link rel="shorcut icon" href="{{ asset('styleAdmin/production/images/logo-square.png')}}">
</head>
    <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @include('adminLayouts.sidebar')
                </div>  
            </div>
            @include('adminLayouts.navbar')
                @yield('content')
            @include('adminLayouts.footer')
          </div>
        </div>
    <!-- jQuery -->
    <script src="{{ asset('styleAdmin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('styleAdmin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('styleAdmin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('styleAdmin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('styleAdmin/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('styleAdmin/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('styleAdmin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('styleAdmin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('styleAdmin/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('styleAdmin/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('styleAdmin/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('styleAdmin/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('styleAdmin/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('styleAdmin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('styleAdmin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('styleAdmin/build/js/custom.min.js')}}"></script>
	
</body>