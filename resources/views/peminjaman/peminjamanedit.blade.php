@extends('adminLayouts.main')
@section('title')
    Edit Data Peminjaman
@endsection
@section('peminjaman', 'active')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Edit Data Peminjaman <small></small></h2>
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
                                action="{{ route('peminjaman.update', $peminjaman->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Nama Penyewa * :</label>
                                    <select class="form-control has-feedback-left" id="member_id" name="member_id" required>
                                        @foreach ($member as $m)
                                            <option value="{{ $m->id }}"
                                                @if ($m->id == $peminjaman->member_id) selected @endif>{{ $m->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('member_id'))
                                        <div class="error">{{ $errors->first('member_id') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="hargaSatuan">
                                    <label for="fullname">Harga Satuan * :</label>
                                    <input type="number" class="form-control has-feedback-right" id="harga_satuan"
                                        name="harga_satuan" required placeholder="Harga satuan" value="{{ $peminjaman->produk->harga }}" readonly>
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('harga_satuan'))
                                        <div class="error">{{ $errors->first('harga_satuan') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Produk yang Disewa * :</label>
                                    <select class="form-control has-feedback-left" id="produk_id" name="produk_id" required>
                                        @foreach ($produk as $p)
                                            <option value="{{ $p->id }}"
                                                @if ($p->id == $peminjaman->produk_id) selected @endif>{{ $p->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="fa fa-shopping-cart form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('produk_id'))
                                        <div class="error">{{ $errors->first('produk_id') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" id="totalHarga">
                                    <label for="fullname">Total Harga * :</label>
                                    <input type="number" class="form-control has-feedback-right" placeholder="Total Harga" id="total_harga"
                                        name="total_harga" value="{{ ($peminjaman->produk->harga)*($peminjaman->lama_pinjam)*($peminjaman->jumlah_pinjam) }}" readonly>
                                    <span class="fa fa-calculator form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('total_harga'))
                                        <div class="error">{{ $errors->first('total_harga') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Jumlah Sewa* :</label>
                                    <input type="number" class="form-control has-feedback-left" id="jumlah_pinjam" name="jumlah_pinjam"
                                        onkeyup="hitungHarga()" placeholder="Jumlah Sewa" required
                                        value="{{ $peminjaman->jumlah_pinjam }}">
                                    <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('jumlah_pinjam'))
                                        <div class="error">{{ $errors->first('jumlah_pinjam') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Pegawai yang Melayani* :</label>
                                    <input type="text" class="form-control has-feedback-right" placeholder="Nama Pegawai"
                                        name="nama_petugas" value="{{ $peminjaman->nama_petugas }}" readonly>
                                    <span class="fa fa-users form-control-feedback right" aria-hidden="true"></span>
                                    @if ($errors->has('nama_petugas'))
                                    <div class="error">{{ $errors->first('nama_petugas') }}</div>
                                @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Lama Sewa* :</label>
                                    <input type="number" class="form-control has-feedback-left" id="lama_pinjam"
                                        onkeyup="hitungHarga()" placeholder="Lama Sewa" name="lama_pinjam" required
                                        value="{{ $peminjaman->lama_pinjam }}">
                                    <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('lama_pinjam'))
                                        <div class="error">{{ $errors->first('lama_pinjam') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="fullname">Status * :</label>
                                    <select class="form-control" id="status" name="status" value="{{$peminjaman->status}}">
                                        <option value="Konfirmasi" @if ($peminjaman->status == "Konfirmasi")selected @endif>Konfirmasi</option>
                                        <option value="Dipinjam" @if ($peminjaman->status == "Dipinjam")selected @endif>Dipinjam</option>
                                    </select>
                                    <span class="fa fa-group form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-left">
                                        <br><br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('peminjaman.index') }}">Cancel</a>
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
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('select#produk_id').on('change',function(e){
            var selected_produk = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getPeminjaman/'+selected_produk,
                success:function(response){
                    console.log(response);
                    $('#harga_satuan').val(response.harga);
                    hitungHarga();
                }
            })
        });

        // calculate price
        hitungHarga();
        function hitungHarga() {
            var totalHarga = $('#total_harga');
            var lamaPinjam = $('#lama_pinjam').val();
            var jumlahPinjam = $('#jumlah_pinjam').val();
            var hargaSatuan = $('#harga_satuan').val();

            var hitungTotal = parseFloat(hargaSatuan) * parseFloat(jumlahPinjam) * parseFloat(lamaPinjam);
            totalHarga.val(hitungTotal);
        }
</script>
@endsection
