 <!DOCTYPE html>
 <html lang="<?php echo e(App::getLocale()); ?>" <?php if(App::getLocale()=='en' ): ?>dir="ltr" <?php else: ?> dir="rtl" <?php endif; ?>>

 <head>
     
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WZ8QGFVZBJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WZ8QGFVZBJ');
</script>

   <title>Woody Factory for Wood Processing</title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('newpage/images/apple-touch-icon.png')); ?>" />
   <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('newpage/images/favicon-32x32.png')); ?>" />
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('newpage/images/favicon-16x16.png')); ?>" />
   <link rel="icon" type="image/x-icon" href="<?php echo e(asset('newpage/images/favicon.ico')); ?>" />
   <meta name="theme-color" content="#ffffff" />

   <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
   <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


   <link rel="stylesheet" href=" <?php echo e(asset('newpage/css/animate.css')); ?>" />

   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/owl.carousel.min.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/owl.theme.default.min.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/magnific-popup.css')); ?>" />

   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/aos.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/ionicons.min.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/bootstrap.min.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/bootstrap-datepicker.css')); ?>" />
   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/jquery.timepicker.css')); ?>" />

   <link rel="stylesheet" href="<?php echo e(asset('newpage/css/style.css')); ?>" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 </head>

 <body>
   <?php echo $__env->make('site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->yieldContent('content'); ?>
   <?php echo $__env->make('site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('site.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 </body>

 </html><?php /**PATH /home/rltv764kemik/woody-factory.com/resources/views/site/app.blade.php ENDPATH**/ ?>