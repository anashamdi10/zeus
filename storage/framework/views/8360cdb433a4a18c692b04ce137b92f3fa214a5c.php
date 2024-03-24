<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
			<!-- =====  CONTAINER START  ===== -->
			<div class="container">
				<div class="row">
					<div id="column-left" class="col-sm-4 col-md-4 col-lg-3 hidden-xs">
						<div id="category-menu" class="navbar collapse mb_40" aria-expanded="true" style="" role="button">
							<div class="nav-responsive">
								<ul class="nav main-navigation collapse in">
									<li><a href="#">Appliances</a></li>
									<li><a href="#">Mobile Phones</a></li>
									<li><a href="#">Tablet PC & Accessories</a></li>
									<li><a href="#">Consumer Electronics</a></li>
									<li><a href="#">Computers & Networking</a></li>
									<li><a href="#">Electrical & Tools</a></li>
									<li><a href="#">Apparel</a></li>
									<li><a href="#">Bags & Shoes</a></li>
									<li><a href="#">Toys & Hobbies</a></li>
									<li><a href="#">Watches & Jewelry</a></li>
									<li><a href="#">Home & Garden</a></li>
									<li><a href="#">Health & Beauty</a></li>
									<li><a href="#">Outdoors & Sports</a></li>
								</ul>
							</div>
						</div>
						<div class="left_banner left-sidebar-widget mt_30 mb_40">
							<a href="#"><img src="<?php echo e(asset('wb2022/images/left1.jpg')); ?>" alt="Left Banner" class="img-responsive" /></a>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-9 mtb_30">
						<!-- contact  -->
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="panel-login">
									<div class="panel-heading">
										<div class="row mb_20">
											<div class="col-xs-6">
												<a href="#" class="active" id="login-form-link">Login</a>
											</div>
											<div class="col-xs-6">
												<a href="#" id="register-form-link">Register</a>
											</div>
										</div>
										<hr />
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-12">
												<form id="login-form" action="<?php echo e(route('signin')); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
													<div class="form-group">
														<input type="text" name="phone" id="username1" tabindex="1" class="form-control" placeholder="Phone" value="" />
													</div>
													<div class="form-group">
														<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" />
													</div>
													<div class="form-group text-center">
														<input type="checkbox" tabindex="3" class="" name="remember" id="remember" />
														<label for="remember"> Remember Me</label>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 col-sm-offset-3">
																<input
																	type="submit"
																	name="login-submit"
																	id="login-submit"
																	tabindex="4"
																	class="form-control btn btn-login"
																	value="Log In"
																/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-lg-12">
																<div class="text-center">
																	<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
																</div>
															</div>
														</div>
													</div>
												</form>
												<form id="register-form" action="<?php echo e(route('signup')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
													<div class="form-group">
														<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="fullname" value="" />
													</div>
													<div class="form-group">
														<input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Phone" value="" />
													</div>
													<div class="form-group">
														<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" />
													</div>
													<div class="form-group">
														<input type="password" name="password" id="password2" tabindex="2" class="form-control" placeholder="Password" />
													</div>
													<div class="form-group">
														<input
															type="password"
															name="confirm-password"
															id="confirm-password"
															tabindex="2"
															class="form-control"
															placeholder="Confirm Password"
														/>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 col-sm-offset-3">
																<input
																	type="submit"
																	name="register-submit"
																	id="register-submit"
																	tabindex="4"
																	class="form-control btn btn-register"
																	value="Register Now"
																/>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Single Blog  -->
		<!-- End Blog   -->
		<!-- =====  CONTAINER END  ===== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rltv764kemik/woody-factory.com/resources/views/auth/login.blade.php ENDPATH**/ ?>