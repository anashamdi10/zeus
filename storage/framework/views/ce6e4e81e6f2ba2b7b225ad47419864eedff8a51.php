

<?php $__env->startSection('title'); ?><?php echo e(__('main.home')); ?> - 
<?php echo e($settings->name_ar); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/daterange-picker.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('main.home')); ?></h3>
        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>
    
    <div class="container-fluid">
        <div class="theme-form mb-5">
            <form action="<?php echo e(route('admin.dashboard')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group mb-0">
                            <input class="form-control input-1 digits" type="text" name="daterange" value="<?php echo e(\Carbon\Carbon::now()->format('m/d/Y')); ?> - <?php echo e(\Carbon\Carbon::now()->format('m/d/Y')); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="button">
                            <?php echo e(__('main.Display')); ?>

                        </button>
                    </div>
                </div>
                
            </form>
        </div>
            
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="users"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Users')); ?></span>
                                <h4 class="mb-0 counter"><?php echo e($users); ?></h4><i class="icon-bg" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="box"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Products')); ?></span>
                                <h4 class="mb-0 counter"><?php echo e($products); ?></h4><i class="icon-bg" data-feather="box"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="list"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Categories')); ?> </span>
                                <h4 class="mb-0 counter"><?php echo e($cats); ?></h4><i class="icon-bg" data-feather="list"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="git-pull-request"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Sub_Categories')); ?> </span>
                                <h4 class="mb-0 counter"><?php echo e($subCats); ?></h4><i class="icon-bg" data-feather="git-pull-request"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Orders')); ?></span>
                                <h4 class="mb-0 counter"></h4><i class="icon-bg" data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="dollar-sign"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Payments')); ?></span>
                                <h4 class="mb-0 counter"></h4><i class="icon-bg" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="check-square"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Brands')); ?> </span>
                                <h4 class="mb-0 counter"><?php echo e($brands); ?></h4><i class="icon-bg" data-feather="check-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-secondary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="image"></i></div>
                            <div class="media-body"><span class="m-0"><?php echo e(__('main.Slides')); ?></span>
                                <h4 class="mb-0 counter"><?php echo e($slides); ?></h4><i class="icon-bg" data-feather="image"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 xl-50 box-col-12">
                <div class="widget-joins card widget-arrow">
                  <div class="row">
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                          <h5 class="mb-0">Today</h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-down"></i></div>
                        <div class="media-body">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                          <h5 class="mb-0">Month</h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-up"></i></div>
                        <div class="media-body ps-2">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                          <h5 class="mb-0">Week</h5>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-up"></i></div>
                        <div class="media-body">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                          <h5 class="mb-0">Year</h5>
                        </div>
                        <div class="media-body align-self-center ps-3"><i class="font-primary" data-feather="arrow-up"></i></div>
                        <div class="media-body ps-2">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <div class="col-xl-6 xl-50 box-col-12">
                <div class="widget-joins card">
                  <div class="row">
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
                        <div class="media-body details ps-3"><span class="mb-1">New</span>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-bag"></i></div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3">12%<i class="fa fa-angle-down ms-2"></i></div>
                        <div class="media-body details ps-3"><span class="mb-1">Pending</span>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-3" data-feather="layers"></i></div>
                      </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                      <div class="media border-after-xs">
                        <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
                        <div class="media-body details ps-3 pt-0"><span class="mb-1">Done</span>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-cart"></i></div>
                      </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                      <div class="media">
                        <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
                        <div class="media-body details ps-3 pt-0"><span class="mb-1">Cancel</span>
                        </div>
                        <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="dollar-sign"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 box-col-12 des-xl-100 top-dealer-sec">
            <div class="card">
              <div class="card-header pb-0">
                <div class="header-top d-flex justify-content-between align-items-center flex-wrap gap-3">
                  <h5>Top Dealer</h5>
                  <div class="center-content p-0 m-0">                                  
                    <p class="d-sm-flex align-items-center m-0"><span class="m-r-10">845 Dealer</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>86% More Than Last Year</p>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                <div class="owl-carousel owl-theme" id="owl-carousel-14">
                  <div class="item">
                        <div class="owl-carousel-16 owl-carousel owl-theme">
                        <?php $__currentLoopData = $most_orderd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="item">
                            <div class="card">
                              <div class="top-dealerbox text-center"><img class="card-img-top" src="<?php echo e($user->image); ?>" alt="...">
                                <h6> <?php echo e($user->name); ?></h6>
                                <p>Malasiya</p><a class="btn btn-rounded" href="social-app.html">View More</a>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>     
                  </div>
                </div>
              </div>
            </div>
          </div>
            
        <div class="col-lg-6 box-col-12 des-xl-100 top-sell-sec">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="header-top d-sm-flex justify-content-between align-items-center">
                        <h5>Top Selling Product</h5>
                    </div>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $most_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $most_sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="media mb-4"><img class="img-fluid" width="50" height="50" src="<?php echo e($most_sale->image); ?>" alt="">
                        <div class="media-body">
                            <a href="product-page.html"><h6></h6></a>
                            <p>New Offer Only </p>
                            <ul class="rating-star">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        <a class="btn btn-iconsolid" href="cart.html"><i class="icon-bag"></i></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                  <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Resent Orders</h5>
                  </div>
                  <div class="card-body">
                    <div class="user-status table-responsive">
                      <table class="table table-bordernone">
                        <thead>
                          <tr>
                            <th scope="col">Order Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
        <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                  <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Product Deficiencies</h5>
                  </div>
                  
                  <div class="card-body">
                    <div class="user-status table-responsive">
                      <table class="table table-bordernone">
                        <thead>
                          <tr>
                            <th scope="col">Details</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Available</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $shortages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td class="f-w-600">
                             <?php echo e($shortage->name_ar); ?>

                            </td>
                            <td><?php echo e($shortage->quantity); ?></td>
                            <td class="font-primary"><?php echo e(($shortage->available==1)?"available": "not available"); ?></td>
                            <td>
                              <div
                                class="span badge rounded-pill pill-badge-secondary"
                              >
                                <?php echo e($shortage->price); ?>

                              </div>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/datepicker/daterange-picker/daterange-picker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
<script>
    $('#owl-carousel-14').owlCarousel({
            items:4,
            margin:10,
            autoHeight:true,
            nav: false
        }),
</script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.default-layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/admin/index.blade.php ENDPATH**/ ?>