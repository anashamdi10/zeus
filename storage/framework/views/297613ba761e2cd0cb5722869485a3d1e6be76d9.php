

<?php $__env->startSection('title'); ?><?php echo e(__('main.Edit_Slide')); ?>

why shoose us 
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>why shoose us Edit / <?php echo e($info->title); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> why shoose us  </li>
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
                            <form action=<?php echo e(route('why.update',$info->id)); ?> method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="title">Title en </label>
                                            <input class="form-control" value="<?php echo e($info->title); ?>" id="title" type="text" name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="title_ar">Title ar </label>
                                            <input class="form-control" value="<?php echo e($info->title_ar); ?>" id="title_ar" type="text" name="title_ar">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="sub_title">pragraph en </label>
                                            <input class="form-control" value="<?php echo e($info->pragraph_en); ?>" id="pragraph_en" type="text" name="pragraph_en">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="pragraph_ar">pragraph ar </label>
                                            <input class="form-control" value="<?php echo e($info->pragraph_ar); ?>" id="pragraph_ar" type="text" name="pragraph_ar">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <img src="<?php echo e(asset('uploads/why_us/' . $info->image)); ?>" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                    <input id='image' name="image" type="file" class="form-control" >
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
                                    <a href="<?php echo e(route('admin.why')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
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
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/why_shoose_us/edit.blade.php ENDPATH**/ ?>