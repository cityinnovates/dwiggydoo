<?php $__env->startSection('content'); ?>



    <div class="aiz-titlebar text-left mt-2 mb-3">

    	<div class="row align-items-center">

    		<div class="col">

    			<h1 class="h3"><?php echo e(translate('Website Others')); ?></h1>

    		</div>

    	</div>

    </div>



    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"><?php echo e(translate('Others Widget')); ?></h6>
    	</div>

    	<div class="card-body">

    		<div class="row gutters-10">

    			<div class="col-lg-12">

    				<div class="card shadow-none bg-light">


    					<div class="card-body">

    						<form action="<?php echo e(route('business_settings.update')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <div class="form-group">

                                <label><?php echo e(translate('Photos & Links')); ?></label>

                                <div class="others-target">
                                    <?php if(get_setting('earn_points_point') != null): ?>

                                        <?php $__currentLoopData = json_decode(get_setting('earn_points_point'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="row gutters-5">

                                                <div class="col-8">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_name">

                                                        <input type="text" class="form-control" placeholder="Heading" name="earn_points_name[]" value="<?php echo e(json_decode(get_setting('earn_points_name'), true)[$key]); ?>">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_point">

                                                        <input type="text" class="form-control" placeholder="Points" name="earn_points_point[]" value="<?php echo e(json_decode(get_setting('earn_points_point'), true)[$key]); ?>">

                                                    </div>

                                                </div>

                                                <div class="col-10">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_link">

                                                        <input type="text" class="form-control" placeholder="Links" name="earn_points_link[]" value="<?php echo e(json_decode(get_setting('earn_points_link'), true)[$key]); ?>">

                                                    </div>

                                                </div>

                                                <div class="col-auto">

                                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

                                                        <i class="las la-times"></i>

                                                    </button>

                                                </div>

                                            </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>

                                </div>

                                <button

                                    type="button"

                                    class="btn btn-soft-secondary btn-sm"

                                    data-toggle="add-more"

                                    data-content='
                                            <div class="row gutters-5">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_name">
                                                        <input type="text" class="form-control" placeholder="Heading" name="earn_points_name[]" value="<?php echo e(json_decode(get_setting('earn_points_name'), true)[$key]); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_point">
                                                        <input type="text" class="form-control" placeholder="Points" name="earn_points_point[]" value="<?php echo e(json_decode(get_setting('earn_points_point'), true)[$key]); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_link">
                                                        <input type="text" class="form-control" placeholder="Links" name="earn_points_link[]" value="<?php echo e(json_decode(get_setting('earn_points_link'), true)[$key]); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                        <i class="las la-times"></i>
                                                    </button>
                                                </div>
                                            </div>'

                                    data-target=".others-target">

                                    <?php echo e(translate('Add New')); ?>


                                </button>

                            </div>

                            <div class="text-right">

                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Update')); ?></button>

                            </div>

                        </form>

    					</div>

    				</div>

    			</div>

    		</div>

    	</div>

    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/website_settings/others.blade.php ENDPATH**/ ?>