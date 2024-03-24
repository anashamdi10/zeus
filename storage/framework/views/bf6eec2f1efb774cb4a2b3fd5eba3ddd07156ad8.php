

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



<div class="container-fluid">
    <form action=<?php echo e(route('products.update',$info->id)); ?> method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_ar"><?php echo e(__('main.Name_Ar')); ?> </label>
                            <input class="form-control" id="name_ar" type="text" value="<?php echo e($info->name_ar); ?>" name="name_ar">
                        </div>

                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Desc_Ar')); ?></label>
                            <textarea class="ckeditor form-control" rows="3" name="description_ar">
                            <?php echo e($info->description_ar); ?>

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

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
                    <h5 class="mb-4">معلومات اساسية</h5>

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
                        <label class="col-form-label pt-0" for="name_en"> Product Code </label>
                        <input class="form-control" id="product_code" name="product_code" value="<?php echo e($info->product_code); ?>" >
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Category')); ?></label>
                        <select name="category_id" id="category_id" class="form-control ">
                           
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($info->category_id == $category->id ? 'selected': ''); ?> ><?php echo e($category->name_ar); ?></option>
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

                    <!-- <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> <?php echo e(__('main.Available')); ?></label>
                        <select name="available" id="categories" class="form-control">
                            <option value="1" <?php echo e(( $info->available==1)?"selected":""); ?>> <?php echo e(__('main.Yes')); ?> </option>
                            <option value="0" <?php echo e(( $info->available==0)?"selected":""); ?>> <?php echo e(__('main.No')); ?> </option>
                        </select>
                    </div> -->
                </div>

                <h5 class="mb-4">Product Image</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Main Image </label>
                        <div><img src="<?php echo e(asset('uploads/products/' . $main_image)); ?>" width="75px" height="75px" /></div>
                        <input class="form-control" id="main_full" name="main_full" type="file">
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

                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file" style="">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-0">الخيارات</h5>
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
    function addOption(cats) {
        var catsOtps = cats.map(
                (categ) => `
                        <option value="${categ.id}">${categ.name_ar}</option>
                        `
            )
            .join("");

        html = ` 
                    <div class="card" id="optsCard">
                        <div class="card-header bg-primary text-white">
                            
                                <div class="form-group mb-0">
                                    <label class="col-form-label pt-0" for="name_ar">اختر الخيار</label> 
                                    <div class="col-lg-6 d-flex align-items-end gap-4">    
                                        <select type="text" class="form-control w-50" id="option-field">
                                            ${catsOtps}
                                        </select>
                                        <button type="button" onClick="addnew(this)" class="remove-tr btn btn-danger">اضافه قيمه الخيار</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="card-body" id="option_values">

                        </div>
                    </div>
                `;
        $("#form").append(html);
    }


    function addnew(btn) {
        let id = $(btn).siblings('#option-field').find(':selected').val();
        let name = $(btn).siblings('#option-field').find(':selected').text()
        let values = $(btn).closest("#optsCard").find('#option_values');
        console.log(name)
        $.ajax({
            url: `<?php echo e(url('/cpadmin/ajax/get-options/')); ?>/${id}`,
            method: "GET",
            success: function(data) {
                let selectOpts = data.map((opt) => `
                        <option value="${opt.id}">${opt.name_ar}</option>
                    `);
                html = `
                        <div class="" id="option_values">
                            <div class="row mb-4" style="border-bottom: 1px solid #e6edef">
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">${name}</label> 
                                        <select type="text" class="form-control" name="option_value_ids[]">
                                            ${selectOpts}
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">الكميه</label> 
                                        <input type="text" class="form-control" name="quantities[]">
                                    </div>
                                </div>
                                
                                <input hidden value="${id}" name="option_ids[]">
                            
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  subtract </label> 
                                        <select type="text" class="form-control" name="subtract[]">
                                            <option value="1">true</option>
                                            <option value="0">false</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  السعر </label> 
                                        <input type="text" class="form-control" name="prices[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">price prefix</label> 
                                        <select type="text" class="form-control" name="price_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  النقاط </label> 
                                        <input type="text" class="form-control" name="points[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  points prefix </label> 
                                        <select type="text" class="form-control" name="points_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  الوزن </label> 
                                        <input type="text" class="form-control" name="weights[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">weight prefix</label> 
                                        <select type="text" class="form-control" name="weight_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                $(values).append(html);
            }

        });

    }
</script>


<?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\well_know\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>