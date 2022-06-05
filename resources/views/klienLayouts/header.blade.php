<!-- header section strats -->
<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/klien-beranda">
                <img width="200px" height="75px" src="{{ asset('styleAdmin/production/images/logo-bolang-dark.png')}}" alt="Bolang Gunung"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item @yield('beranda')">
                        <a class="nav-link" href="/klien-beranda">Beranda <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @yield('produk')">
                        <a class="nav-link" href="/klien-produk"> Produk </a>
                    </li>
                    <li class="nav-item @yield('gallery')">
                        <a class="nav-link" href="/klien-galery"> Galeri </a>
                    </li>
                    <li class="nav-item @yield('about')">
                        <a class="nav-link" href="/klien-about"> Tentang</a>
                    </li>
                    <li class="nav-item @yield('contact')">
                        <a class="nav-link" href="{{ route('contact.create') }}">Hubungi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Login</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
