

<?php $__env->startSection('title'); ?>
About
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

                        <form action="<?php echo e(route('about.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <div class=" mb-3">
                                <div style="text-align: right;">
                                    <buttom id='btn' onclick="edit()" style="color: #3a9aa8;" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="edit"></i></buttom>
                                    <button id='link' type="submit" style="color: #3a9aa8; display: none; border:none;"><i data-feather="save"></i></button>
                                </div>

                                <div class="col-md-12">
                                    <h4>About</h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="font-size: 24px;">Title En</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="font-size: 24px; ">Title Ar </p>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input id='title' name="title" class="form-control" type="text" readonly value="<?php echo e($data->title); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input id='title_ar' name="title_ar" class="form-control" type="text" readonly value="<?php echo e($data->title_ar); ?>" style="text-align: right;">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <h4>Pragrap Enh</h4>
                                        <textarea name="pragraph" id='pragraph' class="form-control" rows="10" style="text-align: left;" readonly>
                                        <?php echo e($data->pragraph); ?>

                                        </textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <h4>Pragraph Ar</h4>
                                        <textarea name="pragraph_ar" id='pragraph_ar' class="form-control" rows="10" style="text-align: right;" readonly>
                                        <?php echo e($data->pragraph_ar); ?>

                                        </textarea>

                                    </div>
                                </div>

                            </div>


                            <div class="form-group mb-3">
                                <h4>image</h4>
                                <img src="<?php echo e(asset('uploads/about/' . $data->image)); ?>" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                <input id='image' name="image" type="file" class="form-control" style="display: none;" value="" id="">
                            </div>

                            <div class="col-md-12">
                                <h4>Our Certificates </h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>title </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>title ar </h5>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea name="title_certificates" id='title_certificates' class="form-control" rows="5" style="text-align: left;" readonly>
                                    <?php echo e($data->title_certificates); ?>

                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="title_certificates_ar" id='title_certificates_ar' class="form-control" rows="5" style="text-align: left;" readonly>
                                    <?php echo e($data->title_certificates_ar); ?>

                                    </textarea>
                                </div>
                            </div>
                            <div>

                            </div>


                        </form>


                        <div class="col-md-12 " style="text-align: right; margin-top: 10px;">
                            <a href="<?php echo e(route('about.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>

                        </div>


                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>address</th>
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(@isset($certificates) && !@empty($certificates)): ?>
                                <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index +1); ?></td>
                                    <td><?php echo e($info->title); ?></td>
                                    <td><?php echo e($info->city); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('uploads/certificates/' . $info->image)); ?>" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('certificates.edit', $info->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(route('certificates.delete',$info->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="5" class="alert alert-danger">No Data</td>
                                </tr>

                                <?php endif; ?>
                            </tbody>
                        </table>


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



<script>
    function edit() {
        var link = document.getElementById("link");
        var title = document.getElementById("title");
        var title_ar = document.getElementById("title_ar");
        var pragraph = document.getElementById("pragraph");
        var pragraph_ar = document.getElementById("pragraph_ar");
        var image = document.getElementById("image");
        var btn = document.getElementById("btn");
        var title_certificates = document.getElementById("title_certificates");
        var title_certificates_ar = document.getElementById("title_certificates_ar");


        link.style.display = null;
        image.style.display = null;
        btn.style.display = "none";

        title_certificates.removeAttribute('readonly');
        title_certificates_ar.removeAttribute('readonly');
        title.removeAttribute('readonly');
        title_ar.removeAttribute('readonly');
        pragraph.removeAttribute('readonly');
        pragraph_ar.removeAttribute('readonly');
    }

    function edit_title() {

    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus\resources\views/admin/about/index.blade.php ENDPATH**/ ?>