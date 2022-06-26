@extends('klienLayouts.main2')

@section('title')
    Ajukan Peminjaman
@endsection

@section('sewa', 'active')

@section('content')
    <!-- contact section -->
    <section class="contact_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <section class="event_section layout_padding">
                        <div class="heading_container">
                            <h3>
                               Sudah memiliki akun member penyewaan Bolang Gunung? Jika Belum, Daftar Dulu Yuk
                            </h3>
                            <div class="btn-box">
                                <a href="/buatmember">
                                    <center>DAFTAR MEMBER<br>SEKARANG</center>
                                </a>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
                <div class="col-md-6">
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
                    <div class="contact-form">
                        <h5>
                            Form Peminjaman Bolang Gunung
                        </h5>
                        <br>
                        <form class="form-horizontal form-label-left input_mask" method="POST"
                        enctype="multipart/form-data" action="{{ route('sewa.store') }}">
                            @csrf
                            <div>
                                <label for="fullname">Nama Member * :</label>
                                <select class="form-control" id="member_id" name="member_id" required>
                                    <option value="">--Pilih Nama Member--</option>
                                    @foreach ($member as $m)
                                        <option value="{{ $m->id }}"
                                            {{ old('member_id') == $m->id ? 'selected' : '' }}>{{ $m->nama }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('member_id'))
                                        <div class="error">{{ $errors->first('member_id') }}</div>
                                    @endif
                            </div>
                            <br>
                            <div>
                                <label for="fullname">Produk yang Disewa * :</label>
                                <select class="form-control" id="produk_id" name="produk_id" required>
                                    <option value="">--Pilih Produk--</option>
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->id }}" {{old('produk_id') == $p->id ? 'selected' : ''}}>{{ $p->nama_produk }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('produk_id'))
                                    <div class="error">{{ $errors->first('produk_id') }}</div>
                                @endif
                            </div>
                            <br>
                            <div id="hargaSatuan">
                                <label for="fullname">Harga Satuan :</label>
                                <input type="number" class="form-control" placeholder="Harga Satuan" id="harga_satuan"
                                name="harga_satuan" required value="{{ old('harga_satuan') }}">
                                @if ($errors->has('harga_satuan'))
                                    <div class="error">{{ $errors->first('harga_satuan') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="fullname">Jumlah Sewa * :</label>
                                <input type="number" class="form-control" id="jumlah_pinjam"
                                name="jumlah_pinjam" required value="{{ old('jumlah_pinjam') }}" min="1"
                                onkeyup="hitungHarga()" placeholder="Jumlah Sewa">
                                @if ($errors->has('jumlah_pinjam'))
                                    <div class="error">{{ $errors->first('jumlah_pinjam') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="fullname">Lama Sewa * :</label>
                                <input type="number" class="form-control" id="lama_pinjam"
                                    name="lama_pinjam" required value="{{ old('lama_pinjam') }}" min="1"
                                    onkeyup="hitungHarga()" placeholder="Lama Sewa">
                                @if ($errors->has('lama_pinjam'))
                                    <div class="error">{{ $errors->first('lama_pinjam') }}</div>
                                @endif
                            </div>
                            <div id="totalHarga">
                                <label for="fullname">Total Harga :</label>
                                <input type="number" class="form-control" id="total_harga"
                                    name="total_harga" required value="{{ old('total_harga') }}"
                                    placeholder="Total Harga">
                                @if ($errors->has('total_harga'))
                                    <div class="error">{{ $errors->first('total_harga') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="fullname">Status Bayar :</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-radio">
                                            <input type="radio" class="form-control" name="status_bayar" id="status_bayar" value="Lunas" @if (old('status_bayar')) checked @endif><center> Lunas</center>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-radio">
                                            <input type="radio" class="form-control" name="status_bayar" id="status_bayar" checked value="Belum Lunas" @if (old('status_bayar')) checked @endif><center> Belum Lunas</center>
                                        </div>
                                      </div>
                                   </div>
                            </div>
                            <br>
                            <div id="bukti">
                                {{-- @if (old('status_bayar') == 'Belum Lunas') --}}
                                    {{-- <input type="hidden" class="form-control" id="bukti" name="bukti" required > --}}
                                {{-- @else --}}
                                <label for="fullname">Bukti Pembayaran (Kosongi saja jika pembayaran belum lunas):</label>
                                <input type="file" id="bukti" name="bukti" value="{{ old('bukti') }}" placeholder="Bukti">
                                @if ($errors->has('bukti'))
                                    <div class="error">{{ $errors->first('bukti') }}</div>
                                @endif
                                {{-- @endif --}}
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn_on-hover">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
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
                url:'/getPinjam/'+selected_produk,
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
