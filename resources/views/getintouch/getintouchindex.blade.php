@extends('adminLayouts.main')

@section('title')
    Get In Touch
@endsection

@section('getintouch', 'active')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="container-scroller">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <form class="input-group" action="{{ url()->current() }}" method="GET">
                                <input type="search" class="form-control" placeholder="Search for .." aria-label="Search"
                                    name="keyword" value="{{ request('keyword') }}" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Cari!</button>
                                </span>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="title_left">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="input-group">
                            <a class="btn btn-round btn-success" href="{{ route('member.create') }}">+ Tambah Data</a>
                        </div>
                    </div>
                </div> --}}
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>List Get In Touch Member</h2>
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
                                                <th class=" text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">No Handphone</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center" width="350px"> Isi Pesan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($getintouch as $data)
                                                <tr>
                                                    <td scope="row">{{ ++$i }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ $data->no_hp }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->pesan }}</td>
                                                    <td>
                                                        <form action="{{ route('contact.destroy', $data->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-icons btn-primary"
                                                                href="{{ route('contact.show', $data->id) }}">
                                                                <i class="fa fa-eye"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('admin')
                                                                <button type="submit" class="btn btn-icons btn-danger"><i
                                                                        class="fa fa-trash-o"></i></button>
                                                            @endcan
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
