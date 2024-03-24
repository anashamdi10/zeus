
<?php $__env->startSection('title'); ?>
Terms and Conditions
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('<?php echo e(asset('newpage/images/bg_1.jpg')); ?>')">
	<div class=" container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread"><?php echo e($page->name_en); ?></h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<p><?php echo $page->description_en; ?></p>
			</div>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\.well-known_2\resources\views/site/pages/page.blade.php ENDPATH**/ ?>