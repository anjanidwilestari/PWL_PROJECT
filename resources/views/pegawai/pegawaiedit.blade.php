@extends('adminLayouts.main')
@section('title')
    Edit Data Pegawai
@endsection
@section('pegawai', 'active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Data Pegawai <small></small></h2>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="x_content">
                            <br>
                            <form class="form-horizontal form-label-left input_mask" method="POST"
                                enctype="multipart/form-data" action="{{route('pegawai.update',$pegawai->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Nama Lengkap * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Nama Lengkap" name="nama" required value="{{$pegawai->nama}}">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Jabatan * :</label>
                                    <select class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}">
                                        <option value="Admin" @if ($pegawai->jabatan == "Admin")selected @endif>Admin</option>
                                        <option value="Manajer" @if ($pegawai->jabatan == "Manajer")selected @endif>Manajer</option>
                                        <option value="Karyawan" @if ($pegawai->jabatan == "Karyawan")selected @endif>Karyawan</option>
                                    </select>
                                    <span class="fa fa-group form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Foto Pegawai * :</label>
                                    <input type="file" class="form-control" placeholder="Foto" name="foto" value="{{old('foto')}}">
                                    <img width="80px" height="100"src="{{asset('storage/'. $pegawai->foto)}}" >
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Tanggal Lahir * :</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="{{$pegawai->tanggal_lahir}}">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Alamat * :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="Alamat" name="alamat" required value="{{$pegawai->alamat}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('pegawai.index') }}">Cancel</a>
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
