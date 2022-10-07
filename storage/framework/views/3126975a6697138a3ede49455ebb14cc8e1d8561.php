<?php if(Auth::check()): ?>
<?php
$pack = App\Models\PlanActivated::where('user_id', Auth::user()->id)->where('active', 1)->orderBy('id', 'desc')->first();
if(!empty($pack) && $pack->active == 1){
Session::put('is_plan_active', 1);
Session::put('active_plan_id', $pack->plan_id);
}else{
Session::forget(['is_plan_active','active_plan_id']);
}

?>
<?php else: ?>
<?php
Session::forget(['is_plan_active','active_plan_id']);
?>
<?php endif; ?>

<?php if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
  $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . $location);
  exit;
}  ?>
<!DOCTYPE html>
<html>

<head>
  <title>Dwiggy-Doo</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css">
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>/css/style.css">

  <?php if(Session::get('is_plan_active') ==1): ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>/css/subscribe.css">
  <?php endif; ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>/js/main.js">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-M299454CGC"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-M299454CGC');
  </script>
  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '285903613659738');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=285903613659738&ev=PageView&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->
</head>


<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = explode('@', $actual_link);
$urls = explode('/', $actual_link);
$weburl = $urls[3];

if (count($url) > 1) {
  $mm = $url[1];
}
?>


<style type="text/css">
  #nav-icon4 span:nth-child(1) {top: 2px; -webkit-transform-origin: left center; -moz-transform-origin: left center; -o-transform-origin: left center; transform-origin: left center; } #nav-icon4 span:nth-child(2) {top: 10px; -webkit-transform-origin: left center; -moz-transform-origin: left center; -o-transform-origin: left center; transform-origin: left center; } #nav-icon4 span:nth-child(3) {top: 18px; -webkit-transform-origin: left center; -moz-transform-origin: left center; -o-transform-origin: left center; transform-origin: left center; } #nav-icon4.open span:nth-child(1) {-webkit-transform: rotate(45deg); -moz-transform: rotate(45deg); -o-transform: rotate(45deg); transform: rotate(45deg); top: 5px; left: 8px; } #nav-icon4.open span:nth-child(2) {width: 0%; opacity: 0; } #nav-icon4.open span:nth-child(3) {-webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -o-transform: rotate(-45deg); transform: rotate(-45deg); top: 26px; left: 8px; } #nav-icon4 {top: 2px; width: 40px; height: 25px; position: relative; margin: 0px auto; -webkit-transform: rotate(0deg); -moz-transform: rotate(0deg); -o-transform: rotate(0deg); transform: rotate(0deg); -webkit-transition: .5s ease-in-out; -moz-transition: .5s ease-in-out; -o-transition: .5s ease-in-out; transition: .5s ease-in-out; cursor: pointer; } #nav-icon4 span {display: block; position: absolute; height: 2px; width: 70%; background: #fff; border-radius: 9px; opacity: 1; left: 0; -webkit-transform: rotate(0deg); -moz-transform: rotate(0deg); -o-transform: rotate(0deg); transform: rotate(0deg); -webkit-transition: .25s ease-in-out; -moz-transition: .25s ease-in-out; -o-transition: .25s ease-in-out; transition: .25s ease-in-out; } #suggesstion-box {position: absolute; background: #fff; z-index: 99; left: 10px; padding: 10px 20px; width: 100%; } #product-list {list-style-type: none; } #product-list a {display: block; margin-bottom: 5px; font-size: 14px; color: #272727; transition: 0.3s; } #product-list a:hover {color: #f3735f; } .search-group .search_left {position: relative; } .search-group .search_left:after {content: ''; position: absolute; right: 10px; top: 0; height: 100%; width: 20px; background: #fff; z-index: 9; } .search-group .form-control {border-radius: 24px; }

  #dynamicBackdrop #phone {width: 100%;}

  <?php 
  if (count($url) > 1) {
    if ($url[1] == 'popup') {
  ?> 
  .modal.show {display: block;}
  <?php  
    }
  
  }
  ?>



    * { box-sizing: border-box; }

  .autocomplete {position: relative; display: inline-block; } input {border: 1px solid transparent; background-color: #f1f1f1; padding: 10px; font-size: 16px; } .search-group {overflow: visible; } .autocomplete-items {position: absolute; border: 1px solid #d4d4d4; border-bottom: none; border-top: none; z-index: 99; top: 102%; left: 17px; overflow: hidden; width: 95%; border-radius: 0 0 15px 15px; } .autocomplete-items div {padding: 10px; cursor: pointer; background-color: #fff; border-bottom: 1px solid #d4d4d4; } .autocomplete-items div:hover {background-color: #e9e9e9; } .autocomplete-active {background-color: DodgerBlue !important; color: #ffffff; } .dd_form_btn a {}

</style>
<?php echo $__env->yieldContent('header_style'); ?>

<?php if(auth()->guard()->check()): ?>
 <?php if(Auth::user()->user_type == 'customer'): ?>
<?php 
   $total_rewards = DB::table('rewards')->where('user_id', Auth::user()->id)->get()->sum('reward_point');
   $total_cr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'cr')->get()->sum('reward_point');
   $total_dr = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'dr')->get()->sum('reward_point');
