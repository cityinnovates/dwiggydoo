<?php $__env->startSection('content'); ?>
<section class="contact_banner">
	<div class="contact_bnr">
		<img src="images\new_img/dogb.png" class="img-fluid">
	</div>
</section>
<section class="contact_form_sec my-5 pb-5">
	<div class="container">
		<div class="contact_form">
			<div class="row">
				<div class="col-md-12 mb-4">
					<h1 class="f-50 color-00 m-0 f-bold">Contact Us</h1>
				</div>
				<div class="col-md-6 mb-4">
					<form class="dd_all_req">
						<div class="form-row">
							<div class="form-group col-12 mb-4">
								<label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-user mr-2"></i>Name*</label>
							    <input class="form-control" id="ContactName" type="text">
							</div>
							<div class="form-group col-12 mb-4">
								<label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-envelope mr-2"></i>Email*</label>
							    <input class="form-control" id="ContactEmail" type="text">
							</div>
							<div class="form-group col-12 mb-4">
								<!-- <label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-phone mr-2"></i>Phone Number*</label>
							    <input class="form-control" id="ContactPhoneNumber" type="Number"> -->
							    <label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-phone mr-2"></i>Phone Number*</label>
								<div class="increment-column d-flex w-100">
									<select class="selectpicker countrypicker" data-live-search="true" data-flag="true" data-default="IN" name="phone_code" id="phone_code"></select>
									<input type="Number" placeholder="" class="bdr-none w-100" pattern="[789][0-9]{9}" required name="phone" id="phone">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6 mb-4">
					<form class="dd_all_req h-100 contact_req">
						<div class="form-row h-100">
							<div class="form-group col-12 mb-4">
								<label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-message mr-2"></i>Message</label>
								<textarea class="form-control h-100" id="ContactMessage" type="text"></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="dd_form_btn text-center">
			  	<button type="submit" class="btn f-medium bg-f3 color-fff">SEND MESSAGE</button>
			 </div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/contact.blade.php ENDPATH**/ ?>