@extends('adminLayouts.main')

@section('title')
    Data User
@endsection

@section('user', 'active')

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
                        <form class="input-group" action="{{ url()->current() }}" method="GET">
                            <input type="search" class="form-control" placeholder="Search for .." aria-label="Search"
                                name="keyword" value="{{ request('keyword') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Cari!</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data User Pengakses Website</h2>
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
                            <div class="table-responsive">
                            <table class="table table-striped jambo_table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Pengguna</th>
                                        <th scope="col" class="text-center">Username</th>
                                        <th scope="col" class="text-center">Foto</th>
                                        <th scope="col" class="text-center">Tanggal Lahir</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">No Handphone</th>
                                        <th scope="col" class="text-center">Alamat</th>
                                        <th scope="col" class="text-center">Jabatan User</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($user as $data)
                                    <tr class="even pointer">
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->username }}</td>
                                            <td><img width="70px" height="70px" src="{{ asset('storage/' .$data->foto) }}"></td>
                                            <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            @if ($data->jabatan == 'Admin')
                                                <td class="text-center"><span class="label label-success">Admin</span></td>
                                            @else
                                                <td class="text-center"><span class="label label-default">Manajer</span></td>
                                            @endif
                                            <td>
                                                <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                                                    <a class="btn btn-icons btn-primary" href="{{ route('user.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                                    @can('admin')
                                                    <a class="btn btn-icons btn-warning" href="{{ route('user.edit', $data->id) }}"><i class="fa fa-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icons btn-danger"><i class="fa fa-trash-o"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="paginate">
                            <div class="container">
                                <div class="row">
                                    <div class="detail-data col-md-12">
                                        <p>Page : {!! $user->currentPage() !!} <br />
                                            Jumlah Data : {!! $user->total() !!} <br />
                                            Data Per Halaman : {!! $user->perPage() !!} <br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {{-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"> --}}
                                {{ $user->links()}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
