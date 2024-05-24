

<?php $__env->startSection('title'); ?> <?php echo e(__('main.Contacts')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3><?php echo e(__('main.Contacts')); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"><?php echo e(__('main.Contacts')); ?> </li>

<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class= " table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('main.Name')); ?></th>
                                    <th><?php echo e(__('main.Message')); ?> </th>
                                    <th><?php echo e(__('main.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><?php echo e($idx +1); ?></td>
                                    <td><?php echo e($info->name); ?></td>
                                    <td><?php echo e($info->message); ?></td>
                                    <td>
                                        
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
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/setting/contacts.blade.php ENDPATH**/ ?>