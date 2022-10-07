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
                
                <div class="cardcoupon" style="margin: 20px;">
                    <div class="row">
                        <div class="col">
                            <p style="color: black"><b>Your Orders</b></p>
                        </div>
                        <div class="col">
                            <form action="" id="filter-form" method="get">
                                <div style="float:right;" class="sdsda dd_search d-flex align-items-center">
                                    <label class="f-15 gotham-medium mb-0 color-70 fgty">Sort by</label>
                                    <select class="form-control srch-form px-4 bdr-rdius24 gotham-book " style="width: 170px;" name="sort_by" onchange="filter()">
                                         <option value="newest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>

                                        <option value="oldest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $details = App\Models\EcomOrderDetail::where('order_id', $order->id)->first();
                    ?>
                    <div class="cardfrodash">
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 15px;"> Order Placed: <?php echo e(date('d-m-Y H:i A', $order->date)); ?></p>

                            </div>
                            <div class="col">
                                <a style="float: right;" href="<?php echo e(route('user.orders_details', $order->id)); ?>"><b>View Details</b></a>
                            </div>
                        </div>
                        <hr style="width: 102.5%; margin-left: -10px;">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?php echo e(uploaded_asset($details->ecom_product->thumbnail_img)); ?>" alt="" class="dodo">
                            </div>
                            <div class="col-9">
                                <div class="infoer ">
                                    <p style="color: grey;"><b><?php echo e($details->ecom_product->getTranslation('name')); ?></b></p><?php echo substr($details->ecom_product->description, 0, 350); ?>...
                                    <br>
                                    <br>
                                    <a href="<?php echo e(route('products.details', $details->ecom_product->slug)); ?>">
                                        <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:#F3735F; color: white; border-radius: 25px;">Redeem Again</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 102.5%; margin-left: -10px;">
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 15px;">Purchased Dwiggy Coin: <b><?php echo e($details->points); ?></b></p>
                            </div><!-- 
                            <div class="col">
                                <div class="comtetr" style="float: right;">
                                    <p style="color: #F3735F;"><b>Write Review</b></p>
                                </div>
                                <div class="rating" style="float: right; margin-top: -12px;">

                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                </div>

                            </div> -->
                        </div>
                    </div><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/user_order.blade.php ENDPATH**/ ?>