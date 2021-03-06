@extends('adminLayouts.main')
@section('title')
    Tambah Data Member
@endsection
@section('member', 'active')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tambah Data Member <small></small></h2>
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
                                enctype="multipart/form-data" action="{{ route('member.store') }}">
                                @csrf

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Nama Lengkap * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Nama Lengkap"
                                        name="nama" required>
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Alamat * :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="Alamat"
                                        name="alamat" required>
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Tanggal Lahir * :</label>
                                    <input type="date" class="form-control has-feedback-left" placeholder="Tanggal Lahir"
                                        name="tanggal_lahir" required>
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">No Handphone * :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="No Handphone"
                                        name="no_hp" required>
                                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Foto KTP * :</label>
                                    <input type="file" class="form-control has-feedback-left" placeholder="KTP" name="ktp" required>
                                    <span class="fa fa-picture-o form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="kartu_pelajar">
                                    <label for="fullname">Kartu Pelajar * :</label>
                                    <input type="file" class="form-control has-feedback-right" placeholder="Kartu Pelajar" name="kartu_pelajar">
                                    <span class="fa fa-picture-o form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                {{-- <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Disabled Input </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Read-Only Input</label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
          </div>
        </div> --}}
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