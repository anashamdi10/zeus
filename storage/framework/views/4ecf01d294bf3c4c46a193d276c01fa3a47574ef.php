<?php $__env->startSection('title'); ?>
products
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="token_search" value="<?php echo e(csrf_token()); ?>">

<div class="hero-wrap hero-bread" style="background-image: url('<?php echo e(asset('newpage/images/bg_1.jpg')); ?>')">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs">
					<span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span>
				</p>
				<h1 class="mb-0 bread">Products</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="<?php echo e(route('products')); ?>" class="active">All</a></li>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(route('product_list',$category->id)); ?>"><?php echo e($category->name_en); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<div class="row products_ajax">

			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-6 col-lg-4 mb-4">
				<a href="<?php echo e(route('products.item',$product->id)); ?>">
					<div class="recipe-card">
						<div id="recipe-card__cover" class="recipe-card__cover">
							<div class="recipe-card__img">
								<img src="<?php echo e(asset('uploads/products/'. $product->image)); ?>" alt="woody-factory" />
							</div>
							<div class="recipe-card__cover-details">
								<div id="recipe-card__duration" class="recipe-card__duration">
									<p><span><?php echo e($product->category); ?> </span></p>
								</div>
								<div id="recipe-card__info" class="recipe-card__info">
									<div class="recipe-card__title">
										<h3><?php echo e($product->name_en); ?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</div>

	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">
		<div class="row d-flex justify-content-center py-5">
			<div class="col-md-6">
				<h2 style="font-size: 22px" class="mb-0">Subcribe to our Newsletter</h2>
				<span>Get e-mail updates about our latest shops and special offers</span>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<form action="#" class="subscribe-form">
					<div class="form-group d-flex">
						<input type="text" class="form-control" placeholder="Enter email address" />
						<input type="submit" value="Subscribe" class="submit px-3" />
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
	$(document).ready(function() {

		$(document).on('click', '#aa', function(e) {
			console.log('aaa');

		});
	});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\.well-known_2\resources\views/site/pages/product.blade.php ENDPATH**/ ?>