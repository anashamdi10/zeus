

<?php $__env->startSection('title'); ?><?php echo e(__('main.Edit_Product')); ?> -
<?php echo e($settings->name_ar); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3> <?php echo e(__('main.Edit_Product')); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> <?php echo e(__('main.Edit_Product')); ?></li>
<?php $__env->slot('breadcrumb_icon'); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">
<input type="hidden" id="ajax_subcategory" value="<?php echo e(route('admin.sub_category')); ?>">

<div class="container-fluid">
    <form action=<?php echo e(route('products.update',$info->id)); ?> method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Name_En')); ?></label>
                            <input class="form-control" id="name_en" value="<?php echo e($info->name_en); ?>" name="name_en">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Desc_En')); ?></label>
                            <textarea class="ckeditor form-control" rows="3" name="description_en">
                            <?php echo e($info->description_en); ?>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en">Product Name Ar</label>
                            <input class="form-control" id="name_ar" name="name_ar" value="<?php echo e($info->name_ar); ?>">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_ar"> Description Product Ar </label>
                            <textarea class="ckeditor form-control" rows="4" name="description_ar">
                            <?php echo e($info->description_ar); ?>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- <div class="row mb-4"> -->


                <!-- <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Code')); ?></label>
                        <input class="form-control" id="name_en" value="<?php echo e($info->product_code); ?>" name="product_code" value="<?php echo e($info->product_code); ?>">
                    </div> -->

                <!-- <div class="form-group mb-3 col-4">
                                <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Quantity')); ?></label>
                                <input class="form-control" id="name_en" rows="4"  name="quantity" value="<?php echo e($info->quantity); ?>">
                            </div>
                            
                            <div class="form-group mb-3 col-4">
                                <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Point')); ?></label>
                                <input class="form-control" id="name_en" rows="4" type="number"  name="point" value="<?php echo e($info->point); ?>">
                            </div> -->
                <!-- </div> -->

                <!-- 
                <div class="row mb-4">
                    <h5 class="mb-4">سعر المنتج</h5>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Shipping_Cost')); ?></label>
                        <input class="form-control" id="name_en" type="number" Min="0" Step="any" name="pos_price" value="<?php echo e($info->pos_price); ?>">
                    </div>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Selling_Price')); ?></label>
                        <input class="form-control" id="name_en" rows="4" type="number" Min="0" Step="any" name="price" value="<?php echo e($info->price); ?>">
                    </div>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Discount_Price')); ?></label>
                        <input class="form-control" id="name_en" type="number" Min="0" Step="any" name="sale_price" value="<?php echo e($info->sale_price); ?>">
                    </div>
                </div> -->

                <div class="row mb-4">
                    <h5 class="mb-4">Main Information </h5>

                    <!-- <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"><?php echo e(__('main.Brand')); ?></label>
                        <select name="brand_id" id="categories" class="form-control">
                            <option disabled> <?php echo e(__('main.Select_Brand')); ?></option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>" <?php echo e(($brand->id == $info->brand_id)?"selected":""); ?>><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div> -->
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title </label>
                        <input class="form-control" id="sub_title" name="sub_title" value="<?php echo e($info->sub_title); ?>">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title Ar </label>
                        <input class="form-control" id="sub_title_ar" name="sub_title_ar" value="<?php echo e($info->sub_title_ar); ?>">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Product Code </label>
                        <input class="form-control" id="product_code" name="product_code" value="<?php echo e($info->product_code); ?>">
                    </div>



                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Category')); ?></label>
                        <select name="category_id" id="category_id" class="form-control ">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($info->category_id == $category->id ? 'selected': ''); ?>><?php echo e($category->name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3" id='category_term'>
                        <label class="col-form-label pt-0" for="name_en"> Sub Category</label>
                        <select name="category_term" id="category_term" class="form-control ">
                            <option disabled> اختر القسم</option>
                            <?php $__currentLoopData = $categoryterms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryterm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($info->category_term == $categoryterm->id ? 'selected': ''); ?> value="<?php echo e($categoryterm->id); ?>"><?php echo e($categoryterm->content_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Featured')); ?></label>
                        <select name="featured" id="featured" class="form-control">
                            <option value="1" <?php echo e(( $info->featured==1)?"selected":""); ?>> <?php echo e(__('main.Yes')); ?> </option>
                            <option value="0" <?php echo e(( $info->featured==0)?"selected":""); ?>> <?php echo e(__('main.No')); ?> </option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions </label>
                        <input class="form-control" id="harvest_sessions" name="harvest_sessions" type="text" value="<?php echo e($info->harvest_sessions); ?>">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions ar </label>
                        <input class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="<?php echo e($info->harvest_essions_ar); ?>">
                    </div>
                </div>

                <h5 class="mb-4">Product Image</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="main_image"> Main Image </label>
                        <div><img src="<?php echo e(asset('uploads/products/' . $main_image)); ?>" width="75px" height="75px" /></div>
                        <input class="form-control" id="main_full" name="main_full" type="file">
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="sub_main"> Sub Image </label>
                        <div><img src="<?php echo e(asset('uploads/products/' . $sub_image)); ?>" width="75px" height="75px" /></div>
                        <input class="form-control" id="sub_main" name="sub_main" type="file">
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Product Images </label>
                        <br>
                        <div class="row">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-2">
                                <img src="<?php echo e(asset('uploads/products/' . $image->full)); ?>" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                <a href="<?php echo e(route('product_images.delete', $image->full)); ?>" class="btn btn-danger btn-sm" style="margin-bottom: 10px; ">delete</a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-0">Options</h5>
                        </div>

                        <div class="col-lg-6">
                            <!-- Bookmark Start-->
                            <div class="bookmark">
                                <ul>
                                    <li class="p-0">
                                        <a role="button" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables" onClick="addOption(<?php echo e($options); ?>)">
                                            <i data-feather="plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Bookmark Ends-->
                        </div>
                    </div>
                </div>

                <div id="form"></div>

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
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>