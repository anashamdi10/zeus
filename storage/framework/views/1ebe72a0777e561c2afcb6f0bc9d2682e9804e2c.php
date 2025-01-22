

<?php $__env->startSection('title'); ?><?php echo e(__('main.Edit_Category')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>  <?php echo e(__('main.Edit_Category')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">  <?php echo e(__('main.Edit_Category')); ?></li>
        <?php $__env->slot('breadcrumb_icon'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <form action=<?php echo e(route('categories.update',$info->id)); ?> method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <div class="row">
                
                
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Name_En')); ?></label>
                                <input class="form-control" value="<?php echo e($info->name_en); ?>" id="name_en" type="text"  name="name_en">
                            </div>
    
                            <div class="mb-3  ibox-content no-padding">
                                <label class="col-form-label pt-0" for="name_en">  <?php echo e(__('main.Desc_En')); ?></label>
                                <textarea class="ckeditor form-control" rows="4" name="description_en">
                                    <?php echo e($info->description_en); ?>

                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Category')); ?></label>
                        <select name="parent_id" id="categories" class="form-control" >
                            <option disabled> اختر القسم</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e(($category->id ==$info->parent_id)? "selected":""); ?>><?php echo e($category->name_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>


                    <?php if(count($errors) > 0): ?>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mb-3"><div class="alert alert-danger outline"><?php echo e($error); ?></div></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success outline"><?php echo e(Session::get('success')); ?></div>
                    <?php endif; ?>

                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('main.Submit')); ?></button>
                        <a href="<?php echo e(route('categories')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
                    </div>
                </div>
            </div>
        </form>  
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>