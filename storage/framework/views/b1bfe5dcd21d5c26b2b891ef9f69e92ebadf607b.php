

<?php $__env->startSection('title'); ?><?php echo e(__('main.Create_New_Category')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('main.Create_New_Category')); ?>  </h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><?php echo e(__('main.Create_New_Category')); ?>  </li>
        <?php $__env->slot('breadcrumb_icon'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <form action=<?php echo e(route('categories.store')); ?> method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

            <div class="row">
                
                
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Name_En')); ?> </label>
                                <input class="form-control" id="name_en" rows="4"  name="name_en">
                            </div>
    
                            <div class="form-group mb-3 ibox-content no-padding">
                                <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Desc_En')); ?> </label>
                                <textarea class="ckeditor form-control" cols="10" rows="10" name="description_en">
                                    <?php echo e(old('description')); ?>

                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Category')); ?> </label>
                        <select name="parent_id" id="categories" class="form-control" >
                            <option disabled selected value=""> <?php echo e(__('main.Select_Category')); ?> </option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Sort')); ?></label>
                        <input class="form-control" id="name_en"   name="sort">
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="image"><?php echo e(__('main.Image')); ?> </label>
                        <input class="form-control" id="image" name="image" type="file">
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
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\.well-known_2\resources\views/admin/category/create.blade.php ENDPATH**/ ?>