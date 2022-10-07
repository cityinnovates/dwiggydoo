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
                   
                <div class="rewardpp">
                    <h1 style="color: #58bed7; font-size: 30px; text-align: center;" class=" justify-content-center">  <i class="fa-solid fa-coins  "></i> <?php echo e($total_cr); ?><br><span style="font-size: 20px;">REDEEMABLE  POINTS</span></h1>
                    <div class="row">
                        <div class="col"><div class="dd_form_btn text-center col-12">
                            <button type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium"> <i class="fa-solid fa-coins"></i>  <?php echo e($total_rewards); ?><br><span>Total POINTS</span></button>
                        </div></div>
                        <div class="col"><div class="dd_form_btn text-center col-12">
                            <button type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium"> <i class="fa-solid fa-coins"></i>  <?php echo e($total_dr); ?><br><span>Used Points</span></button>
                        </div></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><p style="color: black"><b>All Transaction</b></p></div>
                    <div class="col">
                        <form action="" id="filter-form" method="get">
                            <div style="float:right;" class="sdsda dd_search d-flex align-items-center">
                                <label class="f-15 gotham-medium mr-4 mb-0 color-70">Sort by</label>
                                <select class="form-control srch-form px-4 bdr-rdius24 gotham-book " style="width: 170px;" name="sort_by" onchange="filter()">
                                     <option value="newest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>

                                    <option value="oldest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(count($rewards) > 0): ?>
                <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="row meff">
                    <div class="col">
                        <?php if($value->type == 'cr'): ?>
                            <img SRC="<?php echo e(route('home')); ?>/images/onearrow.png"> <b>Received </b><br>
                        <?php else: ?>
                            <img SRC="<?php echo e(route('home')); ?>/images/spent.png"> <b>Spent </b><br>
                        <?php endif; ?>
                         <span class="hut" style="margin-left: 40px; margin-top: -12px; position: absolute;"><?php echo e($value->reward_type); ?> </span>
                    </div>
                    <div class="col">
                        <div class="righttree">
                            <b> 
                            <?php if($value->type == 'cr'): ?>
                                + <i class="fa-solid fa-coins dashicon" style="height: 20px;"></i>
                            <?php else: ?>
                                - <i class="fa-solid fa-coins dashicon" style="height: 20px;"></i>
                            <?php endif; ?>
                          <?php echo e($value->reward_point); ?></b>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php echo e($rewards->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_script'); ?>
    <script type="text/javascript">

        function filter(){
            $('#filter-form').submit();

        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/redeem.blade.php ENDPATH**/ ?>