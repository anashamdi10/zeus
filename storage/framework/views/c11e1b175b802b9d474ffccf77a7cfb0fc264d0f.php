<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>" <?php if(App::getLocale() == 'en'): ?>dir="ltr"<?php else: ?> dir="rtl" <?php endif; ?> style="--theme-deafult:#3a9aa8; --theme-secondary:#984ff3;">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities. laravel/framework: ^8.40">
        <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
          
        <!-- Datepicker css start-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/daterange-picker.css')); ?>">
        <!-- Datepicker css end-->
        
        <!-- Font Awesome-->
        <?php if ($__env->exists('layouts.default-layout.partials.css')) echo $__env->make('layouts.default-layout.partials.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body class="<?php if(App::getLocale() == 'en'): ?>ltr <?php else: ?> rtl <?php endif; ?>">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <!-- Page Header Start-->
<?php if ($__env->exists('layouts.default-layout.partials.header')) echo $__env->make('layouts.default-layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Page Header Ends -->
  <!-- Page Body Start-->
  <div class="page-body-wrapper sidebar-icon">
    <!-- Page Sidebar Start-->
  <?php if ($__env->exists('layouts.default-layout.partials.sidebar')) echo $__env->make('layouts.default-layout.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Page Sidebar Ends-->
    <div class="page-body">
      <!-- Container-fluid starts-->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 footer-copyright">
            <p class="mb-0">Copyright <?php echo e(date('Y')); ?>-<?php echo e(date('y', strtotime('+1 year'))); ?> © viho All rights reserved.</p>
          </div>
          <div class="col-md-6">
            <p class="pull-right mb-0">Hand crafted & made withsss <i class="fa fa-heart font-secondary"></i></p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<!-- latest jquery-->
<script type="text/javascript">
    // localStorage.clear();
    var div = document.querySelector("div.page-wrapper")
    if(div.classList.contains('compact-sidebar')){
        div.classList.remove("compact-sidebar");
    }
    if(div.classList.contains('modern-sidebar')){
        div.classList.remove("modern-sidebar");
    }
    localStorage.setItem('page-wrapper', 'page-wrapper compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
</script>

<?php if ($__env->exists('layouts.default-layout.partials.js')) echo $__env->make('layouts.default-layout.partials.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH /home/s2758queo60r/zeus-ex.com/resources/views/layouts/default-layout/master.blade.php ENDPATH**/ ?>