<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3"><?php echo e(translate('All City')); ?></h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6"><?php echo e(translate('City')); ?></h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th><?php echo e(translate('Name')); ?></th>
							<th class="text-right"><?php echo e(translate('Options')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($attribute->name); ?></td>
								<td class="text-right">
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('city.edit', ['id'=>$attribute->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>">
										<i class="las la-edit"></i>
									</a>
									<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('city.destroy', $attribute->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
										<i class="las la-trash"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
					<h5 class="mb-0 h6"><?php echo e(translate('Add New City')); ?></h5>
			</div>
			<div class="card-body">
					<form action="<?php echo e(route('city.store')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<div class="form-group mb-3">
									<label for="name"><?php echo e(translate('Name')); ?></label>
									<input type="text" placeholder="<?php echo e(translate('Name')); ?>" id="name" name="name" class="form-control" required>
							</div>
							<div class="form-group mb-3 text-right">
									<button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
							</div>
					</form>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/product/city/index.blade.php ENDPATH**/ ?>