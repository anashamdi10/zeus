<?php $__env->startSection('title'); ?> Sub Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>Sub Category</h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Sub Category</li>
<?php $__env->slot('breadcrumb_icon'); ?>
<li>
    <a href="<?php echo e(route('categoryterms.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $('#ajax-data-object').DataTable({
        processing: true,
        serverSide: true,
        "ajax": "<?php echo e(route('categoryterms.index')); ?>",
        "columns": [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'content_en',
                name: 'content_en'
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
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/categoryterm/index.blade.php ENDPATH**/ ?>