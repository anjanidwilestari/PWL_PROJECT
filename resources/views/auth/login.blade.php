<!DOCTYPE html>
<html>

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

    <title>Bolang Gunung || Login</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('styleKlien/css/bootstrap.css') }}" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('styleKlien/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('styleKlien/css/responsive.css') }}" rel="stylesheet" />

    <link rel="shorcut icon" href="{{ asset('styleKlien/images/logo-square.png') }}">
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- login section -->
        <section class="login_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <h3>
                                Bolang Gunung
                            </h3>
                            <p>
                                Rental Alat Pendakian dan Camping
                            </p>
                            <a href="{{ route('register') }}">
                                DAFTAR SEKARANG
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login_form">
                            <h3>
                                Login Sekarang
                            </h3>
                            <br>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div>
                                    <h6 align="left">Username</h6>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        placeholder="Username" name="username" id="username" required />
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <h6 align="left">Password</h6>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" id="password" required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- info section -->
        <section class="info_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_menu">
                            <h5>
                                TAUTAN LANGSUNG
                            </h5>
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/klien-beranda"> > Beranda <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/klien-produk"> > Produk </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/klien-galery"> > Galeri </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/klien-about"> > Tentang </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.create') }}"> > Hubungi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/"> > Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_course">
                            <h5>
                                PERSEWAAN TERBAIK
                            </h5>
                            <p>
                                Ada berbagai macam alat pendakian dan camping dengan kualitas terbaik. Kami menjadi
                                solusi terbaik untuk anda. Hubungi kami sekarang juga.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-5 offset-md-1">
                        <div class="info_news">
                            <h5>
                                HUBUNGI LEBIH LANJUT DI
                            </h5>
                            <div class="info_contact">
                                <a href="">
                                    Jl. Soekarno Hatta, Malang
                                </a>
                                <a href="">
                                    bolanggunungexample@gmail.com
                                </a>
                                <a href="https://wa.me/6285231404775">
                                    No. Telepon : +62 85231404775
                                </a>
                            </div>
                            <form action="">
                                <input type="text" placeholder="Masukkan email anda" />
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info section -->

        <!-- footer section -->
        <footer class="container-fluid footer_section">
            <p>
                &copy; 2022 All Rights Reserved By
                <a href="/klien-beranda">Bolang Gunung</a>
            </p>
        </footer>

        <footer class="container-fluid footer_section">
            <p>
                Distributed By
                <a href="https://www.instagram.com/anjani.dwilestari/">Anjani</a><a
                    href="https://www.instagram.com/bellasoniaa_/">Bella</a>
            </p>
        </footer>
        <!-- end footer section -->


        <script type="text/javascript" src="{{ asset('styleKlien/js/jquery-3.4.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('styleKlien/js/bootstrap.js') }}"></script>

</body>

</html>
