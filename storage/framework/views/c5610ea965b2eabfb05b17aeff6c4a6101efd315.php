  <?php if(get_setting('home_footer_images') != null): ?>

  <section style="margin-top: 100px">
    <div class="container" id="res" style="margin-top: -100px; position: absolute; margin-left: 100px;">
      <div class="row">
        <?php $__currentLoopData = json_decode(get_setting('home_footer_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"><img src="<?php echo e(uploaded_asset(json_decode(get_setting('home_footer_images'), true)[$key])); ?>" alt=""></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>

  <?php endif; ?>

<footer class="pt-1">
  <div class="footer py-5"> 
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
         <h4 class="mb-2 pb-1 " style="color: white">Customer Service</h4>
         <ul class="list-unstyled quick_linkks mb-0">
          <li><a href="<?php echo e(route('contact-us')); ?>" class="nav-link" style="color: white">Contact Us</a></li>
          <li><a href="<?php echo e(route('term')); ?>" class="nav-link" style="color: white">Terms</a></li>
          <li><a href="<?php echo e(route('privacy')); ?>" class="nav-link" style="color: white">Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h4 class="mb-2 pb-1 " style="color: white"> Corporate</h4>
        <ul class="list-unstyled quick_linkks mb-0">
         <li><a href="<?php echo e(route('aboutus')); ?>" class="nav-link" style="color: white ;" >About Us</a></li>
         <li><a href="<?php echo e(route('plans.plan_lists')); ?>" class="nav-link" style="color: white">Subscription</a></li>

       </ul>
     </div>
    <div class="col-md-4 mb-4">
      <h4 class="mb-2 pb-1 " style="color: white">Keep In Touch</h4>
      <div class="footer-contact"> 
        <p style="color: white">Email : <a href="#" style="color: white"> Info@dwiggydoo.com</a></p>
        <div class="dd_social_icons">
            <!-- <img src="images/icons/Group_90.svg"> -->
            <?php if( get_setting('facebook_link') !=  null ): ?>
            <a href="<?php echo e(get_setting('facebook_link')); ?>" style="display: inline-block;margin-right: 10px"><img src="<?php echo e(route('home')); ?>/images/icons/facbook.png"></a>
            <?php endif; ?>

            <?php if( get_setting('twitter_link') !=  null ): ?>
            <a href="<?php echo e(get_setting('twitter_link')); ?>" style="display: inline-block;margin-right: 10px"><img src="<?php echo e(route('home')); ?>/images/icons/twitter.png"></a>
            <?php endif; ?>

            <?php if( get_setting('instagram_link') !=  null ): ?>
            <a href="<?php echo e(get_setting('instagram_link')); ?>" style="display: inline-block;margin-right: 10px"><img src="<?php echo e(route('home')); ?>/images/icons/instagram.png"></a>
            <?php endif; ?>

            <?php if( get_setting('youtube_link') !=  null ): ?>
            <a href="<?php echo e(get_setting('youtube_link')); ?>" style="display: inline-block;margin-right: 10px"><img src="<?php echo e(route('home')); ?>/images/icons/youtube.png"></a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="copyright text-white text-center p-2">
  <div class="container">
    <div class="copyrihgt-text">
     <?php
        echo get_setting('frontend_copyright_text');
    ?>
   </div>
 </div>
</div>
</footer>
<?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/inc/footer.blade.php ENDPATH**/ ?>