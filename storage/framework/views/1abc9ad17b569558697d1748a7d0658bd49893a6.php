

<?php $__env->startSection('title'); ?><?php echo e(__('main.Slides')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>About </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> About</li>
<?php $__env->slot('breadcrumb_icon'); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route('about.update',$row->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <h4>Title</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <buttom id='btn' onclick="edit()" style="color: #3a9aa8;" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="edit"></i></buttom>
                                        <button id='link' type="submit" style="color: #3a9aa8; display: none; border:none;"><i data-feather="save"></i></button>
                                    </div>
                                </div>
                                <input id='title' name="title" class="form-control" type="text" readonly value="<?php echo e($row->title); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <h4>pragraph</h4>
                                <input name="pragraph" id='pragraph' class="form-control" type="text" readonly value="<?php echo e($row->pragraph); ?>" id="">
                            </div>

                            <div class="form-group mb-3">
                                <h4>image</h4>
                                <img src="<?php echo e(asset('uploads/about/' . $row->image)); ?>" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                <input id='image' name="image" type="file" class="form-control" style="display: none;" value="" id="">
                            </div>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
</div>


<script>
    function edit() {
        var link = document.getElementById("link");
        var title = document.getElementById("title");
        var pragraph = document.getElementById("pragraph");
        var image = document.getElementById("image");
        var btn = document.getElementById("btn");

        link.style.display = null;
        image.style.display = null;
        btn.style.display = "none";
        title.removeAttribute('readonly');
        pragraph.removeAttribute('readonly');
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/about/index.blade.php ENDPATH**/ ?>