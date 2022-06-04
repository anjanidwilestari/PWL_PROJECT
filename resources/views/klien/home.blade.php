@extends('klienLayouts.main')

@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- slider section -->
<section class=" slider_section position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="detail-box">
                  <div>
                    <h1>
                        RENTAL ALAT PENDAKIAN
                    </h1>
                    <a href="/klien-produk">
                      Lihat Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="detail-box">
                  <div>
                    <h1>
                        RENTAL ALAT CAMPING
                    </h1>
                    <a href="/klien-produk">
                      Lihat Sekarang
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="detail-box">
                  <div>
                    <h1>
                      SEWA SEKARANG 
                    </h1>
                    <a href="https://wa.me/6285231404775">
                      Hubungi Kami
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->
    <!-- special section -->
    <section class="special_section">
        <div class="container">
            <div class="special_container">
                <div class="box b1">
                    <div class="img-box">
                        <img src="{{ asset('styleKlien/images/award.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            BEST <br>
                            INDUSTRY LEADERS
                        </h4>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="box b2">
                    <div class="img-box">
                        <img src="{{ asset('styleKlien/images/study.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            LEARN <br />
                            COURSES ONLINE
                        </h4>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="box b3">
                    <div class="img-box">
                        <img src="{{ asset('styleKlien/images/books-stack-of-three.png')}}" alt="" />
                    </div>
                    <div class="detail-box">
                        <h4>
                            BEST <br />
                            LIBRARY & STORE
                        </h4>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end special section -->

    {{-- <!-- login section -->
    <section class="login_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <h3>
                            GET ONLINE COURSES FOR FREE
                        </h3>
                        <p>
                            Create your free account now and get immediate access to 100s of
                            online courses
                        </p>
                        <a href="">
                            REGISTER NOW
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login_form">
                        <h5>
                            Login Now
                        </h5>
                        <form action="">
                            <div>
                                <input type="email" placeholder="Email " />
                            </div>
                            <div>
                                <input type="password" placeholder="Password" />
                            </div>
                            <button type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section --> --}}

    <!-- client section -->
    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h3>
                    What People Say
                </h3>
                <p>
                    It is a long established fact that a reader will be distracted
                </p>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('styleKlien/images/client.png')}}" alt="" />
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Distracted by
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be
                                    distracted by the readable content of a page when looking at
                                    its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('styleKlien/images/client.png')}}" alt="" />
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Distracted by
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be
                                    distracted by the readable content of a page when looking at
                                    its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('styleKlien/images/client.png')}}" alt="" />
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Distracted by
                                </h5>
                                <p>
                                    It is a long established fact that a reader will be
                                    distracted by the readable content of a page when looking at
                                    its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-box">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->

    

@endsection
