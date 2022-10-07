<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        
        <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
        	<?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
        	    <div class="contes" style="padding: 20px;">
                    <p><b>Dwiggy Doo Terms Of Uses</b></p>
                    <div class="intro">
                        <p>Introduction</p>
                    </div><br>
                    <?php 
                        $content = \App\Page::where('id', 20)->first(); 
                        $data = $content->content;
                        if($data != null) {
                            echo htmlspecialchars_decode($data);
                        }
                    ?>
                    
                </div>
		</div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/terms_of_uses.blade.php ENDPATH**/ ?>