<?php $__env->startSection('content'); ?>

<div class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                <div class="bg-white rounded shadow-sm p-4 text-left">
                    <h1 class="h3 fw-600"><?php echo e(translate('Forgot Password?')); ?></h1>
                    <p class="mb-4 opacity-60"><?php echo e(translate('Enter your email address to recover your password.===')); ?> </p>
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <?php if(\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated): ?>
                                <input id="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required placeholder="<?php echo e(translate('Email or Phone')); ?>">
                            <?php else: ?>
                                <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email" required>
                            <?php endif; ?>

                            <?php if($errors->has('email')): ?>								<strong><?php echo e($errors->first('email')); ?></strong>
                            <?php endif; ?>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" type="submit" style="background-color: #f3735f;border-color: #f3735f;">
                                <?php echo e(translate('Send Password Reset Link')); ?>

                            </button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <a href="<?php echo e(route('login')); ?>"   class="text-reset opacity-60"><?php echo e(translate('Back to Login')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>