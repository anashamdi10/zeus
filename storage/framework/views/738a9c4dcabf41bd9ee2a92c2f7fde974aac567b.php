<h5 class="section-title position-relative text-uppercase mb-3">
    <span class="pr-3">Filter by Sub Category</span>
</h5>

<?php $__currentLoopData = $categoryterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryterm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
    <input id="categoryterm" type="radio" name="categoryterm" value="<?php echo e($categoryterm->id); ?>">
    <label class="custom-control-label" for="category-2"><?php echo e($categoryterm->content_en); ?></label>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/site/pages/en/category_term_ajax.blade.php ENDPATH**/ ?>