{{-- <div class="left_col scroll-view"> --}}
    <div class="navbar nav_title" style="border: 0;">
        <a href="{{route('admin.home')}}" class="site_title"><img width="200px" height="75px" src="{{ asset('styleAdmin/production/images/logo-bolang.png')}}" alt="..."></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img width="50px" height="60px" src="{{asset('storage/'.Auth()->user()->foto)}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Selamat Datang,</span>
            <h2>{{Auth()->user()->nama}}</h2>
            <div>
                <small class="designation text-muted">{{Auth()->user()->role}}</small>
            </div>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"><a href="{{route('admin.home')}}">Grafik Peminjaman</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item @yield('kategoriproduk')"><a href="{{route('kategoriproduk.index')}}">Kategori Produk</a></li>
                        <li class="nav-item @yield('produk')"><a href="{{route('produk.index')}}">Produk</a></li>
                        <li class="nav-item @yield('pegawai')"><a href="{{route('pegawai.index')}}">Pegawai</a></li>
                        <li class="nav-item @yield('member')"><a href="{{route('member.index')}}">Member</a></li>
                        <li class="nav-item @yield('user')"><a href="{{route('user.index')}}">Pengguna Website</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-exchange"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item @yield('peminjaman')"><a href="{{route('peminjaman.index')}}">Penyewaan</a></li>
                        <li class="nav-item @yield('pengembalian')"><a href="{{route('pengembalian.index')}}">Pengembalian</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> Rekap Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"@yield('dikembalikan')><a href="{{route('peminjaman.dikembalikan')}}">Kembali</a></li>
                        <li class="nav-item @yield('belumkembali')"><a href="{{route('peminjaman.belumkembali')}}">Belum Kembali</a></li>
                        {{-- <li class="nav-item"><a href="morisjs.html">Terlambat</a></li> --}}
                    </ul>
                </li>
                {{-- <li><a><i class="fa fa-table"></i> Rekap Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a class="nav-link"href="/admin/contohtabel">Berhasil</a></li>
                        <li><a class="nav-link"href="/admin/contohtabel">Belum Kembali</a></li>
                        <li><a class="nav-link"href="/admin/contohtabel">Terlambat</a></li>
                    </ul>
                </li> --}}
                <li><a><i class="fa fa-envelope"></i> Kata Mereka <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"><a href="{{ url('getintouch') }}">Get In Touch Member</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a onclick="openFullscreen();" data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout">
            @csrf
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </form>
        <script>
            var elem = document.documentElement;
            function openFullscreen() {
              if (elem.requestFullscreen) {
                elem.requestFullscreen();
              } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
              } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
              }
            }
            
            </script>
    </div>
    <!-- /menu footer buttons -->
{{-- </div> --}}