?>
<?php endif; ?>
<?php endif; ?>

<body <?php if(Session::get('is_plan_active')==1): ?> class="paid_user user_has_plan" <?php endif; ?>>

  

  <?php echo $__env->make('frontend.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <?php echo $__env->yieldContent('content'); ?>


  <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('modal'); ?>

  <!-- Login Modal -->
  <?php echo $__env->make('frontend.modals.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--show rewards points-->
  <?php echo $__env->make('frontend.modals.show_rewards_points', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <!-- mames popup -->
  <div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

      <div class="mySlides">
        <div class="numbertext">1 / 1</div>
        <span id="ex2" class="zoom">
          <img src="https://dwiggydoo.com/public/uploads/all/EUvG9A3fAMI0R97B3WEvhPdtxZxSxikpIxNw3Eug.jpg" style="width:100%">
        </span>

        <div class="mames_down">
          <a href="http://www.facebook.com/sharer.php?u=https://dwiggydoo.com/public/uploads/all/EUvG9A3fAMI0R97B3WEvhPdtxZxSxikpIxNw3Eug.jpg">
            <button class="mames_down_btn share"><i class="fa fa-share" aria-hidden="true"></i> Share</button></a>
          <a class="mames_down_btn download" href="https://dwiggydoo.com/public/uploads/all/EUvG9A3fAMI0R97B3WEvhPdtxZxSxikpIxNw3Eug.jpg" download="https://dwiggydoo.com/public/uploads/all/EUvG9A3fAMI0R97B3WEvhPdtxZxSxikpIxNw3Eug.jpg">
            <i class="fa fa-download mr-2" aria-hidden="true"></i>Download
          </a>
          <!-- <button class="mames_down_btn download"><i class="fa fa-download mr-2" aria-hidden="true"></i>Download</button> -->
        </div>
      </div>

      <div class="mySlides">
        <div class="numbertext">2 / 2</div>
        <span id="ex3" class="zoom">
          <img src="https://dwiggydoo.com/public/uploads/all/z8WIkt9qgWT30LoIReqWhqMBEBoNyUyz1kDKfG7k.jpg" style="width:100%">
        </span>
        <div class="mames_down">
          <a href="http://www.facebook.com/sharer.php?u=https://dwiggydoo.com/public/uploads/all/z8WIkt9qgWT30LoIReqWhqMBEBoNyUyz1kDKfG7k.jpg"> <button class="mames_down_btn share"><i class="fa fa-share" aria-hidden="true"></i> Share</button></a>
          <a class="mames_down_btn download" href="https://dwiggydoo.com/public/uploads/all/z8WIkt9qgWT30LoIReqWhqMBEBoNyUyz1kDKfG7k.jpg" download="https://dwiggydoo.com/public/uploads/all/z8WIkt9qgWT30LoIReqWhqMBEBoNyUyz1kDKfG7k.jpg">
            <i class="fa fa-download mr-2" aria-hidden="true"></i>Download
          </a>
          <!-- <button class="mames_down_btn download"><i class="fa fa-download mr-2" aria-hidden="true"></i>Download</button> -->
        </div>
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <div class="caption-container">
        <p id="caption"></p>
      </div>
    </div>
  </div>

  <div class="dd-text1"><img src="<?php echo e(env('APP_URL')); ?>/images/text.png" class="img-fluid"></div>
  <div class="dd-text2"><img src="<?php echo e(env('APP_URL')); ?>/images/text2.png" class="img-fluid"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
  <script src="<?= route('home') ?>/js/jquery.zoom.js"></script>
  <script src="<?= route('home') ?>/js/wow.min.js"></script>
  <script src="<?= route('home') ?>/js/custom.min.js"></script>
  <script src="<?= route('home') ?>/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('#ex2').zoom({
        on: 'grab'
      });
      $('#ex3').zoom({
        on: 'grab'
      });
    });
  </script>


  <div id="flash_msg" style="position: fixed; right: 42px; bottom: 15px; z-index: 99999; display: none">

    <style type="text/css">
      #flash_msg .alert-danger {background-color: #ff6f6f; border-color: #f78686; color: #fff; } #flash_msg .alert-success {background-color: #2c7a0a; border-color: #2f7211; color: #fff; } #flash_msg .alert-info {background-color: #1d6d95; border-color: #1b89c1d1; color: #fff; } #flash_msg .alert-warning {background-color: #bb9d06; border-color: #d9b605; color: #fff; }
    </style>

    <?php echo $__env->make('frontend.alert-msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </div>



  <script>
    <?php if(Session::get('success') || Session::get('error') || Session::get('warning') || Session::get('info')): ?>

    $("#flash_msg").slideDown(300).delay(5000).slideUp(300);
    <?php endif; ?>
  </script>

  <?php echo $__env->make('frontend.inc.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php

    if (!isset(Auth::user()->id)) {
      if ($weburl != 'index' && $weburl != '' && $weburl != 'registers' && $weburl != 'login' && $weburl != 'password' && $weburl != 'registerss' && $weburl != 'regotp') {
    ?>
      <script>
        $('#dynamicBackdrop').modal('show');
      </script>
    <?php  
          }
        }
    ?>
  <?php echo $__env->yieldContent('footer_script'); ?>
</body>

</html><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>