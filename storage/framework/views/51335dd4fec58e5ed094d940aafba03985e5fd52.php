



<?php $__env->startSection('title'); ?> <?php echo e(__('main.Orders')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('breadcrumb_title'); ?>
    <h3> Order Information </h3>
    <?php $__env->endSlot(); ?>
    <li class="breadcrumb-item"> <?php echo e(__('main.Order_Details')); ?></li>
    <?php echo $__env->renderComponent(); ?>



    <div class="row mb-4">



        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="sub_title"> Product Code </label>
            <input readonly class="form-control" id="sub_title" name="sub_title" value="<?php echo e($info->product_code); ?>">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="sub_title"> Product Name </label>
            <input readonly class="form-control" id="sub_title_ar" name="sub_title_ar" value="<?php echo e($info->product_name); ?>">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="name_en"> Name </label>
            <input readonly class="form-control" id="product_code" name="product_code" value="<?php echo e($info->name); ?>">
        </div>








        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> Email </label>
            <input readonly class="form-control" id="harvest_sessions" name="harvest_sessions" type="text" value="<?php echo e($info->email); ?>">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> Mobile </label>
            <input readonly class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="<?php echo e($info->mobile); ?>">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> quantity </label>
            <input readonly class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="<?php echo e($info->quantity); ?>">
        </div>
        <div class="form-group mb-3 col-12">
            <label class="col-form-label pt-0" for="harvest_sessions"> Notes </label>
            <textarea readonly class="form-control"> <?php echo e($info->notes); ?></textarea>
        </div>
    </div>




</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/order/show.blade.php ENDPATH**/ ?>