<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6"><?php echo e(translate('Brand Information')); ?></h5>
</div>

<div class="col-lg-12 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            <ul class="nav nav-tabs nav-fill border-light">
  				<?php $__currentLoopData = \App\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  					<li class="nav-item">
  						<a class="nav-link text-reset <?php if($language->code == $lang): ?> active <?php else: ?> bg-soft-dark border-light border-left-0 <?php endif; ?> py-3" href="<?php echo e(route('brands.edit', ['id'=>$brand->id, 'lang'=> $language->code] )); ?>">
  							<img src="<?php echo e(static_asset('assets/img/flags/'.$language->code.'.png')); ?>" height="11" class="mr-1">
  							<span><?php echo e($language->name); ?></span>
  						</a>
  					</li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  			</ul>
            <form class="p-4" action="<?php echo e(route('ecom_brands.update', $brand->id)); ?>" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="lang" value="<?php echo e($lang); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name"><?php echo e(translate('Name')); ?> <i class="las la-language text-danger" title="<?php echo e(translate('Translatable')); ?>"></i></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" value="<?php echo e($brand->getTranslation('name', $lang)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail"><?php echo e(translate('Logo')); ?> <small>(<?php echo e(translate('120x80')); ?>)</small></label>
                    <div class="col-md-9">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                            </div>
                            <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                            <input type="hidden" name="logo" value="<?php echo e($brand->logo); ?>" class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label"><?php echo e(translate('Meta Title')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="meta_title" value="<?php echo e($brand->meta_title); ?>" placeholder="<?php echo e(translate('Meta Title')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label"><?php echo e(translate('Meta Description')); ?></label>
                    <div class="col-sm-9">
                        <textarea name="meta_description" rows="8" class="form-control"><?php echo e($brand->meta_description); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name"><?php echo e(translate('Slug')); ?></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="<?php echo e(translate('Slug')); ?>" id="slug" name="slug" value="<?php echo e($brand->slug); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/ecom_product/brands/edit.blade.php ENDPATH**/ ?>