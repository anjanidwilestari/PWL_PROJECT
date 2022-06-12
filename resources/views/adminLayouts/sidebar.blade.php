{{-- <div class="left_col scroll-view"> --}}
    <div class="navbar nav_title" style="border: 0;">
        <a href="{{route('home')}}" class="site_title"><img width="200px" height="75px" src="{{ asset('styleAdmin/production/images/logo-bolang.png')}}" alt="..."></a>
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
                <small class="designation text-muted">{{Auth()->user()->jabatan}}</small>
                <span class="status-indicator online"></span>
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
                        <li class="nav-item"><a href="{{route('home')}}">Grafik Peminjaman</a></li>
                        {{-- <li class="nav-item"><a href="{{route('home')}}">Grafik Penyewaan</a></li> --}}
                    </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item @yield('kategoriproduk')"><a href="{{route('kategoriproduk.index')}}">Kategori Produk</a></li>
                        <li class="nav-item @yield('produk')"><a href="{{route('produk.index')}}">Produk</a></li>
                        <li class="nav-item @yield('pegawai')"><a href="{{route('pegawai.index')}}">Pegawai</a></li>
                        <li class="nav-item @yield('member')"><a href="{{route('member.index')}}">Member</a></li>
                        <li class="nav-item @yield('user')"><a href="{{route('user.index')}}">Pengguna Website</a></li>
                        {{-- <li class="nav-item"><a href="form_upload.html">Form Upload</a></li>
                        <li class="nav-item"><a href="form_buttons.html">Form Buttons</a></li> --}}
                    </ul>
                </li>
                <li><a><i class="fa fa-exchange"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"><a href="{{route('peminjaman.index')}}">Penyewaan</a></li>
                        <li class="nav-item"><a href="chartjs2.html">Pengembalian</a></li>
                        {{-- <li class="nav-item"><a href="morisjs.html">Terlambat</a></li> --}}
                        {{-- <li class="nav-item"><a href="echarts.html">ECharts</a></li>
                        <li class="nav-item"><a href="other_charts.html">Other Charts</a></li> --}}
                    </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i> Daftar Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"><a href="chartjs.html">Berhasil</a></li>
                        <li class="nav-item"><a href="chartjs2.html">Belum Kembali</a></li>
                        <li class="nav-item"><a href="morisjs.html">Terlambat</a></li>
                        {{-- <li class="nav-item"><a href="echarts.html">ECharts</a></li>
                        <li class="nav-item"><a href="other_charts.html">Other Charts</a></li> --}}
                    </ul>
                </li>
                {{-- <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">General Elements</a></li>
                        <li><a href="media_gallery.html">Media Gallery</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="glyphicons.html">Glyphicons</a></li>
                        <li><a href="widgets.html">Widgets</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                </li> --}}
                <li><a><i class="fa fa-table"></i> Rekap Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a class="nav-link"href="/admin/contohtabel">Berhasil</a></li>
                        <li><a class="nav-link"href="/admin/contohtabel">Belum Kembali</a></li>
                        <li><a class="nav-link"href="/admin/contohtabel">Terlambat</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-envelope"></i> Kata Mereka <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="nav-item"><a href="{{ url('getintouch') }}">Get In Touch Member</a></li>
                    </ul>
                </li>
                {{-- <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        {{-- <div class="menu_section">
            <h3>Live On</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="e_commerce.html">E-commerce</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project Detail</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="page_403.html">403 Error</a></li>
                        <li><a href="page_404.html">404 Error</a></li>
                        <li><a href="page_500.html">500 Error</a></li>
                        <li><a href="plain_page.html">Plain Page</a></li>
                        <li><a href="login.html">Login Page</a></li>
                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="level2.html">Level Two</a>
                                </li>
                                <li><a href="#level2_1">Level Two</a>
                                </li>
                                <li><a href="#level2_2">Level Two</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                            class="label label-success pull-right">Coming Soon</span></a></li>
            </ul>
        </div> --}}

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
{{-- </div> --}}
