

<?php $__env->startSection('title'); ?>
<?php echo e(__('main.home')); ?>

<?php $__env->stopSection(); ?>
<!-- ======= Header ======= -->
<?php echo $__env->make('site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Header -->
<?php $__env->startSection('content'); ?>
<input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" id="ajax_subcategory" value="<?php echo e(route('sub_category_search')); ?>">
<input type="hidden" id="ajax_product" value="<?php echo e(route('product_search')); ?>">
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
    <!-- Shop Start -->
    <section style="background-color: #fcfbfb">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <!-- Shop Sidebar Start -->
                <div class="col-lg-3 col-md-4">
                    <!-- Price Start -->
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="pr-3">Filter by Category</span>
                    </h5>
                    <div class="px-4 mb-30">

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" id="category" name="category" value="code">
                            <label class="custom-control-label" for="category-1">All </label>
                        </div>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input id="category" type="radio" name="category" value="<?php echo e($category->id); ?>">
                            <label class="custom-control-label" for="category-2"><?php echo e($category->name_en); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <!-- Price End -->

                    <!-- Color Start -->

                    <div class="bg-light p-4 mb-30" id='category_term'>

                    </div>

                </div>
                <!-- Shop Sidebar End -->

                <!-- Shop Product Start -->
                <div class="col-lg-9 col-md-8">
                    <div class="row pb-3" id='search_product'>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?php echo e(asset('uploads/products/' . $product->image['full'])); ?>" />

                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate fw-bolder" href="<?php echo e(route('info_product', $product->id)); ?>"><?php echo e($product->name_en); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <!-- Shop Product End -->
            </div>
        </div>
    </section>
    <!-- Shop End -->
</main>
<!-- End Hero -->


<?php echo $__env->make('site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        $(document).on('change', '#category', function(e) {

            var token = $("#token_search").val();
            var url = $("#ajax_subcategory").val();
            var url2 = $("#ajax_product").val();
            var category_id = $("input[type=radio][ name=category]:checked").val();
            if (category_id == 'code') {
                jQuery.ajax({
                    url: url2,
                    type: "post",
                    dataType: "html",
                    cache: false,
                    data: {
                        '_token': token,
                        category_id: category_id,


                    },
                    success: function(data) {
                        $("#search_product").html(data);
                        $("#category_term").hide();
                    },
                    error: function() {
                        alert("error in search_product");
                    },
                });

            } else {
                jQuery.ajax({
                    url: url,
                    type: "post",
                    dataType: "html",
                    cache: false,
                    data: {
                        '_token': token,
                        category_id: category_id,

                    },
                    success: function(data) {

                        $("#category_term").show();
                        $("#category_term").html(data);
                    },
                    error: function() {
                        alert("error in add_item");
                    },
                });

            }
        })
        $(document).on('change', '#categoryterm', function(e) {

            var token = $("#token_search").val();
            var url = $("#ajax_product").val();
            var category_id = $("input[type=radio][ name=category]:checked").val();
            var category_term = $("input[type=radio][ name=categoryterm]:checked").val();




            jQuery.ajax({
                url: url,
                type: "post",
                dataType: "html",
                cache: false,
                data: {
                    '_token': token,
                    category_id: category_id,
                    category_term: category_term,

                },
                success: function(data) {
                    $("#search_product").html(data);
                },
                error: function() {
                    alert("error in search_product");
                },
            });
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/site/pages/en/shop_en.blade.php ENDPATH**/ ?>