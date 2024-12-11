

<?php $__env->startSection('title'); ?>
NewsLetter
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('breadcrumb_title'); ?>
<h3>Review </h3>
<?php $__env->endSlot(); ?>
<li class="breadcrumb-item"> Review</li>
<?php $__env->slot('breadcrumb_icon'); ?>
<li>
    <a href="<?php echo e(route('review.create')); ?>" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
</li>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mb-3">
                        <div class="alert alert-danger outline"><?php echo e($error); ?></div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>


                <?php if(Session::has('success')): ?>
                <div class="alert alert-success outline"><?php echo e(Session::get('success')); ?></div>
                <?php endif; ?>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>opinion</th>
                                    <th>work</th>
                                    <th>Image</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php if(@isset($data) && !@empty($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($idx+1); ?></td>
                                    <td><?php echo e($dt->name); ?></td>
                                    <td><?php echo e($dt->opinion); ?></td>
                                    <td><?php echo e($dt->work); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('uploads/review/' . $dt->image)); ?>" width="75px" height="75px" />
                                    </td>

                                    <td>
                                        <a href="<?php echo e(route('review.edit',$dt->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(route('review.delete',$dt->id)); ?>" class="btn btn-danger btn-sm">Delete<a>
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/admin/review/index.blade.php ENDPATH**/ ?>