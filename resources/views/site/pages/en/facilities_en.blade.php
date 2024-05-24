@extends('site.app')

@section('title')
{{ __('main.home') }}
@endsection
<!-- ======= Header ======= -->
@include('site.partials.header')
<!-- End Header -->
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Zeus' Facilities</h2>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="facilities" class="facilities my-2" style="padding: 0px">
        <div class="container">
            <div class="row">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach( $data as $info)
                        <div class="slider-item swiper-slide">
                            <div class="slider-image-wrapper">
                                <img class="slider-image" src="{{ asset('uploads/facilities/' . $info->image) }}" alt="SliderImg" />
                            </div>
                            <div class="slider-item-content">
                                <h2>{{$info->title}}</h2>
                                <p>{{$info->pragraph}}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="slider-buttons">
                        <button class="swiper-button-prev">Prev</button>
                        <button class="swiper-button-next">Next</button>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="row counters">
                @foreach($counter as $row)
                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <i class="bx bxs-building bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$row->facilities}}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>facilities</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <i class="bx bxs-leaf bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$row->Porducts}}" data-purecounter-duration="2" class="purecounter"></span>
                    <p>Porducts</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="300">
                    <i class="bx bxs-package bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$row->Produced_Tons_in_2023}}" data-purecounter-duration="3" class="purecounter"></span>
                    <p>Produced Tons in 2023</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="400">
                    <i class="bx bxs-user bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$row->Oustees_Clients}}" data-purecounter-duration="4" class="purecounter"></span>
                    <p>Oustees Clients</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-right">
                    <div class="section-title">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="info mt-4">
                        <i class="bx bx-current-location"></i>
                        <h4>Location:</h4>
                        <p>
                            Block 9, Zone B3, <br />
                            10TH of Ramdan City, EGYPT<br />
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4" data-aos="fade-left">
                    <div class="info">
                        <i class="bx bxs-envelope"></i>
                        <a href="mailto:info@zeus-ex.com">
                            <h4>Email:</h4>
                            <p>info@zeus-ex.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="info w-100 mt-4">
                        <i class="bx bxs-phone-call"></i>
                        <a href="tel:+20111 5522 349">
                            <h4>Call:</h4>
                            <p>(+20) 111 5522 349</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <form action="{{route('news.store')}}" method="post" role="form" class="php-email-form mt-4">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" aria-label="your name" placeholder="Your Name" required />
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" aria-label="your name" placeholder="Your Email" required />
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" aria-label="your name" placeholder="Subject" required />
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>


@include('site.partials.footer')
@endsection