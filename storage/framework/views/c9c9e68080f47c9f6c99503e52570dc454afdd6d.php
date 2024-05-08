<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="<?php echo e(asset('uploads/products/' . $product->image['full'])); ?>" />

        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate fw-bolder" href="<?php echo e(route('info_product', $product->id)); ?>"><?php echo e($product->name_ar); ?></a>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/site/pages/ar/products_ajax.blade.php ENDPATH**/ ?>