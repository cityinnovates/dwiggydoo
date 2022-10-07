<?php include ('header.php') ?>
<section class="contact_banner">
	<div class="contact_bnr">
		<img src="images\new_img/dogb.png" class="img-fluid">
	</div>
	<div class="contact_ctn">
		<h1 class="f-50 color-00 m-0 f-bold">Contact Us</h1>
	</div>
</section>
<section class="contact_form_sec my-5 pb-5">
	<div class="container">
		<div class="contact_form">
			<div class="row">
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
								<label for="Location" class="f-medium f-14 color-7E"><i class="fa-solid fa-phone mr-2"></i>Phone Number*</label>
							    <input class="form-control" id="ContactPhoneNumber" type="Number">
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
<?php include ('footer.php') ?>