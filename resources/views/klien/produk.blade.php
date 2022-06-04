@extends('klienLayouts.main2')

@section('title')
    {{ $title }}
@endsection

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
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('styleKlien/images/event-img.jpg')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            Sleeping Bag
                        </h4>
                        <h6>
                            Merk Milestone, warna orange, polar
                        </h6> 
                    </div>
                    <div class="date-box">
                        <h3>
                            <span>
                                RP
                            </span>
                            10.000
                        </h3>
                        <h6>
                            Per hari
                        </h6> 
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('styleKlien/images/event-img.jpg')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            Tenda Dome
                        </h4>
                        <h6>
                            Warna hijau, kapasitas 4 orang
                        </h6>
                    </div>
                    <div class="date-box">
                        <h3>
                            <span>
                                RP
                            </span>
                            20.000
                        </h3>
                        <h6>
                            Per hari
                        </h6>
                    </div>
                </div>
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