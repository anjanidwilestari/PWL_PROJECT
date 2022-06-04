@extends('klienLayouts.main')

@section('title')
    {{ $title }}
@endsection

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
                            It is a long established fact that a reader will be distracted
                            by the readable
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <h5>
                        Get In Touch
                    </h5>
                    <form action="">
                        <div>
                            <input type="text" placeholder="Full Name " />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone Number" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email Address" />
                        </div>
                        <div>
                            <input type="text" placeholder="Message" class="input_message" />
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