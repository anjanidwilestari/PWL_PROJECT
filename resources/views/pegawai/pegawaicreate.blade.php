@extends('adminLayouts.main')

@section('title')
    Tambah Pegawai
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <!-- form input mask -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tambah Data Pegawai</h2>
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
                            <br>
                            <form class="form-horizontal form-label-left">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong>There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{ route('pegawai.store') }}" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Nama Pegawai</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" required>
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Upload Foto Pegawai</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto" required>
                                            <span class="fa fa-camera form-control-feedback right"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Alamat</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="text" class="form-control" name="alamat" name="alamat" id="alamat" aria-describedby="alamat" required>
                                            <span class="fa fa-home form-control-feedback right"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Lahir</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <input type="date" class="form-control" name="tanggal_lahir" name="nama" id="tanggal_lahir" aria-describedby="tanggal_lahir" required>
                                            {{-- <span class="fa fa-user form-control-feedback right" aria-hidname="nama" id="nama" aria-describedby="nama"den="true"></span> --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Jabatan</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <select class="form-control" id="jabatan" name="jabatan">
                                                <option value="Manager">Manager</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Karyawan">Karyawan</option>
                                            </select>
                                            {{-- @if ($errors->has('jabatan'))
                                                <div class="error">{{ $errors->first('jabatan') }}</div>
                                            @endif --}}
                                            <span class="fa fa-group form-control-feedback right"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            {{-- <a class="btn btn-primary" href="{{ route('pegawai.index')}}">Cancel</a> --}}
                                        </div>
                                    </div>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /form input mask -->
@endsection
