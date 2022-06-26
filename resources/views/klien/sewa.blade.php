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
                            <div>
                                <label for="fullname">Jumlah Sewa * :</label>
                                <input type="number" class="form-control" id="jumlah_pinjam"
                                name="jumlah_pinjam" required value="{{ old('jumlah_pinjam') }}" min="1"
                                onkeyup="hitungPrice()" placeholder="Jumlah Sewa">
                                @if ($errors->has('jumlah_pinjam'))
                                    <div class="error">{{ $errors->first('jumlah_pinjam') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="fullname">Lama Sewa * :</label>
                                <input type="number" class="form-control" id="lama_pinjam"
                                    name="lama_pinjam" required value="{{ old('lama_pinjam') }}" min="1"
                                    onkeyup="hitungPrice()" placeholder="Lama Sewa">
                                @if ($errors->has('lama_pinjam'))
                                    <div class="error">{{ $errors->first('lama_pinjam') }}</div>
                                @endif
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