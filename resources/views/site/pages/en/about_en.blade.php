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
                <h2>About Zeus</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About Zeus</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                    <img class="about-img" src="{{ asset('uploads/about/' . $data->image) }}" alt="about" />
                </div>
                <div class="col-lg-7 pt-4 pt-lg-0 justify-content-center" data-aos="fade-left" data-aos-delay="100">
                    <h1>{{$data->title}}</h1>
                    <p>{{$data->pragraph}}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="section-title" data-aos="fade-right">
                    <h2>Our certificates</h2>
                    <p>
                        {{$data->title_certificates}}
                    </p>
                </div>
            </div>
        </div>
        <div class="swiper swi">
            <div class="swiper-wrapper">
                <!-- ======= Slide  Section ======= -->

                @foreach( $certificates as $index => $info)
                <div class="swiper-slide" style="
								background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
									url('{{ asset('uploads/certificates/' . $info->image) }}') no-repeat 50% 50% / cover;">
                    <div>
                        <h2>{{$info->title}}</h2>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            {{$info->city}}
                        </p>
                    </div>
                </div>

                @endforeach
                <!-- ======= Slide  Section ======= -->

            </div>
            <!-- Add Pagination -->
            <!-- If we need pagination -->
            <div class="news-slider__pagination"></div>
        </div>
    </section>
    <!-- End Clients Section -->

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