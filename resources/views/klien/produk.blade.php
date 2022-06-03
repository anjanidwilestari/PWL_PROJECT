@extends('klienLayouts.main')

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
            <div class="heading_container">
                <h3>
                    POPULAR COURSES
                </h3>
                <p>
                    It is a long established fact that a reader will be distracted
                </p>
            </div>
            <div class="course_container">
                <div class="course_content">
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-1.jpg')}}" alt="" />
                        <a href="" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            LMS <br />
                            Content
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-2.jpg')}}" alt="" />
                        <a href="" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            From <br />
                            Zero to Hero
                        </h5>'
                    </div>
                </div>
                <div class="course_content">
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-3.jpg')}}" alt="" />
                        <a href="" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Learn <br />
                            Python – Interactive
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-4.jpg')}}" alt="" />
                        <a href="" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Your <br />
                            Complete Guide
                        </h5>
                    </div>
                    <div class="box">
                        <img src="{{ asset('styleKlien/images/c-5.jpg')}}" alt="" />
                        <a href="" class="">
                            <img src="{{ asset('styleKlien/images/link.png')}}" alt="" />
                        </a>
                        <h5>
                            Photography
                        </h5>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    Read More
                </a>
            </div>
        </div>
    </section>

    <!-- end course section -->
@endsection