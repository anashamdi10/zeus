<select class="form-control " name="category_term" id="category_term">
    <option disabled> اختر القسم</option>
    <?php $__currentLoopData = $categoryterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryterm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($categoryterm->id); ?>"><?php echo e($categoryterm->content_en); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/product/category_term_ajax.blade.php ENDPATH**/ ?>