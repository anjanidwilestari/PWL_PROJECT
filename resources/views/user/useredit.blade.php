@extends('adminLayouts.main')
@section('title')
    Edit Data User
@endsection
@section('user', 'active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Data User <small></small></h2>
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
                                enctype="multipart/form-data" action="{{route('user.update',$user->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Nama * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Nama" name="nama" required value="{{$user->nama}}">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Email * :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="Email" name="email" required value="{{$user->email}}">
                                    <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('password'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Username * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Username" name="username" required value="{{$user->username}}">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('username'))
                                        <div class="error">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">No Handphone * :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="No Handphone" name="no_hp" required value="{{$user->no_hp}}">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('no_hp'))
                                        <div class="error">{{ $errors->first('no_hp') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Tanggal Lahir * :</label>
                                    <input type="date" class="form-control has-feedback-left" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="{{$user->tanggal_lahir}}">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Jabatan * :</label>
                                    <select class="form-control has-feedback-right" name="jabatan" id="jabatan" required>
                                        <option value="Admin" @if ($user->jabatan == "Admin")selected @endif>Admin</option>
                                        <option value="Manajer" @if ($user->jabatan == "Manajer")selected @endif>Manajer</option>
                                    </select>
                                    <span class="fa fa-group form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Alamat * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Alamat" name="alamat" required value="{{$user->alamat}}">
                                    <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Ganti Password :</label>
                                    <input type="password" class="form-control has-feedback-right" placeholder="Password" name="password">
                                    <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Foto :</label>
                                    <input type="file" class="form-control has-feedback-left" placeholder="Foto" name="foto" value="{{old('foto')}}">
                                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                                    <img width="80px" height="100"src="{{asset('storage/'. $user->foto)}}" >
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Konfirmasi Password :</label>
                                    <input type="password" class="form-control has-feedback-right" placeholder= "Konfirmasi Password" name="password_confirmation">
                                    <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('user.index') }}">Cancel</a>
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
