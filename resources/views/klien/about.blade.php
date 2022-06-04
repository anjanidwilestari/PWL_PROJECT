@extends('klienLayouts.main2')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="side_img">
            <img src="{{ asset('styleKlien/images/side-img.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img_container">
                        <div class="img-box b1">
                            <img src="{{ asset('styleKlien/images/a-1.jpg')}}" alt="Rental alat pendakian" />
                        </div>
                        <div class="img-box b2">
                            <img src="{{ asset('styleKlien/images/a-2.jpg')}}" alt="Rental alat pendakian" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h3>
                                Tentang Bolang Gunung
                            </h3>
                            <p>
                                Bolang Gunung salah satu persewaan perlengkapan pendakian dan camping yang lengkap 
                                di Malang yang berdiri sejak tahun 2022. Dengan harga yang sangat murah, barang kami 
                                memiliki kualitas yang sangat bagus dan terawat sesuai standarisasi untuk persewaan, 
                                itu semua demi kenyamanan dan keamanan anda. Jadi bagi anda yang menghabiskan waktu liburan 
                                anda untuk pendakian dan bagi anda yang bingung ingin menyewa perlengkapan camping, kami adalah 
                                solusi tepat untuk anda, dengan harga yang terjangkau dan mengutamakan keselamatan.
                            </p>
                            <a href="https://wa.me/6285231404775">
                                Sewa Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
@endsection