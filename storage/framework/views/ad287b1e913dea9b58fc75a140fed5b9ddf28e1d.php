

<?php $__env->startSection('title'); ?>إضافة منتج
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3> Add Product </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Add Product</li>
<?php $__env->slot('breadcrumb_icon'); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" id="ajax_subcategory" value="<?php echo e(route('admin.sub_category')); ?>">
<div class="container-fluid">
    <form action=<?php echo e(route('products.store')); ?> method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en">Product Name En</label>
                            <input class="form-control" id="name_en" name="name_en" type="text">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_en"> Description Product En </label>
                            <textarea class="ckeditor form-control" rows="4" name="description_en">
                            <?php echo e(old('description')); ?>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_ar">Product Name Ar</label>
                            <input class="form-control" id="name_ar" name="name_ar">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_ar"> Description Product Ar </label>
                            <textarea class="ckeditor form-control" rows="4" name="description_ar">
                            <?php echo e(old('description')); ?>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">


                <div class="row mb-4">
                    <h5 class="mb-4">Main Information</h5>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title </label>
                        <input class="form-control" id="sub_title" name="sub_title">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title Ar </label>
                        <input class="form-control" id="sub_title_ar" name="sub_title_ar">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> product Code </label>
                        <input class="form-control" id="product_code" name="product_code">
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Category</label>
                        <select name="category_id" id="category_id" class="form-control ">
                            <option disabled selected>Choose</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" id="category"><?php echo e($category->name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3" id='category_term'>
                        <label class="col-form-label pt-0" for="name_en"> Sub Category</label>
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Special</label>
                        <select name="featured" id="featured" class="form-control">
                            <option value="" disabled selected> Choose</option>
                            <option value="1"> Yes </option>
                            <option value="0"> Noا </option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions en </label>
                        <input class="form-control" id="harvest_sessions" name="harvest_sessions" type="text">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions ar </label>
                        <input class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text">
                    </div>
                </div>

                <h5 class="mb-4"> Product Pictures</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="main_image"> Main Picture </label>
                        <input class="form-control" id="main_full" name="main_full" type="file">
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="sub_main"> Sub Main Picture </label>
                        <input class="form-control" id="sub_main" name="sub_main" type="file">
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Product Pictures </label>
                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file">
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
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo e(route('admin.products')); ?>" class="btn btn-danger"><?php echo e(__('main.Cancel')); ?></a>
            </div>
        </div>
</div>
</form>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#category_id', function(e) {
            var token = $("#token_search").val();
            var url = $("#ajax_subcategory").val();
            var category_id = $("#category_id").val();

            jQuery.ajax({
                url: url,
                type: "post",
                dataType: "html",
                cache: false,
                data: {
                    '_token': token,
                    category_id: category_id,

                },
                success: function(data) {
                    $("#category_term").html(data);
                },
                error: function() {
                    alert("error in add_item");
                },
            });
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/product/create.blade.php ENDPATH**/ ?>