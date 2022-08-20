@extends('adminLayouts.main')
@section('title')
    Tambah Data Pengembalian
@endsection
@section('pengembalian', 'active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tambah Data Pengembalian <small></small></h2>
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
                                action="{{ route('pengembalian.store') }}">
                                @csrf

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Kode Peminjaman * :</label>
                                    <select class="form-control has-feedback-left" id="peminjaman_id" name="peminjaman_id" required>
                                        <option value="">--Masukkan Kode Peminjaman--</option>
                                        @foreach ($peminjaman as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('peminjaman_id') == $p->id ? 'selected' : '' }}>{{ $p->kode_peminjaman }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('peminjaman_id'))
                                        <div class="error">{{ $errors->first('peminjaman_id') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
                                    <label for="fullname">Status</label>
                                    <select class="form-control has-feedback-right" id="status_kembali" name="status_kembali" required>
                                        <option value="Berhasil" {{old('status_kembali') == 'Berhasil' ? 'selected' : ''}}>Berhasil</option>
                                        <option value="Terlambat" {{old('status_kembali') == 'Terlambat' ? 'selected' : ''}}>Terlambat</option>
                                        <option value="Bermasalah" {{old('status_kembali') == 'Bermasalah' ? 'selected' : ''}}>Bermasalah</option>
                                    </select>
                                    @if ($errors->has('status_kembali'))
                                        <div class="error">{{ $errors->first('status_kembali') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Keterangan * :</label>
                                    <textarea class="form-control has-feedback-left" id="keterangan" 
                                        name="keterangan" required value="{{old('keterangan')}}" 
                                        placeholder="Keterangan" disabled> </textarea>
                                        @if ($errors->has('keterangan'))
                                            <div class="error">{{ $errors->first('keterangan') }}</div>
                                        @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
                                    <label for="fullname">Denda * :</label>
                                    <input type="number" class="form-control has-feedback-right" id="denda"
                                        name="denda" required value="{{ old('denda') }}"
                                        placeholder="Denda" disabled>
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('denda'))
                                        <div class="error">{{ $errors->first('denda') }}</div>
                                    @endif
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('pengembalian.index') }}">Cancel</a>
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
@section('js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#status_kembali").change(function () {
            if ($(this).val() == 'Berhasil') {
                
                $("#keterangan").attr("disabled", "disabled");
                $("#denda").attr("disabled", "disabled");
            } else {
                $("#keterangan").removeAttr("disabled");
                $("#keterangan").focus();
                $("#denda").removeAttr("disabled");
                $("#denda").focus();
            }
        });
    });
</script>
@endsection
