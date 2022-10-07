<?php $__env->startSection('title','All Home Slider'); ?>

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="row align-items-center">

		<div class="col">

			<h1 class="h3"><?php echo e(translate('Website Home Slider')); ?></h1>

		</div>

	</div>

</div>



<div class="card">

	<div class="card-header">

		<h6 class="mb-0 fw-600"><?php echo e(translate('All Home Slider')); ?></h6>

		<a href="<?php echo e(route('custom-pages.homecreateslider')); ?>" class="btn btn-primary"><?php echo e(translate('Add New Home Slider')); ?></a>

	</div>

	<div class="card-body">

		<table class="table aiz-table mb-0">

        <thead>

            <tr>

                <th>#</th>

                <th><?php echo e(translate('Name')); ?></th>

               

                <th class="text-right"><?php echo e(translate('Actions')); ?></th>

            </tr>

        </thead>

        <tbody>

        <?php  	$blog = DB::table('homeslider')->get();
   ?>
<?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

        	<tr>

        		<td><?php echo e($key+2); ?></td>

        		<td><a href="<?php echo e(route('custom-pages.show_custom_homepageslider', $page->slug)); ?>" class="text-reset"><?php echo e($page->title); ?></a></td>

        	
        		<td class="text-right">

								<?php if($page->type == 'admin'): ?>

									<a href="<?php echo e(route('custom-pages.homeeditslider', ['id'=>$page->id, 'lang'=>env('DEFAULT_LANGUAGE'), 'page'=>'home'] )); ?>" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">

										<i class="las la-pen"></i>

									</a>

								<?php else: ?>

	          			<a href="<?php echo e(route('custom-pages.blogeditslider', ['id'=>$page->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">

	    							<i class="las la-pen"></i>

	    						</a>

								<?php endif; ?>

								<?php if($page->type == 'admin'): ?>

          				<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('custom-pages.homedestroyslider', $page->id)); ?> " title="<?php echo e(translate('Delete')); ?>">

          					<i class="las la-trash"></i>

          				</a>

								<?php endif; ?>

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


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/website_settings/pages/homeindexslider.blade.php ENDPATH**/ ?>