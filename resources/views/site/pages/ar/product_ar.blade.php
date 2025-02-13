@extends('site.app')

@section('title')
{{ __('main.home') }}
@endsection
<!-- ======= Header ======= -->
@include('site.partials.header_ar')
<!-- End Header -->
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$productInfo->name_ar}}</h2>
                <ol>
                    <li>{{$category_name}}</li>
                    <li>{{$category_term}}</li>
                    <li>{{$productInfo->name_ar}}</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach( $images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('uploads/products/' . $image->full) }}" alt="product name - categery " />
                            </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>معلومات المشروع</h3>
                        <ul>
                            <li><strong>فئة</strong>: {{$category_name}}</li>
                            <li><strong>جلسات الحصاد </strong>: {{$productInfo->harvest_sessions}}</li>
                        </ul>

                        <button type="button" class="btn" style="background-color: #4f6f52; color: white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            إطلب الان
                        </button>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="portfolio-description">
                    <p>
                        {!! $productInfo->description_ar !!}
                    </p>
                </div>
            </div>
            <div class="row gy-4">
                <div class="product-section">
                    <div class="container">
                        <div class="section-title" data-aos="fade-right">
                            <h2>منتجات ذات صله </h2>
                        </div>
                        <div class="row">



                            @foreach($related_products as $idx => $product )
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">

                                <a class="product-item" href="{{ route('info_product', $product['id']) }}">
                                    <img src="{{ asset('uploads/products/' . $product['main_image'][0]['full']) }}" onmouseover="this.src='{{asset("uploads/products/" .$product['sub_image'][0]['full'] )}}'" onmouseout="this.src='{{asset("uploads/products/" .$product['main_image'][0]['full'] )}}'" alt="ptoduct-img" class="img-fluid product-thumbnail" />

                                    <h3 class="product-title">{{$product->name_ar}}</h3>
                                    <strong class="product-price">{{$product->sub_title_ar}}</strong>

                                    <span class="icon-cross">
                                        <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                                    </span>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->
</main>
<!-- End Hero -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">

        <div class="modal-content" style="background-color: white !important;">
            <form action={{route('order_create')}} method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-6" style="text-align: right">
                            <span>{{$productInfo->product_code}}</span>
                            <label for="product_name"> : كود المنتج </label>
                            <input style="display: none;" value="{{$productInfo->product_code}}" class="form-control" id="product_code" name="product_code">
                        </div>
                        <div class="col-6" style="text-align: right">
                            <span>{{$productInfo->name_ar}}</span>
                            <label for="product_name"> : اسم المنتج </label>
                            <input style="display: none;" value="{{$productInfo->name_ar}}" class="form-control" id="product_name" name="product_name">
                        </div>

                        <div class="col-6" style="margin-top: 10px; margin-bottom: 10px;text-align: right">
                            <label for="product_name" style="margin-top: 5px; margin-bottom: 5px;"> : البريد الإلكتروني </label>
                            <input type="email" class="form-control" style="border: 1px solid black;" id="email" name="email">

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6" style="margin-top: 10px; margin-bottom: 10px;text-align: right">
                            <label for="product_name" style="margin-top: 5px; margin-bottom: 5px; "> : الاسم </label>
                            <input class="form-control" style="border: 1px solid black;" id="name" name="name">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6" style="text-align: right">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px;"> : الكمية </label>
                            <input type="number" class="form-control" style="border: 1px solid black;" id="quantity" name="quantity">
                            @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6" style="text-align: right">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px"> : الجوال </label>
                            <input type="tel" class="form-control" style="border: 1px solid black;" id="mobile" name="mobile">

                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12" style="text-align: right">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px;text-align: right;"> : ملاحظات </label>
                            <textarea class="form-control" id="notes" style="border: 1px solid black;" name="notes"></textarea>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button typbuttone="submit" class="btn " style="background-color: #4f6f52; color: white;">Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('site.partials.footer_ar')


@endsection