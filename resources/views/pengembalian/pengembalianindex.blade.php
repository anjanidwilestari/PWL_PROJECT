@extends('adminLayouts.main')

@section('title')
    Data Pengembalian
@endsection

@section('pengembalian', 'active')

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
                                name="keyword" value="{{ request('keyword') }}" required>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Cari!</button>
                            </span>
                        </form>
                    </div>
                </div>
                @can('admin')
                <div class="title_left">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="input-group">
                            <a class="btn btn-round btn-success" href="{{ route('pengembalian.create') }}">+ Tambah Data</a>
                            <a class="btn btn-round btn-danger" href="{{route('pengembalian.pengembalianpdf')}}">
                                <i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Pengembalian</h2>
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
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Keterangan</th>
                                        <th scope="col" class="text-center">Denda</th>
                                        <th scope="col" class="text-center">Tanggal Kembali</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($pengembalian as $data)
                                        <tr>
                                            <td scope="row">{{ ++$i }}</td>
                                            <td>{{ $data->peminjaman->kode_peminjaman }}</td>
                                            @if ($data->status_kembali == 'Berhasil')
                                                <td class="text-center"><span
                                                            class="label label-info">Berhasil</span></td>
                                            @elseif ($data->status_kembali == 'Terlambat')
                                                <td class="text-center"><span
                                                            class="label label-default">Terlambat</span></td>
                                            @else
                                                <td class="text-center"><span
                                                            class="label label-warning">Bermasalah</span></td>
                                            @endif
                                            <td>
                                                @if (($data->keterangan) == null)
                                                    -
                                                @else
                                                {{ $data->keterangan }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (($data->denda) == null)
                                                    -
                                                @else
                                                Rp{{ number_format($data->denda) }}
                                                @endif
                                            </td>
                                            <td>{{ $data->created_at->isoFormat('D MMMM Y') }}</td>
                                            <td>
                                                <form action="{{ route('pengembalian.destroy', $data->id) }}" method="POST">
                                                    {{-- <a class="btn btn-icons btn-dark" href="{{ route('pengembalian.cetaknota', $data->id) }}"><i class="fa fa-print"></i></a> --}}
                                                    <a class="btn btn-icons btn-primary" href="{{ route('pengembalian.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                                    @can('admin')
                                                    <a class="btn btn-icons btn-warning" href="{{ route('pengembalian.edit', $data->id) }}"><i class="fa fa-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icons btn-danger show_confirm"><i class="fa fa-trash-o"></i></button>
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
                                        <p>Page : {{ $pengembalian->currentPage() }} <br />
                                            Jumlah Data : {{ $pengembalian->total() }} <br />
                                            Data Per Halaman : {{ $pengembalian->perPage() }} <br />
                                        </p>
                                    </div>
                                    <div class="mx-auto">
                                        <div class="paginate-button col-md-12">
                                            {{ $pengembalian->links() }}
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
@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Yakin ingin menghapus data?`,
              text: "Data ini akan terhapus permanen setelah anda menyetujui pesan ini",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            } else {
                swal("Data Anda Aman!");
            }
          });
      });
  
</script>
@endsection
