<?php $__env->startSection('content'); ?>
   <section class="login_page p-0">
    <div class="container-fluid px-lg-0">
        <div class="row no-gutters">
            <div class="col-lg-6"><img src="<?php echo e(asset('assets/images/login_image.jpg')); ?>" class="img-fluid w-100 h-100 object-cover" /></div>
            <div class="col-lg-6 align-self-center col-md-6 col-sm-8">
                <div class="px-lg-5 py-5 login-content billing-form">
                    <div class="categ-title mb-4"><h3>Login</h3></div>
<?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-danger"><?php echo e($message['message']); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <form action="<?php echo e(route('login')); ?>" method="POST">
					<?php echo csrf_field(); ?>
                        <div class="form-group"><label>Username</label>
						<input type="text" class="form-control rounded-0" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email"/>
						<?php if($errors->has('email')): ?><span class="form_validation_error"><strong><?php echo e($errors->first('email')); ?></strong></span> <?php endif; ?>
						</div>
                        <div class="form-group"><label>Password</label>
						<input type="password" class="form-control rounded-0" placeholder="<?php echo e(translate('Password')); ?>" name="password" id="password" />
						<?php if($errors->has('email')): ?><span class="form_validation_error"><strong><?php echo e($errors->first('password')); ?></strong></span> <?php endif; ?>
						</div>
                        <div class="form-row mt-4 pt-lg-1 align-items-center justify-content-between">
                            <button type="submit" style="background: #008bb7;color: white;" class="red-btn text-center text-uppercase">Login</button>
							<!-- <a href="<?php echo e(route('password.request')); ?>" class="forgot_password">Forgot Password?</a> -->
                        </div>
                    </form>
                    <div class="dont_have_account mt-5">
                        <!-- <p class="mb-0">Don’t have an account? <a href="<?php echo e(route('user.registration')); ?>">Create an Account</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user_login.blade.php ENDPATH**/ ?>