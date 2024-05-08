<?php $__env->startSection('title'); ?>
Sub Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3> Sub Category </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Sub Category </li>
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
                            <form action=<?php echo e(route('categoryterms.store')); ?> method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Category')); ?> </label>
                                    <select name="category_id" id="categories" class="form-control">
                                        <option disabled value=""> <?php echo e(__('main.Select_Category')); ?> </option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Content_En')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e(old('content_en')); ?>" name="content_en">

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Content_Ar')); ?></label>


                                            <input class="form-control" type="text" value="<?php echo e(old('content_ar')); ?>" name="content_ar">
                                        </div>
                                    </div>
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
                                    <a href="<?php echo e(route('category_terms')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/categoryterm/create.blade.php ENDPATH**/ ?>