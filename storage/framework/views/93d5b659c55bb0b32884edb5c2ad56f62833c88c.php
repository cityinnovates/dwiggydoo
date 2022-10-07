<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">

<style type="text/css">
	.user_has_plan .detaiks{background-color: #58bed7;    border: 1px solid #58bed7;}
	.user_has_plan .detaiks hr{background-color: #8adef3 !important;}
	.user_has_plan .boxdesign{border: 1px solid #58bed7;}
	.user_has_plan .dd_form_btn button{background-color: #93daeb !important;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
          <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
        	 <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
                <div class="contentforhelps">
					<?php 
						$packages = DB::table('jp_pricing')->where('pr_status', 1)->get();
						$page_content = DB::table('pages')->where('id', 18)->get();
					?>

					<?php if(is_array($packages) || (count($packages) > 0)): ?>

					<?php  $i = 0;  ?>
					<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php  $i++; ?>

                    <div class="boxdesign">
                        <div class="detaiks">
                            <h1 class="fntsi20"><b><?php echo e($value->pr_name); ?></b></h1>
                            <hr style="background-color: #D4D4D4;">
                            <div class="row">
                                <div class="col ">
                                    <ul style="list-style-type: none;">
                                        <li><i class="fa-solid fa-check"></i> Validity : <?= $value->pr_type != 1 ? $value->pr_limit.' Year' : $value->pr_limit.' Months' ; ?></li>
                                        <li><i class="fa-solid fa-check"></i> Price : <?php echo e($value->pr_orginal); ?></li>
                                    </ul>
                                </div>
                                <div class="col ">
                                	<ul style="list-style-type: none;">
                                        <li> <i class="fa-solid fa-check"></i> Offer Price : <?php echo e($value->pr_offer); ?></li>
                                        <li> <i class="fa-solid fa-check"></i> Package Type : <?= $value->pr_type == 1 ? 'Monthly' : 'Annual' ; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="conterfroda">
                        	<?php if(Auth::check()): ?>
                            <div class="row">
                                <div class="col">
                                    <h1 class="fntsi20"><b><?php echo e($value->pr_orginal); ?> INR</b></h1>
                                    <p>/ <?= $value->pr_type != 1 ? $value->pr_limit.' Year' : $value->pr_limit.' Months' ; ?></p>
                                </div>
                                <div class="col" style="">
									<div class="package_btn">
										<div class="dd_form_btn text-center">
										  	<button  style="background-color: #ef9e91;" type="submit" class="btn my-4 f-medium bg-f3 color-fff" <?php if(Session::get('is_plan_active') == 1): ?> disabled <?php endif; ?> onclick="payment_pack(<?php echo e($value->pr_offer); ?>, <?php echo e($value->pr_id); ?>)"><?php if(Session::get('active_plan_id') == $value->pr_id): ?> Activated <?php else: ?> CHOOSE PLAN <?php endif; ?></button>
										  </div>
									</div>
								</div>
                            </div>
							<?php endif; ?>

                        </div>
                    </div><br>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<form class="" id="plan_payment_form" action="<?php echo e(route('plan.purchase')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="plan_price">
						<input type="hidden" name="package_id">
					</form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript">
    	function payment_pack(price, id){
			 $('input[name=plan_price]').val(price);
			 $('input[name=package_id]').val(id);
	         $('#plan_payment_form').submit();
		}
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_plan.blade.php ENDPATH**/ ?>