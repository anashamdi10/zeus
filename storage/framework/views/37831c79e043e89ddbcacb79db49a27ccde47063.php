<?php $__env->startSection('title'); ?><?php echo e(__('main.Users')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('main.Users')); ?></h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><?php echo e(__('main.Users')); ?></li>
        <?php $__env->slot('breadcrumb_icon'); ?>
            <li>
                <a href="<?php echo e(route('users.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display datatables" id="ajax-data-object">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('main.Name')); ?></th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                processing: true,
                serverSide: true,
                "ajax": "<?php echo e(route('users.index')); ?>",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    ]
            });
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/user/index.blade.php ENDPATH**/ ?>