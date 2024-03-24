
<?php $__env->startSection('title'); ?>
<?php echo e(__('main.home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slider-item" style="background-image: url(<?php echo e(asset('uploads/slides/'. $info->image)); ?>)">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate text-center">
                        <h2 class="mb-2"><?php echo e($info->title); ?></h2>
                        <h3 class="subheading mb-4"><?php echo e($info->sub_title); ?></h3>
                        <p><a href="<?php echo e($info->link); ?>" class="btn btn-primary" >View Details</a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</section>


		<section class="ftco-section" id="about">
			<div class="container">
				<div class="row no-gutters ftco-services">
					<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services mb-md-0 mb-4">
							<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
								<i class="bx bxs-package bx-tada-hover bx-md"></i>
							</div>
							<div class="media-body">
								<h3 class="heading">Free Shipping</h3>
								<span>With Out Any Price </span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services mb-md-0 mb-4">
							<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
								<i class="bx bxl-sketch bx-md bx-tada-hover"></i>
							</div>
							<div class="media-body">
								<h3 class="heading">Always Hard</h3>
								<span>Product well made </span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services mb-md-0 mb-4">
							<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
								<i class="bx bxs-shield-alt-2 bx-md bx-tada-hover"></i>
							</div>
							<div class="media-body">
								<h3 class="heading">Superior Quality</h3>
								<span>Quality boards</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services mb-md-0 mb-4">
							<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
								<i class="bx bx-support bx-md bx-tada-hover"></i>
							</div>
							<div class="media-body">
								<h3 class="heading">Our Support</h3>
								<span>24/7 Support</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<section class="ftco-section ftco-category">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(<?php echo e(asset('newpage/images/category.webp')); ?>)">
                            <div class="text text-center">
                                <h2>Our Boards</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="<?php echo e(route('products')); ?>" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?php echo e(asset('newpage/images/category-1.webp')); ?>)">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Formica panels</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(<?php echo e(asset('newpage/images/category-2.webp')); ?>)">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Plywood</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?php echo e(asset('newpage/images/category-3.webp')); ?>)">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Woodyboard</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(<?php echo e(asset('newpage/images/category-4.webp')); ?>)">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Woodyboard</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<span class="subheading">Featured Products</span>
						<h2 class="mb-4">Our Products</h2>
					</div>
				</div>
			</div>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            <div class="col-md-6 col-lg-4 mb-4 ftco-animate">
                <a href="<?php echo e(route('products.item' , $product->id)); ?>">
                    <div class="recipe-card">
                        <div id="recipe-card__cover" class="recipe-card__cover">
                            <div class="recipe-card__img">
                                <img src="<?php echo e(asset('uploads/products/'. $product->image)); ?>" alt="woody-factory Products wooden boards" />
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

<section id="timersection"  class="ftco-section img" style="background-image: url(<?php echo e(asset('uploads/offers/' . $flashs->image)); ?>)">
  	<div class="overlay"></div>
			  <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">Best Price For You</span>
                <h2 class="mb-4"><?php echo e($flashs->title); ?></h2>
                <p><?php echo e($flashs->pragraph); ?></p>
                <input type="text" style="display: none;" value="<?php echo e($flashs->date_time); ?>" id='date_time' name="date_time">
                <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(<?php echo e(asset('uploads/review/'. $info->image)); ?>)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="bx bxs-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">
                                    <?php echo e($info->opinion); ?>

                                </p>
                                <p class="name"> <?php echo e($info->name); ?></p>
                                <span class="position"> <?php echo e($info->work); ?></span>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"> <img src="<?php echo e(asset('newpage/images/partner-1.png')); ?>" class="img-fluid" alt="Woody factory parteners " /></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="<?php echo e(asset('newpage/images/partner-2.png')); ?>" class="img-fluid" alt="Woody factory parteners " /></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="<?php echo e(asset('newpage/images/partner-3.png')); ?>" class="img-fluid" alt="Woody factory parteners " /></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="<?php echo e(asset('newpage/images/partner-4.png')); ?>" class="img-fluid" alt="Woody factory parteners " /></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="<?php echo e(asset('newpage/images/partner-5.png')); ?>" class="img-fluid" alt="Woody factory parteners " /></a>
            </div>
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
                <form action="<?php echo e(route('newsletter.store')); ?>" class="subscribe-form" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group d-flex">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" />
                        <input type="submit" value="Subscribe" class="submit px-3" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if($errors): ?>
    <?php if($errors == 'Email is exists before'): ?>
    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
        <?php echo e($errors); ?>


    </div>

    <?php elseif($errors =='Subscribe Complete'): ?>
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        <?php echo e($errors); ?>


    </div>
    <?php endif; ?>
    <?php endif; ?>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rltv764kemik/woody-factory.com/resources/views/site/pages/index.blade.php ENDPATH**/ ?>