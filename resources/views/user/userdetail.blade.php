@extends('adminLayouts.main')
@section('title')
    Detail Pengakses Website
@endsection
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Detail Data Pengakses Website</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <ul class="list-unstyled timeline">
                                <div class="col-md-6">
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Nama</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->nama }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Username</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->username }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Tanggal Lahir</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ \Carbon\Carbon::parse($user->tanggal_lahir)->format('d M Y') }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Foto</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a><img width="90px" height="134" src="{{ asset('storage/' . $user->foto) }}"></a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-md-6">
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Email</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->email }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>No Telepon</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->no_hp }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Alamat</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->alamat }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            <div class="tags">
                                                <a href="" class="tag">
                                                    <span>Jabatan</span>
                                                </a>
                                            </div>
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a>{{ $user->jabatan }}</a>
                                                </h2>
                                            </div>
                                            <br>
                                        </div>
                                    </li>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <a class="btn btn-primary" href="{{ route('user.index') }}"><i class="fa fa-home"></i> Kembali</a>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
