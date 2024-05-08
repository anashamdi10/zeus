

<?php $__env->startSection('title'); ?>
<?php echo e(__('main.home')); ?>

<?php $__env->stopSection(); ?>
<!-- ======= Header ======= -->
<?php echo $__env->make('site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Header -->
<?php $__env->startSection('content'); ?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2><?php echo e($productInfo->name_en); ?></h2>
                <ol>
                    <li><?php echo e($category_name); ?></li>
                    <li><?php echo e($category_term); ?></li>
                    <li><?php echo e($productInfo->name_en); ?></li>
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
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <img src="<?php echo e(asset('uploads/products/' . $image->full)); ?>" alt="product name - categery " />
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: <?php echo e($category_name); ?></li>
                            <li><strong>harvest Sessions </strong>: <?php echo e($productInfo->harvest_sessions); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <div class="portfolio-description">
                    <p>
                        <?php echo $productInfo->description_en; ?>

                    </p>
                </div>
            </div>
            <div class="row gy-4">
                <div class="product-section">
                    <div class="container">
                        <div class="section-title" data-aos="fade-right">
                            <h2>Related Products</h2>
                        </div>
                        <div class="row">
                        
                            

                            <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" data-aos="fade-left">

                                <a class="product-item" href="<?php echo e(route('info_product', $product['id'])); ?>">
                                    <img src="<?php echo e(asset('uploads/products/' . $product['main_image'][0]['full'])); ?>" onmouseover="this.src='<?php echo e(asset("uploads/products/" .$product['sub_image'][0]['full'] )); ?>'" onmouseout="this.src='<?php echo e(asset("uploads/products/" .$product['main_image'][0]['full'] )); ?>'" alt="ptoduct-img" class="img-fluid product-thumbnail" />

                                    <h3 class="product-title"><?php echo e($product->name_en); ?></h3>
                                    <strong class="product-price"><?php echo e($product->sub_title); ?></strong>

                                    <span class="icon-cross">
                                        <i class="bx bxs-right-top-arrow-circle bx-md bx-tada-hover"></i>
                                    </span>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->
</main>
<!-- End Hero -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/site/pages/product_en.blade.php ENDPATH**/ ?>