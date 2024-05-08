<!-- Page Sidebar Start-->
<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>" alt="" />
        <div class="badge-bottom">
            <span class="badge badge-primary">New</span>
        </div>
        <a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600"><?php echo e(auth()->guard('admin')->user()->name); ?></h6>
        </a>
    </div>

    <nav>
        <div class="main-navbar <?php if(Route::current()->getName() == 'admin.pos'): ?> close_icon <?php endif; ?>">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6><?php echo e(__('main.Main_List')); ?> </h6>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php if(Route::current()->getName() == 'admin.dashboard'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                            <i data-feather="home"></i>
                            <span><?php echo e(__('main.home')); ?></span>
                        </a>
                    </li>


                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="package"></i>
                            <span> <?php echo e(__('main.Products_Data')); ?></span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.products'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.products')); ?>"><span><?php echo e(__('main.Products')); ?></span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'categories'): ?> active <?php endif; ?>" href="<?php echo e(route('categories')); ?>"><span><?php echo e(__('main.Categories')); ?> </span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'category_terms'): ?> active <?php endif; ?>" href="<?php echo e(route('category_terms')); ?>"><span> Category_terms </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="percent"></i><span><?php echo e(__('main.Coupons_And_Offers')); ?> </span></a>
                        <ul class="nav-submenu menu-content">

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.flash.deals'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flash.deals')); ?>"><span> <?php echo e(__('main.Rabid_Offers')); ?></span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="info"></i><span><?php echo e(__('main.Site_Data')); ?> </span></a>
                        <ul class="nav-submenu menu-content">

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.slides'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.slides')); ?>"><span><?php echo e(__('main.Slides')); ?></span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.about'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.about')); ?>"><span>About</span></a>
                            </li>

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.counter'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.counter')); ?>"><span>counter</span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.why'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.why')); ?>"><span>why shose us</span></a>
                            </li>

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.services'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.services')); ?>"><span>our services</span></a>
                            </li>

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.admin.our_news'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.our_news')); ?>"><span>Our News</span></a>
                            </li>



                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.setting.contact'): ?> active <?php endif; ?>" href="<?php echo e(route('contact.index')); ?>"><span><?php echo e(__('main.Contact_Settings')); ?></span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.setting'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.setting')); ?>"><span><?php echo e(__('main.General_Settings')); ?> </span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.contact'): ?> active <?php endif; ?>" href="<?php echo e(route('contact.index')); ?>"><span><?php echo e(__('main.Contact_Us')); ?> </span></a>
                            </li>

                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.newsletter'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.newsletter')); ?>"><span>Newsletter </span></a>
                            </li>
                            <li>
                                <a class="<?php if(Route::current()->getName() == 'admin.review'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.review')); ?>"><span>Review </span></a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php if(Route::current()->getName() == 'admins'): ?> active <?php endif; ?>" href="<?php echo e(route('admins')); ?>"><i data-feather="settings"></i><span><?php echo e(__('main.Admins')); ?></span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php if(Route::current()->getName() == 'users'): ?> active <?php endif; ?>" href="<?php echo e(route('users')); ?>"><i data-feather="users"></i><span><?php echo e(__('main.Users')); ?></span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php if(Route::current()->getName() == 'admin.pages'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.pages')); ?>"><i data-feather="layout"></i><span><?php echo e(__('main.Pages')); ?></span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav <?php if(Route::current()->getName() == 'admin.orders'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders')); ?>"><i data-feather="shopping-cart"></i><span><?php echo e(__('main.Orders')); ?></span></a>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends--><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/layouts/default-layout/partials/sidebar.blade.php ENDPATH**/ ?>