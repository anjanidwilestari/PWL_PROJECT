@extends('adminLayouts.main')

@section('title')
    Peminjaman Belum Kembali
@endsection

@section('dikembalikan', 'active')

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
                        {{-- <form class="input-group" action="{{ url()->current() }}" method="GET">
                            <input type="search" class="form-control" placeholder="Search for .." aria-label="Search"
                                name="keyword" value="{{ request('keyword') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Cari!</button>
                            </span>
                        </form> --}}
                    </div>
                </div>
               
                <div class="title_left">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="input-group">
                            {{-- <a class="btn btn-round btn-success" href="{{ route('peminjaman.create') }}">+ Tambah Data</a> --}}
                            <a class="btn btn-round btn-danger" href="{{route('peminjaman.dikembalikanpdf')}}">
                                <i class="fa fa-print"> Cetak Transaksi</i></a>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Peminjaman</h2>
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
                                        <th scope="col" class="text-center">Kode Sewa</th>
                                        <th scope="col" class="text-center">Penyewa</th>
                                        <th scope="col" class="text-center">Produk</th>
                                        <th scope="col" class="text-center">Jumlah Sewa</th>
                                        <th scope="col" class="text-center">Tanggal Sewa</th>
                                        <th scope="col" class="text-center">Lama Sewa</th>
                                        <th scope="col" class="text-center">Harga Total</th>
                                        <th scope="col" class="text-center">Pegawai</th>
                                        <th scope="col" class="text-center">Status</th>
                                        {{-- <th scope="col" class="text-center">Action</th> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($peminjaman as $data)
                                        <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>{{ $data->kode_peminjaman }}</td>
                                            <td>{{ $data->member->nama }}</td>
                                            <td>{{ $data->produk->nama_produk }}</td>
                                            <td>{{ $data->jumlah_pinjam }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tgl_pinjam)->isoFormat('D MMMM YYYY') }}</td>
                                            <td>{{ $data->lama_pinjam }} {{ $data->produk->satuan }}</td>
                                            <td>Rp{{ number_format($data->total_harga) }}</td>
                                            <td>{{ $data->nama_petugas }}</td>
                                                @if ($data->pengembalian->status_kembali == 'Berhasil')
                                                    <td class="text-center"><span
                                                            class="label label-info">Berhasil</span></td>
                                                @elseif ($data->pengembalian->status_kembali == 'Terlambat')
                                                    <td class="text-center"><span
                                                            class="label label-default">Terlambat</span></td>
                                                @else
                                                    <td class="text-center"><span
                                                            class="label label-warning">Bermasalah</span></td>
                                                @endif
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
                                        <p>Page : {{ $peminjaman->currentPage() }} <br />
                                            Jumlah Data : {{ $peminjaman->total() }} <br />
                                            Data Per Halaman : {{ $peminjaman->perPage() }} <br />
                                        </p>
                                    </div>
                                    <div class="mx-auto">
                                        <div class="paginate-button col-md-12">
                                            {{ $peminjaman->links() }}
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
