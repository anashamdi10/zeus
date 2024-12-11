

<?php $__env->startSection('title'); ?>Counter
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>Counter </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Counter</li>
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
                        <form action="<?php echo e(route('counter.update',$row->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <h4>Facilities</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <buttom id='btn' onclick="edit()" style="color: #3a9aa8;" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="edit"></i></buttom>
                                        <button id='link' type="submit" style="color: #3a9aa8; display: none; border:none;"><i data-feather="save"></i></button>
                                    </div>
                                </div>
                                <input id='facilities' name="facilities" class="form-control" type="number" readonly value="<?php echo e($row->facilities); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <h4>Porducts</h4>
                                <input name="porducts" type="number" id='porducts' class="form-control" type="text" readonly value="<?php echo e($row->Porducts); ?>">
                            </div>

                            <div class="form-group mb-3">
                                <h4>Produced Tons in 2023</h4>
                                <input id='tons' name="tons" type="number" class="form-control" readonly value="<?php echo e($row->Produced_Tons_in_2023); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <h4>Oustees Clients</h4>
                                <input id='oustees' name="oustees" type="number" class="form-control" readonly value="<?php echo e($row->Oustees_Clients); ?>">
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
        var facilities = document.getElementById("facilities");
        var porducts = document.getElementById("porducts");
        var tons = document.getElementById("tons");
        var oustees = document.getElementById("oustees");
        var btn = document.getElementById("btn");
        var link = document.getElementById("link");


        btn.style.display = "none";
        link.style.display = null;
        facilities.removeAttribute('readonly');
        porducts.removeAttribute('readonly');
        tons.removeAttribute('readonly');
        oustees.removeAttribute('readonly');
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/counter/index.blade.php ENDPATH**/ ?>