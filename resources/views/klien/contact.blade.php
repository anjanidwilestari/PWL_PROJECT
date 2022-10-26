@extends('klienLayouts.main2')

@section('title')
    {{ $title }}
@endsection

@section('contact', 'active')

@section('content')
    <!-- contact section -->
    <section class="contact_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h3>
                                Hubungi Kami
                            </h3>
                            <p>
                                Sewa alat pendakian dan camping sekarang
                            </p>
                            <div class="btn-box">
                                <a href="https://wa.me/6285231404775">
                                    <img width="30px" height="30px" src="{{ asset('styleKlien/images/wa.png') }}" alt="" />
                                    WhatsApp
                                </a>
                            </div>
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
                            Ada Pesan Kesan Untuk Kami ?
                        </h5>
                        <form class="form-horizontal form-label-left input_mask" method="POST"
                            action="{{ route('contact.store') }}">
                            @csrf
                            <div>
                                <input type="text" placeholder="Nama Lengkap" name="nama" required>
                            </div>
                            <div>
                                <input type="number" placeholder="Nomor Handphone" name="no_hp" required>
                            </div>
                            <div>
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div>
                                <input type="text" placeholder="Pesan" class="input_message" name="pesan" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn_on-hover">
                                    Kirim
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
