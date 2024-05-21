

<?php $__env->startSection('title'); ?> <?php echo e(__('main.Rabid_Offers')); ?>

<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3> <?php echo e(__('main.Rabid_Offers')); ?> </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> <?php echo e(__('main.Rabid_Offers')); ?> </li>
<?php $__env->slot('breadcrumb_icon'); ?>
<li>
    <a href="<?php echo e(route('flash.deals.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
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
                                    <th><?php echo e(__('main.Product_Name')); ?></th>
                                    <th>Sales Price</th>
                                    <th>Title</th>
                                    <th><?php echo e(__('main.Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(@isset($data) && !@empty($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($idx+1); ?></td>
                                    <td><?php echo e($dt->product_name); ?></td>
                                    <td><?php echo e($dt->sale_price); ?></td>
                                    <td><?php echo e($dt->title); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('uploads/offers/' . $dt->image)); ?>" width="75px" height="75px" />
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('flash_deals.edit',$dt->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(route('flash_deals.destroy',$dt->id)); ?>" class="btn btn-danger btn-sm">Delete<a>
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



<!-- <?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $('#ajax-data-object').DataTable({
        processing: true,
        serverSide: true,
        "ajax": "<?php echo e(route('flash.deals.index')); ?>",
        "columns": [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'product',
                name: 'product'
            },
            {
                data: 'sale_price',
                name: 'sale_price'
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
<?php $__env->stopPush(); ?> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/flash-deal/index.blade.php ENDPATH**/ ?>