<label class="col-form-label pt-0" for="name_en"> Sub Category</label>
<select class="form-control " name="category_term" id="category_term">
    <option disabled> اختر القسم</option>
    <?php $__currentLoopData = $categoryterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryterm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($categoryterm->id); ?>"><?php echo e($categoryterm->content_en); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/product/category_term_ajax.blade.php ENDPATH**/ ?>