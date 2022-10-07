<?php $__env->startSection('content'); ?>

 <?php
        $order_details = $order->orderDetails->first();
        $status = $order_details->delivery_status;
        
       
    ?>
   
    <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="">
                        <div class="card-body">
                            <div class="text-center py-4 mb-4">
                                <i class="la la-check-circle la-3x text-success mb-3"></i>
                                <h1 class="h3 mb-3 fw-600"><?php echo e(translate('Thank You for Your Order!')); ?></h1>
                                <h2 class="h5"><?php echo e(translate('Order Code:')); ?> <span class="fw-700 text-primary"><?php echo e($order->code); ?></span></h2>
                                <p class="opacity-70 font-italic"><?php echo e(translate('A copy or your order summary has been sent to')); ?> <?php echo e(json_decode($order->shipping_address)->email); ?></p>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Summary')); ?></h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Order Code')); ?>:</td>
                                                <td><?php echo e($order->code); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Name')); ?>:</td>
                                                <td><?php echo e(json_decode($order->shipping_address)->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Shipping address')); ?>:</td>
                                                <td><?php echo e(json_decode($order->shipping_address)->address); ?>, <?php echo e(json_decode($order->shipping_address)->city); ?>, <?php echo e(json_decode($order->shipping_address)->country); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Order date')); ?>:</td>
                                                <td><?php echo e(date('d-m-Y H:i A', $order->date)); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600"><?php echo e(translate('Order status')); ?>:</td>
                                                <td><?php echo e(ucfirst(str_replace('_', ' ', $status))); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Details')); ?></h5>
                                <div>
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width="30%"><?php echo e(translate('Product')); ?></th>
                                                <th><?php echo e(translate('Quantity')); ?></th>
                                                <th class="text-right"><?php echo e(translate('Pints')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td>
                                                        <?php if($orderDetail->ecom_product != null): ?>
                                                            <a href="<?php echo e(route('products.details', $orderDetail->ecom_product->slug)); ?>" target="_blank" class="text-reset">
                                                                <?php echo e($orderDetail->ecom_product->getTranslation('name')); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($orderDetail->quantity); ?>

                                                    </td>
                                                    <td class="text-right"><?php echo e($orderDetail->points); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/order_confirm.blade.php ENDPATH**/ ?>