@extends('adminLayouts.main')

@section('title')
    Data Pegawai
@endsection

@section('pegawai', 'active')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group" action="{{ url()->current() }}" method="GET">
                            {{-- <form class="form-inline my-2 my-lg-0" action="{{ url()->current() }}" method="GET"> --}}
                                <input type="text" class="form-control" placeholder="Search for .." aria-label="Search"
                                    name="keyword" value="{{ request('keyword') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="title_left">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="input-group">
                            <a class="btn btn-round btn-success" href="{{ route('pegawai.create') }}">+ Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            {{-- <div class="alert-option">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif

                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Pegawai</h2>
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
                            <table id="datatable" class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Pegawai</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Tanggal Lahir</th>
                                        <th class="text-center">Umur</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($pegawai as $data)
                                    <tr>
                                        <td scope="row">{{ ++$i}}</td>
                                        <td>{{$data->kode_pegawai}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td><img width="50px" height="50px" src="{{ asset('storage/' . $data->foto) }}"></td>
                                        <td>{{$data->alamat}}</td>
                                        <td>{{$data->tanggal_lahir}}</td>
                                        <td>{{$data->umur}}</td>
                                        <td>{{$data->jabatan}}</td>
                                        <td>
                                            <form action="{{ route('pegawai.destroy',  $data->id) }}" method="POST">
                                                <a class="btn btn-icons btn-primary" href="{{route('pegawai.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-icons btn-warning" href="{{route('pegawai.edit', $data->id)}}"><i class="fa fa-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-icons btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="paginate">
                            <div class="container">
                                <div class="row">
                                    <div class="detail-data col-md-12">
                                        <p>Page : {!! $pegawai->currentPage() !!} <br />
                                            Jumlah Data : {!! $pegawai->total() !!} <br />
                                            Data Per Halaman : {!! $pegawai->perPage() !!} <br />
                                        </p>
                                    </div>
                                    <div class="mx-auto">
                                        <div class="paginate-button col-md-12">
                                            {!! $pegawai->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
