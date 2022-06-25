@extends('klienLayouts.main2')

@section('title')
    Buat Member
@endsection

@section('member', 'active')

@section('content')
    <!-- contact section -->
    <section class="contact_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h3>
                               Sudah memiliki akun member penyewaan Bolang Gunung? Jika Belum, Daftar Sekarang Yuk
                            </h3>
                            {{-- <div class="btn-box">
                                <a href="https://wa.me/6285231404775">
                                    <img width="30px" height="30px" src="{{ asset('styleKlien/images/wa.png') }}" alt="" />
                                    WhatsApp
                                </a>
                            </div> --}}
                        </div>
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
                            Daftar member Bolang Gunung
                        </h5>
                        <form class="form-horizontal form-label-left input_mask" method="POST"
                        enctype="multipart/form-data" action="{{ route('buatmember.store') }}">
                            @csrf
                            <div>
                                <label for="fullname">Nama Lengkap * :</label>
                                <input type="text" placeholder="Nama Lengkap" name="nama" required>
                            </div>
                            <div>
                                <label for="fullname">Alamat * :</label>
                                <input type="text" placeholder="Alamat" name="alamat" required>
                            </div>
                            <div>
                                <label for="fullname">No Handphone * :</label>
                                <input type="text" placeholder="Nomor Handphone" name="no_hp" required>
                            </div>
                            <div>
                                <label for="fullname">Tanggal Lahir * :</label>
                                <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                            </div>
                            <div>
                                <label for="fullname">Foto KTP (< 17 Tahun KTP Orang Tua) * :</label>
                                <input type="file" placeholder="KTP" name="ktp" required>
                            </div>
                            <div>
                                <label for="fullname">Foto Kartu Pelajar (< 17 tahun) :</label>
                                <input type="file" placeholder="Kartu Pelajar"  name="kartu_pelajar">
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
