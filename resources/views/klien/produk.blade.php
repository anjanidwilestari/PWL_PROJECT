@extends('klienLayouts.main2')

@section('title')
    {{ $title }}
@endsection

@section('produk', 'active')

@section('content')
    <!-- event section -->
    <section class="event_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h3>
                    Persewaan Terbaik
                </h3>
                <p>
                    Rental alat pendakian dan camping  di Malang
                </p>
            </div>
            <div class="event_container">
                @foreach($produk as $p)
                <div class="box">
                    <div class="img-box">
                        <img height = "150px" width = "200px" src="{{ asset('storage/' . $p->gambar) }}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            {{$p->nama_produk}}
                        </h4>
                        {{-- <h6>
                            Warna hijau, kapasitas 4 orang
                        </h6> --}}
                    </div>
                    <div class="date-box">
                        <h3>
                            <span>
                                Rp
                            </span>
                            {{$p->harga}}
                        </h3>
                        <h6>
                            Per {{$p->satuan}}
                        </h6>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {{-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"> --}}
                    {{ $produk->links()}}
                {{-- </div> --}}
            </div>
            <div class="btn-box">
                <a href="https://wa.me/6285231404775">
                    Sewa Sekarang
                </a>
            </div>
        </div>
    </section>
    <!-- end event section -->
@endsection