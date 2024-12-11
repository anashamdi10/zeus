<footer id="footer">
	<!-- Grid container -->
	<div class="container p-4 pb-0 text-center footer-newsletter">
		<!-- Section: Form -->
		<h4>انضم إلى النشرة الإخبارية لدينا الآن للحصول على جميع أخبارنا</h4>
		<form action="<?php echo e(route('newsletter.store')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<input type="email" name="email" aria-label="your email" />
			<input type="submit" value="اشتراك" aria-label="your email" />
		</form>
		<!-- Section: Form -->
	</div>



	<?php if(Session::has('error')): ?>

	<div class="alert alert-danger outline" style="background-color: red; color: white;"><?php echo e(Session::get('error')); ?></div>

	<?php endif; ?>



	<?php if(Session::has('success')): ?>
	<div class="alert alert-info outline" style="background-color: #9FA6B2; color: white; text-align: center;"><?php echo e(Session::get('success')); ?></div>
	<?php endif; ?>
	<!--	<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 footer-contact">
						<h3>Zeus</h3>
						<p>
							Block 9, Zone B3, <br />
							10TH of Ramdan City, EGYPT<br />
							<br /><br />
							<strong>Phone:</strong> +20 1011111 <br />
							<strong>Email:</strong> info@zeus-ex.com<br />
						</p>
					</div>

					<div class="col-lg-2 col-md-6 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-md-6 footer-links">
						<h4>Our Services</h4>
						<ul>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
							<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-6 footer-newsletter">
						<h4>Join Our Newsletter</h4>
						<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
						<form action="" method="post"><input type="email" name="email aria-label="your name" " /><input type="submit" value="Subscribe"  aria-label="your name" /></form>
					</div>
				</div>
			</div>
		</div> -->
	<div class="container d-md-flex py-4">
		<div class="me-md-auto text-md-start">
			<div class="copyright">
				&copy;حقوق النشر 2023 <strong><span>Zeus</span> </strong>. كل الحقوق محفوظة
			</div>
			<div class="credits">صمم بواسطة <a href="https://opetagency.com" target="_blank">وكالة</a></div>
		</div>
		<div class="social-links text-center text-md-right pt-3 pt-md-0">
			<a href="#" class="twitter" target="_blank">
				<i class="bx bxl-twitter"></i>
			</a>
			<a href="#" class="facebook" target="_blank">
				<i class="bx bxl-facebook"></i>
			</a>
			<a href="https://www.instagram.com/exportzeus/" target="_blank" class="instagram">
				<i class="bx bxl-instagram"></i>
			</a>
			<a href="#" class="linkedin" target="_blank">
				<i class="bx bxl-linkedin"></i>
			</a>
		</div>
	</div>
</footer><?php /**PATH C:\xampp\htdocs\git\resources\views/site/partials/footer_ar.blade.php ENDPATH**/ ?>