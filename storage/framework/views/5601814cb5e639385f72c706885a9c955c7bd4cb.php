

<?php $__env->startSection('title'); ?><?php echo e(__('main.Create_Slide')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3><?php echo e(__('main.Create_Slide')); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> <?php echo e(__('main.Create_Slide')); ?> </li>
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
                            <form action=<?php echo e(route('slides.store')); ?> method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="title">Title </label>
                                        <input class="form-control" id="title" type="text" name="title">
                                    </div>
                                    <div class="col-md-6 mb-3 " style="text-align: right;">
                                        <label class="col-form-label pt-0" for="title_ar">العنوان </label>
                                        <input class="form-control" id="title_ar" type="text" name="title_ar">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="sub_title">Sub Title </label>
                                        <input class="form-control" id="sub_title" type="text" name="sub_title">
                                    </div>
                                    <div class="col-md-6 mb-3 " style="text-align: right;">
                                        <label class="col-form-label pt-0" for="title_ar">العنوان الفرعي </label>
                                        <input class="form-control" id="sub_title_ar" type="text" name="sub_title_ar">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Link </label>
                                    <input class="form-control" id="link" type="text" name="link">
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
                                    <a href="<?php echo e(route('admin.slides')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/slide/create.blade.php ENDPATH**/ ?>