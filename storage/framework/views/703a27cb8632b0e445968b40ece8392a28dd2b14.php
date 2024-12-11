

<?php $__env->startSection('title'); ?>
<?php echo e(__('main.home')); ?>

<?php $__env->stopSection(); ?>
<!-- ======= Header ======= -->
<?php echo $__env->make('site.partials.header_ar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Header -->
<?php $__env->startSection('content'); ?>


<section id="hero" class="d-flex align-items-center">
    <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <video autoplay muted loop id="myVideo">
        <source src="<?php echo e(asset('uploads/video')); ?>/<?php echo e($row['video']); ?>" type="video/mp4" />
    </video>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="container position-absolute" data-aos="fade-up" data-aos-delay="350">
        <div class="swiper tag" id="tag">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <h2><?php echo e($row['title_ar']); ?></h2>
                    <h4><?php echo e($row['sub_title_ar']); ?></h4>
                    <a href="<?php echo e($row['link']); ?>" class="btn-get-started scrollto">ابدأ</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="200">
                    <img class="about-img" src="<?php echo e(asset('uploads/about/' . $row->image)); ?>" alt="about" />
                </div>
                <div class="col-lg-7 pt-4 pt-lg-0 justify-content-center" data-aos="fade-left" data-aos-delay="100">
                    <h1><?php echo e($row['title_ar']); ?></h1>
                    <p><?php echo e($row['pragraph_ar']); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="row counters">
                <?php $__currentLoopData = $counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <i class="bx bxs-building bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo e($row->facilities); ?>" data-purecounter-duration="1" class="purecounter"></span>
                    <p>مرافق</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <i class="bx bxs-leaf bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo e($row->Porducts); ?>" data-purecounter-duration="2" class="purecounter"></span>
                    <p>منتجات</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="300">
                    <i class="bx bxs-package bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo e($row->Produced_Tons_in_2023); ?>" data-purecounter-duration="3" class="purecounter"></span>
                    <p>إنتاج طن في عام 2023</p>
                </div>

                <div class="col-lg-3 col-6 text-center" data-aos="zoom-in" data-aos-delay="400">
                    <i class="bx bxs-user bx-lg"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo e($row->Oustees_Clients); ?>" data-purecounter-duration="4" class="purecounter"></span>
                    <p>عملاء الغرباء</p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <h3>لماذا تختار زيوس لشحناتك القادمة</h3>

                        <div class="text-center">
                            <a href="404.html" class="more-btn">اتصل بنا الآن <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <?php $__currentLoopData = $why_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

                                <div class="icon-box mt-4 mt-xl-0">
                                    <img src="<?php echo e(asset('uploads/why_us/' . $row->image)); ?>" alt="Zeus Orginc Crops" />
                                    <h3><?php echo e($row->title_ar); ?></h3>
                                    <p><?php echo e($row->pragraph_ar); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                        <h2>خدماتنا</h2>
                        <p>
                            نحن نتجاوز مجرد الخدمات، وننسج سيمفونية من الحلول لمزرعتك. من رعاية التربة إلى حصاد المكافأة، تلعب خبرتنا دورًا
                            لحن متناغم، يزرع الرخاء ويطلق العنان لتطلعاتك الزراعية. انضم إلينا ودعنا نصل بمزرعتك إلى ذروتها!
                        </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <?php $__currentLoopData = $our_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-4 d-flex align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon">
                                    <img src="<?php echo e(asset('uploads/services/' . $row->image)); ?>" alt="Zeus Service Land Reclamation" />
                                </div>
                                <h4><?php echo e($row->title_ar); ?></h4>
                                <p><?php echo e($row->pragraph_ar); ?></p>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h2 class="mb-4 section-title text-center fw-bold text-capitalize">احصل على أفضل منتج لديك</h2>

                    <p class="text-left"><a href="<?php echo e(route('shop_ar')); ?>" class="btn-get-started scrollto">استكشاف المزيد</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="<?php echo e(route('info_product_ar', $products_Featured[0]['id'])); ?>">
                        <img src="<?php echo e(asset('uploads/products/' . $products_Featured[0]['main_image'][0]['full'])); ?>" onmouseover="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[0]['sub_image'][0]['full'] )); ?>'" onmouseout="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[0]['main_image'][0]['full'] )); ?>'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title"><?php echo e($products_Featured[0]['name_ar']); ?></h3>
                        <strong class="product-price"> <?php echo e($products_Featured[0]['sub_title_ar']); ?> </strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="<?php echo e(route('info_product_ar', $products_Featured[1]['id'])); ?>">
                        <img src="<?php echo e(asset('uploads/products/' . $products_Featured[1]['main_image'][0]['full'])); ?>" onmouseover="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[1]['sub_image'][0]['full'] )); ?>'" onmouseout="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[1]['main_image'][0]['full'] )); ?>'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title"><?php echo e($products_Featured[1]['name_ar']); ?></h3>
                        <strong class="product-price"><?php echo e($products_Featured[1]['sub_title_ar']); ?></strong>

                        <span class="icon-cross">
                            <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">
                    <a class="product-item" href="<?php echo e(route('info_product_ar', $products_Featured[2]['id'])); ?>">
                        <img src="<?php echo e(asset('uploads/products/' . $products_Featured[2]['main_image'][0]['full'])); ?>" onmouseover="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[2]['sub_image'][0]['full'] )); ?>'" onmouseout="this.src='<?php echo e(asset("uploads/products/" .$products_Featured[2]['main_image'][0]['full'] )); ?>'" alt="ptoduct-img" class="img-fluid product-thumbnail" />
                        <h3 class="product-title"><?php echo e($products_Featured[2]['name_ar']); ?></h3>
                        <strong class="product-price"><?php echo e($products_Featured[2]['sub_title_ar']); ?></strong>

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
                        انضم إلى عائلة زيوس الآن
                        <br />
                        قم بتصدير منتجاتك معنا
                    </h3>
                    <a href="#contact" class="btn-get-started scrollto">تواصل معنا الآن </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <section class="Blog-section py-lg-5">
        <div class="container">
            <div class="section-title" data-aos="fade-right">
                <h2>أخبارنا </h2>
            </div>
            <div class="swiper blogger">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php $__currentLoopData = $our_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="example-2 card">
                            <div class="wrapper" style="background: url(<?php echo e(asset('uploads/news/' . $row->image)); ?>) center/cover no-repeat">
                                <div class="header">
                                    <div class="date">
                                        <span class="day"><?php echo e($row->date); ?></span>

                                    </div>
                                </div>
                                <div class="data">
                                    <div class="content">
                                        <span class="author"><?php echo e($row->writer_ar); ?></span>
                                        <h2 class="title">
                                            <a href="#"><?php echo e($row->title_ar); ?></a>
                                        </h2>
                                        <p class="text"><?php echo e($row->pragraph_ar); ?></p>
                                        <a href="#" class="button btn-get-started">اقرأ أكثر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                        <h2>اتصال</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="info mt-4">
                        <i class="bx bx-current-location"></i>
                        <h4> :موقع</h4>
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
                            <h4> : البريد الاكتروني </h4>
                            <p>info@zeus-ex.com</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="info w-100 mt-4">
                        <i class="bx bxs-phone-call"></i>
                        <a href="tel:+20111 5522 349">
                            <h4> : اتصال</h4>
                            <p>(+20) 111 5522 349</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <form action="<?php echo e(route('contact_us')); ?>" method="post" role="form" class="php-email-form mt-4">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" aria-label="your name" placeholder="الاسم " required />
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" aria-label="your name" placeholder=" البريد الالكتروني " required />
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" aria-label="your name" placeholder="الموضوع " required />
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="الرسالة" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">ارسال الرسالة</button></div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>

<?php echo $__env->make('site.partials.footer_ar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/site/pages/ar/index_ar.blade.php ENDPATH**/ ?>