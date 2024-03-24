
<?php $__env->startSection('title'); ?>
products
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <style>
 .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
        width: 100%;
  height: 100%;
  object-fit: cover;
  border: 3px solid var(--secandary); 
    }
	  </style>

<div class="hero-wrap hero-bread" style="background-image: url('<?php echo e(asset('newpage/images/bg_1.jpg')); ?>')">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs">
					<span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span>
					<span>Product Single</span>
				</p>
				<h1 class="mb-0 bread">Product Single</h1>
			</div>
		</div>
	</div>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 product-details pl-md-5 ftco-animate"> 
			<div style="--swiper-navigation-color: #f20000; --swiper-pagination-color: #232323" class="swiper mySwiper2 col-12">
				<div class="swiper-wrapper">


					<?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="swiper-slide">
						<img class="mainPic" id="pic" style="height: 400px; width: 400px; object-fit: cover" src="<?php echo e(asset('uploads/products/'. $images->full)); ?>" />
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
			<div thumbsSlider="" class="swiper mySwiper col-12">
				<div class="swiper-wrapper">
					<?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="swiper-slide">
						<img lass="secPic" src="<?php echo e(asset('uploads/products/'. $images->full)); ?>" />
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?php echo e($product->name_en); ?></h3>
				<p>
					<?php echo $product->description_en; ?>

				</p>


				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary py-3 px-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
					Order Now
				</button>

				<!-- Modal -->

			</div>
		</div>

		<div class="modal  " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">

				<div class="modal-content">
					<form action=<?php echo e(route('order_create')); ?> method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Order</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<?php echo e(csrf_field()); ?>

							<div class="row">
								<div class="col-6">
									<label for="product_name"> Product Name : </label>
									<span><?php echo e($product->name_en); ?></span>
									<input style="display: none;" value="<?php echo e($product->name_en); ?>" class="form-control" id="product_name" name="product_name">
								</div>
								<div class="col-6">
									<label for="product_name"> Product Code : </label>
									<span><?php echo e($product->product_code); ?></span>
									<input style="display: none;" value="<?php echo e($product->product_code); ?>" class="form-control" id="product_code" name="product_code">
								</div>
								<div class="col-6">
									<label for="product_name"> Name : </label>
									<input class="form-control" id="name" name="name">

									<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger"><?php echo e($message); ?></span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="col-6">
									<label for="product_name"> Email : </label>
									<input type="email" class="form-control" id="email" name="email">

									<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger"><?php echo e($message); ?></span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="col-6">
									<label for="product_name"> Mobile : </label>
									<input type="tel" class="form-control" id="mobile" name="mobile">

									<?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger"><?php echo e($message); ?></span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="col-6">
									<label for="product_name"> Quantity : </label>
									<input type="number" class="form-control" id="quantity" name="quantity">
									<?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger"><?php echo e($message); ?></span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
								<div class="col-12">
									<label for="product_name"> Notes : </label>
									<textarea class="form-control" id="notes" name="notes"></textarea>
								</div>

							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button typbuttone="submit" class="btn btn-primary">Order</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Products</span>
				<h2 class="mb-4">Related Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php $__currentLoopData = $related_productes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-6 col-lg-4 mb-4">
				<a href="<?php echo e(route('products.item' , $product->id)); ?>">
					<div class="recipe-card">
						<div id="recipe-card__cover" class="recipe-card__cover">
							<div class="recipe-card__img">
								<img src="<?php echo e(asset('uploads/products/'. $product->img)); ?>" alt="woody-factory" />
							</div>
							<div class="recipe-card__cover-details">
								<div id="recipe-card__duration" class="recipe-card__duration">
									<p><span><?php echo e($category_name); ?> </span></p>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<?php if(count($errors) > 0): ?>
<script>
	$(document).ready(function() {
		$('#staticBackdrop').modal('show');
	});
</script>
<?php endif; ?>
 <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });

    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 35,
     slidesPerView: "auto",
      centeredSlides: true,
	   navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\well_know\resources\views/site/pages/products_item.blade.php ENDPATH**/ ?>