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

    <title>Bolang Gunung || Register</title>


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
                    <div class="col-md-5">
                        <div class="detail-box">
                            <h3>
                                Bolang Gunung
                            </h3>
                            <p>
                                Rental Alat Pendakian dan Camping
                            </p>
                            <a href="{{ route('login') }}">
                                LOGIN SEKARANG
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="login_form">
                            <h3>
                                Daftar Sekarang
                            </h3>
                            <br>
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <h6 align="left">Nama</h6>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                placeholder="Nama" name="nama" id="nama" value="{{ old('nama') }}"
                                                required />
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Username</h6>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Username" name="username" id="username"
                                                value="{{ old('username') }}" required />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Password</h6>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password" id="password" required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Konfirmasi Password</h6>
                                            <input type="password"
                                                class="form-control"
                                                placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation" required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Email</h6>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email" id="email" value="{{ old('email') }}" required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 align="left">No Handphone</h6>
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                placeholder="No Handphone" name="no_hp" id="no_hp"
                                                value="{{ old('no_hp') }}" required />
                                            @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Tanggal Lahir</h6>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" id="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') }}" required />
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <h6 align="left">Alamat</h6>
                                            <input type="text"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                placeholder="Alamat" name="alamat" id="alamat"
                                                value="{{ old('alamat') }}" required />
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div>
                                            <h6 align="left">Jabatan</h6>
                                            <select class="form-control @error('jabatan') is-invalid @enderror"
                                                name="jabatan" id="jabatan" value="{{ old('jabatan') }}" required>
                                                <option value="Manajer">Manajer</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                            @error('jabatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                        <div>
                                            <h6 align="left">Upload Foto</h6>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                name="foto" id="foto" value="{{ old('foto') }}" required />
                                            @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit">DAFTAR</button>
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
                    <div class="col-md-6">
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
