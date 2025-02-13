

<?php $__env->startSection('title'); ?><?php echo e(__('main.Products')); ?> -
<?php echo e($settings->name_ar); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3><?php echo e(__('main.Products')); ?></h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"><?php echo e(__('main.Products')); ?></li>
<?php $__env->slot('breadcrumb_icon'); ?>
<li class="p-0">
    <a href="<?php echo e(route('products.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
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
                                    <th><?php echo e(__('main.Action')); ?></th>

                                </tr>
                            </thead>
                            <tfoot>
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
        "ajax": "<?php echo e(route('products.index')); ?>",
        "columns": [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name_en',
                name: 'name_en'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/product/index.blade.php ENDPATH**/ ?>