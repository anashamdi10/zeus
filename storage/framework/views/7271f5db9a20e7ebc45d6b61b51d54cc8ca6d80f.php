<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Zeus Export</title>
  <meta content="Promoting the Global Enrichment of Lives through Nature's Abundance" name="description" />
  <meta content="" name="keywords" />
  <meta name="robots" content="follow, index" />
  <meta name="date" content="15/12/2023" />

  <!-- Favicons -->
  <link href="<?php echo e(asset('zeus/assets/img/favicon.png')); ?>" rel="icon" />
  <!-- For Facebook -->
  <meta property="og:site_name" content="Zeus-export" />
  <meta property="og:title" content="Home page of Zeus Export Website  " />
  <meta property="og:description" content="Bringing the essence of nature to your table, Zeus Export Company, a recognized supplier of high-quality fruits and
								vegetables, proudly presents a range of exquisite produce that showcases the very essence of nature....." />
  <meta property="og:type" content="blog" />
  <meta property="og:url" content="https://www.kwebby.com/blog/social-media-meta-tags" />
  <meta property="og:image" content="https://myawesomesite.com/image.jpg" />
  <!-- For fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link href="<?php echo e(asset('zeus/assets/css/style.css')); ?>" rel="stylesheet" />
  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('zeus/assets/vendor/aos/aos.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('zeus/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('zeus/assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Template Main CSS File -->
</head>

<body>


  <!-- ======= Hero Section ======= -->
  <?php echo $__env->yieldContent('content'); ?>
  <!-- End Hero -->

  <!-- End #main -->

  <!-- ======= Footer ======= -->


  <!-- End Footer -->

  <?php echo $__env->yieldContent('footer'); ?>

  

  <?php echo $__env->make('site.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Vendor JS Files -->


  <!-- Template Main JS File -->
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\zeus-website\resources\views/site/app.blade.php ENDPATH**/ ?>