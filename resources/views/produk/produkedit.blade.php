@extends('adminLayouts.main')
@section('title')
    Edit Data Produk
@endsection
@section('produk', 'active')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Data Produk <small></small></h2>
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
                                enctype="multipart/form-data" action="{{route('produk.update',$produk->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Nama Produk * :</label>
                                    <input type="text" class="form-control has-feedback-left" placeholder="Nama Produk" name="nama_produk" required value="{{$produk->nama_produk}}">
                                    <span class="fa fa-compass form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Kategori Produk * :</label>
                                    <select class="form-control has-feedback-right" id="kategori_id" name="kategori_id" required> 
                                        @foreach ($kategoriproduk as $data)
                                          <option value="{{$data->id}}"
                                            @if ($data->id == $produk->kategori_id) selected
                                            @endif>{{$data->nama_kategori}}
                                          </option>
                                        @endforeach
                                      </select>
                                    <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Gambar produk * :</label>
                                    <input type="file" class="form-control" placeholder="Gambar" name="gambar" value="{{old('gambar')}}">
                                    <img width="80px" height="100"src="{{asset('storage/'. $produk->gambar)}}" >
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Harga per {{$produk->satuan}} * :</label>
                                    <input type="number" class="form-control" placeholder="harga" name="harga" required value="{{$produk->harga}}">
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('produk.index') }}">Cancel</a>
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
