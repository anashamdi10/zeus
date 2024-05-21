

<?php $__env->startSection('title'); ?> <?php echo e(__('main.Orders')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3><?php echo e(__('main.Orders')); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"><?php echo e(__('main.Orders')); ?> </li>
<?php $__env->slot('breadcrumb_icon'); ?>
<!-- <li>
                <a href="<?php echo e(route('orders.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li> -->
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name </th>
                                    <th>product name</th>
                                    <th>Email</th>
                                    <th><?php echo e(__('main.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index +1); ?></td>
                                    <td><?php echo e($info->name); ?></td>
                                    <td><?php echo e($info->product_name); ?></td>
                                    <td><?php echo e($info->email); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('orders.info',$info->id)); ?>" class="btn btn-primary btn-sm">info</a>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/order/index.blade.php ENDPATH**/ ?>