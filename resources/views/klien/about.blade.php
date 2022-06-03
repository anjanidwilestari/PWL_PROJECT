@extends('klienLayouts.main')

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
                            <img src="{{ asset('styleKlien/images/a-1.jpg')}}" alt="" />
                        </div>
                        <div class="img-box b2">
                            <img src="{{ asset('styleKlien/images/a-2.jpg')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h3>
                                About Our College
                            </h3>
                            <p>
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                                The point of using Lorem Ipsum is that it has a more it
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
@endsection