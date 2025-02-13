<header id="header" class="fixed-top d-flex align-items-center">
	<div class="container">
		<div class="header-container d-flex align-items-center justify-content-between">
			<div class="logo">
				<a href="index.html" aria-label="some more descriptive text that explains the link">
					<img src="<?php echo e(asset('zeus/assets/img/logo.png')); ?>" alt="Zeus" class="img-fluid" aria-label="some more descriptive text that explains the
						link" /></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="<?php echo e(route('index.show')); ?>">صفحة الرئيسية </a></li>
					<li><a class="nav-link scrollto" href="<?php echo e(route('about_ar')); ?>">حول</a></li>
					<li><a class="nav-link scrollto" href="#services">خدمات</a></li>
					<li><a class="nav-link scrollto" href="<?php echo e(route('facilities_ar')); ?>">مرافق</a></li>
					<li><a class="nav-link scrollto" href="<?php echo e(route('shop_ar')); ?>">منتجات</a></li>
					<li><a class="getstarted scrollto" href="#contact">تواصل معنا الآن</a></li>

					<li><a class="getstarted scrollto" href="<?php echo e(route('index.show')); ?>">En</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->
		</div>
		<!-- End Header Container -->
	</div>
</header><?php /**PATH /home/uldghn4ssl8p/zeus-ex.com/resources/views/site/partials/header_ar.blade.php ENDPATH**/ ?>