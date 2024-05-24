<?php $__env->startSection('title'); ?> <?php echo e(__('main.Settings')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3> <?php echo e(__('main.General_Settings')); ?> </h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">   <?php echo e(__('main.General_Settings')); ?></li>
        <?php $__env->slot('breadcrumb_icon'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <?php if(count($errors) > 0): ?>

                                    <div class="alert alert-danger">

                                        <ul>

                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <li><?php echo e($error); ?></li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>

                                    </div>

                                <?php endif; ?>

                                <?php if(Session::has('success')): ?>

                                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>

                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <form action=<?php echo e(route('setting.update')); ?> method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('PUT')); ?>

                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar"> <?php echo e(__('main.Name_Ar')); ?> </label>
                                        <input class="form-control" value="<?php echo e($info->name_ar); ?>" id="name_ar" type="text"  name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  <?php echo e(__('main.Name_En')); ?>  </label>
                                        <input class="form-control" value="<?php echo e($info->name_en); ?>" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  <?php echo e(__('main.Desc_Ar')); ?> </label>
                                        <textarea class="form-control"  id="name_en"   name="description_ar"><?php echo e($info->description_ar); ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  <?php echo e(__('main.Desc_En')); ?> </label>
                                        <textarea class="form-control"  id="name_en"   name="description_en"><?php echo e($info->description_en); ?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Image')); ?> </label>
                                        <input class="form-control"  id="name_en" type="file"  name="logo">
                                        <img src="<?php echo e($info->logo); ?>" width="50" height="50">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('main.Submit')); ?></button>
                                </form>                            </div>
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


<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>