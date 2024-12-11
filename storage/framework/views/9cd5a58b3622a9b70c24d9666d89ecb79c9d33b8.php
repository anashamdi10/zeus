

<?php $__env->startSection('title'); ?>
Facilities
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>Facilities </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Facilities</li>
<?php $__env->slot('breadcrumb_icon'); ?>
<li>
    <a href="<?php echo e(route('facilities.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>

</li>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th style="width: 300px;">pragraph</th>


                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(@isset($data) && !@empty($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($info->id); ?></td>
                                    <td><?php echo e($info->title); ?></td>

                                    <td><?php echo e($info->pragraph); ?></td>



                                    <td>
                                        <a href="<?php echo e(route('facilities.edit', $info->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(route('facilities.delete',$info->id)); ?>" class="btn btn-danger btn-sm">Delete</a>
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
                    </div>


                </div>
            </div>
        </div>
    </div>



</div>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/facilities/index.blade.php ENDPATH**/ ?>