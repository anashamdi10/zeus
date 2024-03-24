<?php $__env->startSection('title'); ?><?php echo e(__('main.Admins')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('main.Admins')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><?php echo e(__('main.Admins')); ?></li>
       
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatables table-borderless align-middle" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('main.Name')); ?></th>
                                    <th><?php echo e(__('main.Action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>



    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                processing: true,
                serverSide: true,
                "ajax": "<?php echo e(route('admins.index')); ?>",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/admin/index.blade.php ENDPATH**/ ?>