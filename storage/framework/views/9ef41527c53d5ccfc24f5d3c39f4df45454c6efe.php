<?php $__env->startSection('content'); ?>

<section class="banner about_us">
	<div class="container-fluid pr-0 pl-0">
		<div class="banner-index index-1" style="background: url(<?php echo e(static_asset($file_name)); ?>)">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="banner-cnt">
							<h1 class="head-cnt f-40 f-bold color-27 mb-4"><?php echo e($about->title); ?></h1>
							<p class="head-p f-18 f-medium color-27 mb-5">
								<?php echo e($about->description); ?>

							</p>
						</div>
						
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<section class="py-md-5 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="row" >
					<div class="col" ><img class="fourdog" src="<?php echo e(uploaded_asset(get_setting('about_me_small_image1'))); ?>"  /></div>
					<div class="col"><img src="<?php echo e(uploaded_asset(get_setting('about_me_small_image2'))); ?>" style="background-color: #EAEAEA; border-radius: 100px;" /></div>
					<div class="col"><img src="<?php echo e(uploaded_asset(get_setting('about_me_small_image3'))); ?>"  style="background-color: #EAEAEA; border-radius: 100px;"/></div>
					<div class="col"><img class="fourdog" src="<?php echo e(uploaded_asset(get_setting('about_me_small_image4'))); ?>" 	 /></div>

				</div>
				<img src="<?php echo e(uploaded_asset(get_setting('about_me_big_image'))); ?>" class="path-523"/>
			
			</div>
			<div class="col-lg-6 col-md-6">
				<?=$about->content?>
			</div>
		</div>
	</div>
</section>
<section class="mt-5 dd_journy">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="dd_head f-40 color-27 f-bold mb-b text-center">Let me show how the Journey started...</h2>
			</div>
		</div>
		<?php if(get_setting('about_slider_images') != null): ?>
			<?php $i = 0; ?>

			<?php $__currentLoopData = json_decode(get_setting('about_slider_images'), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php 

				$i++; 
				$dec  =  json_decode(get_setting('about_slider_text2'), true)[$key];
				?>
				
				<?php if($i%2 == 1): ?>
				<div class="row">
					<div class="column" style="background-color: #373737; ">
						<div class="f-16 f-medium" style="color: white; margin: 25px;">
							<?= htmlspecialchars_decode($dec) ?>
						</div>

					</div>
					<div class="column">
						<img src="<?php echo e(uploaded_asset(json_decode(get_setting('about_slider_images'), true)[$key])); ?>" >
					</div>
				</div>
				<?php else: ?>

				<div class="row">
					<div class="column" >
						<img  src="<?php echo e(uploaded_asset(json_decode(get_setting('about_slider_images'), true)[$key])); ?>" style="width: 101%" >
					</div>
					<div class="column bgforab" style="background: url(<?php echo e(static_asset('uploads/all/SjFCUviQJ4BP0Cfq9olI1rOljpGbGCgHzqzYJp5u.png')); ?>);background-color: #F3735F;">
						<div class="f-16 f-medium" style="color: white; margin: 25px;">
							<?= htmlspecialchars_decode($dec) ?>
						</div>
					</div>
				</div>

				<?php endif; ?>
					

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

	</div>
</section>
<section class="pt-5 my-5">
	<div class="container">
		<div class="dd_middle d-flex w-100 justify-content-between">
			<div class="dd_middle_box d-flex align-items-center mr-md-5 mb-5">
				<div class="dd_middle_img mr-md-4"><img src="<?php echo e(static_asset('uploads/all/7lgloUSdsQQIlebXHRLn4tsXcfLPaUKhDxcxQ8XO.png')); ?>"></div>
				<div class="dd_middle_cnt">
					<strong class="color-f3 f-65 f-bold mb-md-4 mr-1">300+</strong>
					<h2 class="color-f3 dd_head f-35 color-27 f-bold mb-0">Breeds</h2>
				</div>
			</div>
			<div class="dd_middle_box d-flex align-items-center mr-lg-5 mb-5">
				<div class="dd_middle_img mr-md-4"><img src="<?php echo e(static_asset('uploads/all/2QboVORbSGwC4QQGMmXbybV8fbNa0wYY1XmqkSEY.png')); ?>"></div>
				<div class="dd_middle_cnt">
					<strong class="color-f3 f-65 f-bold mb-md-4 mr-1">#1 </strong>
					<h2 class="color-f3 dd_head f-35 color-27 f-bold mb-0">Pet Friendly Platform</h2>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pb-5 pt-4 mb-5">
	<div class="container">
		<div class="dd_bgimg bdr-rdius24 about_reg pos-rel" style="background: url(<?php echo e(static_asset('uploads/all/bQADlz3mq3ooQjMklfCqcm8CzvOgQeEj3NEOHn4F.png')); ?>)">
			<div class="row d-flex justify-content-end">
				<div class="col-lg-7">
					<div class="dd_allCNT p-5">
						<h2 class="color-27 f-46 f-bold mb-4">Does your pet need a date?</h2>
						<p class="f-18 f-medium color-27 pb-2">Hmmmm Interesting?</p>
						<?php if(auth()->guard()->check()): ?>
						<?php else: ?>
						<div class="Dwiggy_bnr_btn">
							<a style="background-color: #F3735F;" data-toggle="modal" data-target="#dynamicBackdrop" class="dwiggy_btn bdr-rdius24 bdr-none  gothambold-f15 color-fff mb-5" href="#">SIGN UP NOW!</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="about_pos"><img src="<?php echo e(static_asset('uploads/all/FKgHc8i35lLAuVW65HDf88YdFgsZGuArdnYODdVA.png')); ?>"></div>
		</div>
	</div>
</section>
<section class="footer_top_sec pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2 class="dd_head f-28  f-bold mb-4" style="color: black;"> Members & Their Sayings</h2>
				<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				  <div class="carousel-inner">
				         <?php $i=0;  ?>
				      	 <?php $home_testimonial = json_decode(get_setting('home_testimonial_heading'), true);  ?>
                         <?php $__currentLoopData = $home_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <div class="carousel-item <?php if($i==0){  ?> active<?php }  ?>">
					      <div class="pos-rel">
							<span class=" f-40"><i class="fas fa-quote-left"></i></span>
							<p class="f-18 f-medium "><?php echo e(json_decode(get_setting('home_testimonial_description'), true)[$key]); ?></p>
						</div>
						<div class="about_say d-flex align-items-center pt-4">
							<div class="about_say_img"><img src="images/new_xd_images/Samantha.png"></div>
							<div class="about_say_cnt ml-3">
								<strong class="d-block  f-18 f-sbold"><?php echo e(json_decode(get_setting('home_testimonial_name'), true)[$key]); ?></strong>
								<small class="d-block "><?php echo e(json_decode(get_setting('home_testimonial_location'), true)[$key]); ?></small>
							</div>
						</div>
				    </div>
				         <?php $i++;  ?>
				         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </div>
				  <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-left-long " style="color: black;"></i></span>
				    <span class="sr-only ">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-right-long" style="color: black;"></i></span>
				    <span class="sr-only">Next</span>
				  </button>
				</div>
			</div> 
			<div class="col">
				<img src="images/only-dog.png" alt="">
			</div>
		</div>
	</div>
	<br id="res">
	<br id="res"><br id="res"><br id="res">
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/pages/aboutus.blade.php ENDPATH**/ ?>