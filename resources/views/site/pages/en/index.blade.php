@extends('site.app')

@section('title')
{{ __('main.home') }}
@endsection
<!-- ======= Header ======= -->
@include('site.partials.header')
<!-- End Header -->
@section('content')

<section id="hero" class="d-flex align-items-center">
    @foreach($videos as $row)
    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('uploads/video')}}/{{$row['video']}}" type="video/mp4" />
    </video>
    @endforeach
    <div class="container position-absolute" data-aos="fade-up" data-aos-delay="350">
        <div class="swiper tag" id="tag">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                @foreach($sliders as $row)
                <div class="swiper-slide">
                    <h2>{{$row['title']}}</h2>
                    <h4>{{$row['sub_title']}}</h4>
                    <a href="{{$row['link']}}" class="btn-get-started scrollto">Get Started</a>
                </div>
                @endforeach

            </div>
        </div>
        <!-- If we need pagination -->
        <div class="news-slider__pagination"></div>

        <!-- If we need navigation buttons -->

        <div class="news-slider__arrows">
            <button class="news-slider__arrow news-slider-prev">
                <i class="bx bxs-chevrons-left bx-md bx-tada-hover"></i>
            </button>
            <button class="news-slider__arrow news-slider-next">
                <i class="bx bxs-chevrons-right bx-md bx-tada-hover"></i>
            </button>
        </div>
    </div>
</section>
<!-- End Hero -->
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                @foreach($abouts as $row)
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                    <img class="about-img" src="{{ asset('uploads/about/' . $row->image) }}" alt="about" />
                </div>
                <div class="col-lg-7 pt-4 pt-lg-0 justify-content-center" data-aos="fade-left" data-aos-delay="100">
                    <h1>{{$row['title']}}</h1>
                    <p>{{$row['pragraph']}}</p>
                </div>
                @endforeach
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

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                        <h3>Why Choose Zeus for your next shipments</h3>

                        <div class="text-center">
                            <a href="#" class="more-btn">Contact Us Now <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            @foreach($why_us as $row)
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

                                <div class="icon-box mt-4 mt-xl-0">
                                    <img src="{{ asset('uploads/why_us/' . $row->image) }}" alt="Zeus Orginc Crops" />
                                    <h3>{{$row->title}}</h3>
                                    <p>{{$row->pragraph_en}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-title" data-aos="fade-right">
                        <h2>Our Services</h2>
                        <p>
                            We transcend mere services, weaving a symphony of solutions for your farm. From nurturing soil to harvesting the bounty, our expertise plays
                            a harmonious tune, cultivating prosperity and unlocking your agricultural aspirations. Join us and let's bring your farm to its crescendo!
                        </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($our_services as $row)

                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon">
                                    <img src="{{ asset('uploads/services/' . $row->image) }}" alt="Zeus Service Land Reclamation" />
                                </div>
                                <h4>{{$row->title_en}}</h4>
                                <p>{{$row->pragraph_en}}</p>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="mb-4 section-title text-center fw-bold text-capitalize">Get your finest Product</h2>

                    <p class="text-left"><a href="{{route('shop_en')}}" class="btn-get-started scrollto">Explore More</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">

                    <a class="product-item" href="{{ route('info_product', $products_Featured[0]['id']) }}">
                        <img src="{{ asset('uploads/products/' . $products_Featured[0]['main_image'][0]['full']) }}" onmouseover="this.src='{{asset("uploads/products/" .$products_Featured[0]['sub_image'][0]['full'] )}}'" onmouseout="this.src='{{asset("uploads/products/" .$products_Featured[0]['main_image'][0]['full'] )}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">{{$products_Featured[0]['name_en']}}</h3>
                        <strong class="product-price"> {{$products_Featured[0]['sub_title']}} </strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="{{ route('info_product', $products_Featured[1]['id']) }}">
                        <img src="{{ asset('uploads/products/' . $products_Featured[1]['main_image'][0]['full']) }}" onmouseover="this.src='{{asset("uploads/products/" .$products_Featured[1]['sub_image'][0]['full'] )}}'" onmouseout="this.src='{{asset("uploads/products/" .$products_Featured[1]['main_image'][0]['full'] )}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">{{$products_Featured[1]['name_en']}}</h3>
                        <strong class="product-price">{{$products_Featured[1]['sub_title']}}</strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="{{ route('info_product', $products_Featured[2]['id']) }}">
                        <img src="{{ asset('uploads/products/' . $products_Featured[2]['main_image'][0]['full']) }}" onmouseover="this.src='{{asset("uploads/products/" .$products_Featured[2]['sub_image'][0]['full'] )}}'" onmouseout="this.src='{{asset("uploads/products/" .$products_Featured[2]['main_image'][0]['full'] )}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">{{$products_Featured[2]['name_en']}}</h3>
                        <strong class="product-price">{{$products_Featured[2]['sub_title']}}</strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- ======= Counts Section ======= -->
    <section id="join" class="join">
        <div class="container">
            <div class="row counters">
                <div class="col-lg-12 text-center" data-aos="fade-up">
                    <h3>
                        Join our Zeus' family Now
                        <br />
                        Export your Products With us
                    </h3>
                    <a href="#contact" class="btn-get-started scrollto">Get In Touch Now </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <section class="Blog-section py-lg-5">
        <div class="container">
            <div class="section-title" data-aos="fade-right">
                <h2>Our News</h2>
            </div>
            <div class="swiper blogger">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($our_news as $row)

                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('uploads/news/' . $row->image)}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">{{ $row->date}}</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">{{ $row->writer_en}}</span>
                                        <h2 class="title">
                                            <a href="#">{{$row->title_en}}</a>
                                        </h2>
                                        <p class="text">{{$row->pragraph_en}}</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="news-slider__pagination"></div>
            </div>
        </div>
    </section>

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
                <form action="{{route('contact_us')}}" method="post" role="form" class="php-email-form mt-4">
                {{csrf_field()}}
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

                @if(Session::has('success'))
                    <div class="alert alert-info outline" style="background-color: #9FA6B2; color: white; text-align: center;">{{Session::get('success')}}</div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>
@include('site.partials.footer')
@endsection

