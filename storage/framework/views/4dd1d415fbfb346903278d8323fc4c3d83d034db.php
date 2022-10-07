<?php $__env->startSection('content'); ?>
<section class="banner">
	<div class="container-fluid pr-0 pl-0">
		<div class="owl-carousel owl-theme">
			<?php  foreach ($blogss as $key => $value) {  ?>
			<div class="banner-index index-1 achive" style="background-size: cover!important;background: url(<?php echo e(uploaded_asset($value->banner_image)); ?>) center 0 no-repeat;">
				<div class="container">
					<div class="row ">
						<div class="col-lg-7">
							<div class="banner-cnt pl-0">
								<h1 class="head-cnt f-40 f-bold color-fff mb-4"><?=ucwords($value->title)?></h1>
								<div class="head-p f-18 f-medium color-fff mb-5">
									<?=ucwords($value->content)?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  }   ?>
		</div>
	</div>
</section>

<section class="pt-5 achieve_cards mb-5 pb-5">
	<div class="container">
		<div class="row">
			
				<?php  foreach ($blogs as $key => $value) {  ?>
					<div class="col-4">
					   <a href="https://dwiggydoo.com/blogsdetails/<?php echo e($value->id); ?>"> <img src="<?php echo e(uploaded_asset($value->banner_image)); ?>" class="card-img-top img-fluid" alt="<?=ucwords($value->title)?>"></a>
					    <div class="card-body">
					       <p class="card-text"><small class="text-muted f-16 f-medium"><?=date('d-m-Y',strtotime($value->created_at))?></small></p>
					       <a href="https://dwiggydoo.com/blogsdetails/<?php echo e($value->id); ?>" class="d-block card-title f-18 color-f3 f-sbold"><?=ucwords($value->title)?></a>
					      <!-- <h5 class="card-title f-18 color-blue f-sbold">The dating sites helping you and your dog to find the perfect match</h5> -->
					    </div>
					</div>
				<?php  }   ?>

			</div>
		</div>
		<div class="dd_form_btn text-center col-12">
			<div class="row" style="float:right">
				<div class="col-12">
					<?php  echo $blogs->links()?>
				</div>
			</div>
		 </div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/all-blogs.blade.php ENDPATH**/ ?>