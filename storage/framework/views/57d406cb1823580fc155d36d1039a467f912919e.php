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
                <div class="contentforhelps">
                    <P><b>How To Earn More Points?</b></P>
                    <ul>
                        <?php if(get_setting('earn_points_point') != null): ?>
                            <?php $__currentLoopData = json_decode(get_setting('earn_points_point'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="bhulk" style="font-size: 14px; margin: 15px; padding: 20px;">
                                &nbsp; &nbsp; &nbsp; &nbsp; <?php echo e(json_decode(get_setting('earn_points_name'), true)[$key]); ?><span style="float: right;"><i class="fa-solid fa-coins"></i> <?php echo e(json_decode(get_setting('earn_points_point'), true)[$key]); ?></span>
                            </li>
                            <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </ul>
                </div>
		</div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_help_support.blade.php ENDPATH**/ ?>