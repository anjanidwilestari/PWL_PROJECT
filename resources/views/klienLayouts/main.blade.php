<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>
        Joson || 
        @yield('title')
    </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styleKlien/css/bootstrap.css')}}" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('styleKlien/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('styleKlien/css/responsive.css')}}" rel="stylesheet" />

    <!--Shortcut Icon -->
    <link rel="shorcut icon" href="{{ asset('styleKlien/images/award.png')}}">
</head>
<body>
    <div class="hero_area">
        @include('klienLayouts.header')

            @yield('content')

        @include('klienLayouts.footer')

        <script type="text/javascript" src="{{ asset('styleKlien/js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('styleKlien/js/bootstrap.js')}}"></script>
    </div>
</body>
