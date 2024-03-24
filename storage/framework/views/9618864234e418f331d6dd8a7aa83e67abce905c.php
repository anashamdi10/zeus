

<?php $__env->startSection('title'); ?><?php echo e(__('main.Create_Rabid_Offers')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3> <?php echo e(__('main.Create_Rabid_Offers')); ?></h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> <?php echo e(__('main.Create_Rabid_Offers')); ?></li>
<?php $__env->slot('breadcrumb_icon'); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action=<?php echo e(route('flash.deals.store')); ?> method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <!--<div class="form-group mb-3">-->
                                <!--    <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Product')); ?></label>-->
                                <!--    <select name="product_id" id="categories" class="form-control" >-->
                                <!--        <option disabled>  <?php echo e(__('main.Select_Product')); ?></option>-->
                                <!--        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                <!--            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name_ar); ?></option>-->
                                <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                <!--    </select>-->
                                <!--</div>-->





                                <div class="opt-tab" id="productTab">
                                    <label for="product" class="col-form-label">Choose Product </label>
                                    <select class="form-select" name="product_id" id="product">
                                        <option value="" disabled selected>Select Product</option>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">Title</label>
                                    <input class="form-control" id="title" name="title">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">pragraph</label>
                                    <input class="form-control" id="pragraph" name="pragraph">
                                </div>


                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_ar"><?php echo e(__('main.Discount')); ?> </label>
                                    <input class="form-control" id="name_ar" type="text" name="sale_price">
                                </div>

                                <div class="row">

                                    <div class="col-6">

                                        <label class="col-form-label pt-0" for="name_ar">Date and time </label>
                                        <input type="datetime-local" id="date_time" name="date_time">

                                    </div>
                                    <div class="col-6">
                                        <label class="col-form-label pt-0"><?php echo e(__('main.Status')); ?> </label>
                                        <label class="d-block" for="flexRadioDefault1">
                                            <input class="radio_animated" id="flexRadioDefault1" type="radio" value="1" name="status" id="flexRadioDefault1"><?php echo e(__('main.Active')); ?>

                                        </label>

                                        <label class="d-block" for="flexRadioDefault2">
                                            <input class="radio_animated" id="flexRadioDefault2" type="radio" value="0" name="status" id="flexRadioDefault2"><?php echo e(__('main.Not_Active')); ?>

                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="main_image"> Main Picture </label>
                                    <input class="form-control" id="image" name="image" type="file">
                                </div>




                                <?php if(count($errors) > 0): ?>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-3">
                                        <div class="alert alert-danger outline"><?php echo e($error); ?></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>

                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success outline"><?php echo e(Session::get('success')); ?></div>
                                <?php endif; ?>

                                <div class="d-flex align-items-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('main.Submit')); ?></button>
                                    <a href="<?php echo e(route('flash.deals.index')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    <?php $__env->startPush('scripts'); ?>
    <script>
        $(".offerRad").on('change', function() {
            $(".offerRad").siblings("label").addClass("btn-light").removeClass("btn-secondary");
             
            let checkedTarget = $(this).attr("data-bs-target");
             
            if($(this).is(':checked')) {
      	        $(this).siblings("label").removeClass("btn-light").addClass("btn-secondary");
      	        $("#optTabs .opt-tab").hide();
                $("#optTabs").find(`#${checkedTarget}`).show();
            }
        })
    </script>
    <?php $__env->stopPush(); ?> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\.well-known_2\resources\views/admin/flash-deal/create.blade.php ENDPATH**/ ?>