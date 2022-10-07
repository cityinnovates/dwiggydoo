<?php $__env->startSection('title','All Pages'); ?>
<?php $__env->startSection('content'); ?>
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3"><?php echo e(translate('Website Slider')); ?></h1>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h6 class="mb-0 fw-600"><?php echo e(translate('All Slider')); ?></h6>
		<a href="<?php echo e(route('sliders.create')); ?>" class="btn btn-primary"><?php echo e(translate('Add New')); ?></a>
	</div>
	<div class="card-body">
		<table class="table aiz-table mb-0">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo e(translate('Page Name')); ?></th>
					<th data-breakpoints="md"><?php echo e(translate('Title')); ?></th>
					<th class="text-right"><?php echo e(translate('Actions')); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = App\Models\PageSlider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($key+2); ?></td>
					<td><?php echo e($slider->page_name); ?></td>
					<td><?php echo e($slider->title); ?></td>
					<td class="text-right">
						<a href="<?php echo e(route('sliders.edit', $slider->id)); ?>" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">
							<i class="las la-pen"></i>
						</a>
						<a href="#" class="btn btn-soft-danger btnslidern btn-circle btn-sm confirm-delete" data-href="" title="<?php echo e(translate('Delete')); ?>">
							<i class="las la-trash"></i>
						</a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/sliders/index.blade.php ENDPATH**/ ?>