@extends('site.app')

@section('title')
{{ __('main.home') }}
@endsection

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
                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <i class="bx bxs-building bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
                    <p>facilities</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <i class="bx bxs-leaf bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="2" class="purecounter"></span>
                    <p>Porducts</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="300">
                    <i class="bx bxs-package bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="642" data-purecounter-duration="3" class="purecounter"></span>
                    <p>Produced Tons in 2023</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="400">
                    <i class="bx bxs-user bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="4" class="purecounter"></span>
                    <p>Oustees Clients</p>
                </div>
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
                            <a href="404.html" class="more-btn">Contact Us Now <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <img src="{{asset('zeus/assets/img/icons/1.webp')}}" alt="Zeus Orginc Crops" />
                                    <h3>
                                        Orginc<br />
                                        Crops
                                    </h3>
                                    <p>We uses Organic crops from the starts of the Agriulture process as they are the main core of our industry</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <img src="{{asset('zeus/assets/img/icons/2.webp')}}" alt="Zeus Qulity " />
                                    <h3>Qulity is what defines Us</h3>
                                    <p>the Qualkity of the products is what we make our crops Qunic & delicious</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <img src="{{asset('zeus/assets/img/icons/3.webp')}}" alt="Zues specialization" />
                                    <h3>The specialization</h3>
                                    <p>Zeus is consists of kind of specilized teams every team is specilized in one thing to maintain our qulity</p>
                                </div>
                            </div>
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
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/4.webp')}}" alt="Zeus Service Land Reclamation" />
                                </div>
                                <h4>Land Reclamation</h4>
                                <p>Implementing state-of-the-art technology for efficient land reclamation.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/5.webp')}}" alt="Zeus Service  Fertilizer Application" />
                                </div>
                                <h4>Fertilizer Application</h4>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/6.webp')}}" alt="Zeus Service Harvesting " />
                                </div>
                                <h4>Harvesting</h4>
                                <p>Meticulously harvesting fruits in accordance with the highest European quality standards.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/7.webp')}}" alt="Zeus Service Transport to Zeus Facilities " />
                                </div>
                                <h4>Transport to Zeus Facilities</h4>
                                <p>Safely and efficiently transporting the harvested produce to Zeus facilities.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/8.webp')}}" alt="Zeus Service Sorting " />
                                </div>
                                <h4>Sorting services</h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="600">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/9.webp')}}" alt="Zeus Service Packaging " />
                                </div>
                                <h4>Packaging services</h4>
                                <p>Employing advanced packaging techniques to safeguard product integrity.ٍ</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="700">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/10.webp')}}" alt="Zeus Service Storage " />
                                </div>
                                <h4>Storage Stage</h4>
                                <p>Possessing state-of-the-art frozen and refrigerated storage facilities.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="800">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/11.webp')}}" alt="Zeus Service  Logistics " />
                                </div>
                                <h4>Logistics Methods</h4>
                                <p>Utilizing refrigerated trailers for overland transportation.Employing refrigerated and frozen containers for sea transportation</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="900">
                                <div class="icon">
                                    <img src="{{asset('zeus/assets/img/icons/12.webp')}}" alt="Zeus Service Door-to-Door " />
                                </div>
                                <h4>Door-to-Door Service</h4>
                                <p>Providing convenient door-to-door transportation services.</p>
                            </div>
                        </div>
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

                    <p class="text-left"><a href="shop.html" class="btn-get-started scrollto">Explore More</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="404.html">
                        <img src="{{asset('zeus/assets/img/product1.webp')}}" onmouseover="this.src='{{asset("zeus/assets/img/product2.webp")}}'" onmouseout="this.src='{{asset("zeus/assets/img/product1.webp")}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">Noval orange</h3>
                        <strong class="product-price"> Framed in own Farms </strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="404.html">
                        <img src="{{asset('zeus/assets/img/product1.webp')}}" onmouseover="this.src='{{asset("zeus/assets/img/product2.webp")}}'" onmouseout="this.src='{{asset("zeus/assets/img/product1.webp")}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">Noval orange</h3>
                        <strong class="product-price">Framed in own Farms</strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="404.html">
                        <img src="{{asset('zeus/assets/img/product1.webp')}}" onmouseover="this.src='{{asset("zeus/assets/img/product2.webp")}}'" onmouseout="this.src='{{asset("zeus/assets/img/product1.webp")}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title">Noval orange</h3>
                        <strong class="product-price">Framed in own Farms</strong>

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
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url({{asset('zeus/assets/img/blog1.webp')}}) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day">12</span>
                                        <span class="month">Aug</span>
                                        <span class="year">2023</span>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author">Eng Ahmed</span>
                                        <h2 class="title">
                                            <a href="#">The great benefits of Orange in winter</a>
                                        </h2>
                                        <p class="text">The antsy bingers of Netflix will eagerly anticipate the digital release of the Survive soundtrack, out today.</p>
                                        <a href="#" class="button btn-get-started">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
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

@endsection

@push('scripts')
@endpush