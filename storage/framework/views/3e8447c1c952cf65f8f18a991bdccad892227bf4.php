<footer class="ftco-footer ftco-section">
	<div class="container">
		<div class="row">
			<div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><i class="bx bxs-arrow-from-bottom" style="color: #ffffff"></i></div>
				</a>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-4">
				<img src="<?php echo e(asset('newpage/images/factory wood profile picture.webp')); ?>" alt="" style="height: 300px" />
			</div>
			<div class="col-md-2">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">woody factory</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<li class="ftco-animate">
							<a href="https://www.facebook.com/woody.blockboard?mibextid=ZbWKwL"><i class="bx bxl-facebook-square"></i></a>
						</li>
						<li class="ftco-animate">
							<a href="https://www.instagram.com/p/C2utMOvNu54/?igsh=ZzFycWR4b2tpcmVp"><i class="bx bxl-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Help</h2>
					<div class="d-flex">
						<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
							<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('singlePage' ,[$page->name_en,$page->id])); ?>" style="color: #f8f9fa;" class="py-2 d-block"><?php echo e($page->name_en); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li>
								<a href="#">
									<i class="bx bxs-map"></i>
									<span class="text" style="color: #f8f9fa;"> 203 Fake St. Mountain View, San Francisco, California, USA</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="bx bxs-map"></i>
									<span class="text" style="color: #f8f9fa;">01011337556 - 01001383256 <br />
										01223741954 - 01115131319</span></a>
							</li>
							<li>
								<a href="#" style="color: #f8f9fa;"><i class="bx bxs-map"></i><span class="text">info@yourdomain.com</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p>
					Copyright &copy;
					<script>
						document.write(new Date().getFullYear())
					</script>
					All rights reserved | Woody Factory Design by
					<a href="https://opetagency.com/" style="color: #f8f9fa;" target="_blank">Opet Agency</a>
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
	<span class="loaderwoody"></span>
</div><?php /**PATH C:\xampp\htdocs\woody-factory\resources\views/site/partials/footer.blade.php ENDPATH**/ ?>