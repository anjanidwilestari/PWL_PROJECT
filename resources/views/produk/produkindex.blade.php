@extends('adminLayouts.main')

@section('title')
    Data Produk
@endsection

@section('produk', 'active')

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
                                name="keyword" required>
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
                                <a class="btn btn-round btn-success" href="{{ route('produk.create') }}">+ Tambah Data</a>
                                <a class="btn btn-round btn-danger" href="{{route('produk.produkpdf')}}">
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
                            <h2>Data Produk</h2>
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
                                            <th scope="col" class="text-center">Kode Produk</th>
                                            <th scope="col" class="text-center">Nama Produk</th>
                                            <th scope="col" class="text-center">Kategori</th>
                                            <th scope="col" class="text-center">Gambar</th>
                                            <th scope="col" class="text-center">Harga</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        @foreach ($produk as $data)
                                            <tr>
                                                <td scope="row">{{ ++$i }}</td>
                                                <td>{{ $data->kode_produk }}</td>
                                                <td>{{ $data->nama_produk }}</td>
                                                <td>{{$data->kategoriproduk->nama_kategori}}</td>
                                                <td><img width="70px" height="70px"
                                                        src="{{ asset('storage/' . $data->gambar) }}"></td>
                                                <td>Rp{{ number_format($data->harga) }}/{{$data->satuan}}</td>
                                                <td>
                                                    <form action="{{ route('produk.destroy', $data->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-icons btn-primary"
                                                            href="{{ route('produk.show', $data->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                        @can('admin')
                                                            <a class="btn btn-icons btn-warning"
                                                                href="{{ route('produk.edit', $data->id) }}"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-icons btn-danger show_confirm"><i
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
                        <div class="paginate">
                            <div class="container">
                                <div class="row">
                                    <div class="detail-data col-md-12">
                                        <p>Page : {!! $produk->currentPage() !!} <br />
                                            Jumlah Data : {!! $produk->total() !!} <br />
                                            Data Per Halaman : {!! $produk->perPage() !!} <br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            {{-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"> --}}
                                {{ $produk->links()}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> --}}
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
