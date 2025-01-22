

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

                        <button type="button" class="btn" style="background-color: #4f6f52; color: white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Order Now
                        </button>
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



            <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>

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

<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">

        <div class="modal-content" style="background-color: white !important;">
            <form action=<?php echo e(route('order_create')); ?> method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-6">
                            <label for="product_name"> Product Name : </label>
                            <span><?php echo e($productInfo->name_en); ?></span>
                            <input style="display: none;" value="<?php echo e($productInfo->name_en); ?>" class="form-control" id="product_name" name="product_name">
                        </div>
                        <div class="col-6">
                            <label for="product_name"> Product Code : </label>
                            <span><?php echo e($productInfo->product_code); ?></span>
                            <input style="display: none;" value="<?php echo e($productInfo->product_code); ?>" class="form-control" id="product_code" name="product_code">
                        </div>
                        <div class="col-6" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="product_name" style="margin-top: 5px; margin-bottom: 5px;"> Name : </label>
                            <input class="form-control" style="border: 1px solid black;" id="name" name="name">

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-6" style="margin-top: 10px; margin-bottom: 10px;">
                            <label for="product_name" style="margin-top: 5px; margin-bottom: 5px;"> Email : </label>
                            <input type="email" class="form-control" style="border: 1px solid black;" id="email" name="email">

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-6">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px;"> Mobile : </label>
                            <input type="tel" class="form-control" style="border: 1px solid black;" id="mobile" name="mobile">

                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-6">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px;"> Quantity : </label>
                            <input type="number" class="form-control" style="border: 1px solid black;" id="quantity" name="quantity">
                            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <label for="product_name" style="margin-top: 10px; margin-bottom: 10px;"> Notes : </label>
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
<!-- End Hero -->
<?php echo $__env->make('site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/uldghn4ssl8p/zeus-ex.com/resources/views/site/pages/en/product_en.blade.php ENDPATH**/ ?>