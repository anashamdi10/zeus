
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="hero-wrap hero-bread" style="background-image: url(<?php echo e(asset('newpage/images/bg_1.jpg')); ?>)">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span>
        </p>
        <h1 class="mb-0 bread">Contact us</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-4 d-flex">
        <div class="info p-4">
          <i class="bx bx-current-location"></i>

          <p><span>|| </span><a href=""> New Damietta, the first phase, behind the Investors Association, in front of Al-Taawoun Gasoline</a></p>

          <p><span>|| </span><a href="">Gamasa Industrial Zone, First Phase, Block K </a></p>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="info p-4">
          <i class="bx bx-current-location"></i>
          <p><span>|| </span><a href="tel:+201011337556">+201011337556</a></p>
          <p><span>|| </span><a href="tel:+2001001383256">+2001001383256</a></p>
          <p><span>|| </span><a href="tel:+201223741954">+201223741954</a></p>
          <p><span>|| </span><a href="tel:+201115131319">+201115131319</a></p>
        </div>
      </div>
      <div class="col-md-4 d-flex">
        <div class="info p-4">
          <i class="bx bx-current-location"></i>
          <p><span>|| </span><a href="mailto:info@woody-factory.com">info@woody-factory.com</a></p>
          <p><span>|| </span><a href="mailto:Helo@woody-factory.com">Hello@woody-factory.com</a></p>
        </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-12 order-md-last d-flex">
        <form action="<?php echo e(route('contact_us.store')); ?>" class="bg-white p-5 contact-form" method="post">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name" name='name' id='name' />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" name='email' id='email' />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="subject" name='subject' id='Subject' />
          </div>
          <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" />
          </div>
        </form>


      </div>

      <?php if($error == 'false'): ?>
      <div class="alert alert-danger  alert-dismissible fade show" role="alert">
        faile send your message

      </div>
      <?php elseif($error == 'true'): ?>
      <div class="alert alert-success  alert-dismissible fade show" role="alert">
        send tour message complete
      </div>
      <?php elseif($error == 'anas'): ?>
      <div></div>
      <?php endif; ?>

      <div class="col-md-6 d-flex">
        <div id="map" class="bg-white"></div>
      </div>
    </div>
  </div>


</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('jsCode'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('site.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\well_know\resources\views/site/pages/contact-us.blade.php ENDPATH**/ ?>