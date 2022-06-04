@extends('klienLayouts.main2')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- course section -->
    <section class="course_section layout_padding-bottom">
        <div class="side_img">
            <img src="{{ asset('styleKlien/images/side-img.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="heading_container" style="padding-top: 40px" >
                <h3>
                    Galeri Bolang Gunung
                </h3>
                <p>
                    Beberapa foto rental alat pendakian dan camping
                </p>
            </div>
            <div class="course_container">
                <div class="course_content">
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-1.jpg')}}" alt="" />
                        <a href="https://wa.me/6285231404775" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Matras <br />
                            Gulung
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-2.jpg')}}" alt="" />
                        <a href="https://wa.me/6285231404775" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Sleeping <br />
                            Bag Polar
                        </h5>'
                    </div>
                </div>
                <div class="course_content">
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-3.jpg')}}" alt="" />
                        <a href="https://wa.me/6285231404775" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Tenda <br />
                            Dome – Outdoor
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-4.jpg')}}" alt="" />
                        <a href="https://wa.me/6285231404775" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Tenda <br />
                            Pramuka
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-5.jpg')}}" alt="" />
                        <a href="https://wa.me/6285231404775" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Tas Carrier
                        </h5>
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
    <!-- end course section -->
@endsection