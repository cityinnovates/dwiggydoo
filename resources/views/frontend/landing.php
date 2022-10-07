<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- select with country code --> 
		<link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
        <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
		<!-- ------ -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>we will be</title>
	<style type="text/css">
		.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn){width: 100px;}
		.increment-column.d-flex{
			    font-size: 14px;
			    border-radius: 10px;
			    border: 1px solid #70707050;
			    height: calc(2em + 0.75rem + 6px);
			    color: #272727;
			    font-weight: 600;
			    align-items: center;
			    position: relative;
			    z-index: 99;
			    background: transparent;
		}
		.increment-column .show .dropdown-menu{display:block;}
		.dropdown-menu.open{width: 350px;}
		.bootstrap-select.btn-group .dropdown-toggle .filter-option{width: 74%;}
		/*landing style here*/
		.dd_form_btn .bg-orange{background: #F3735F;}
		.color-orange{color: #F3735F;}
		.bg-orange{background: #F3735F;}
	</style>
</head>
<body>
	<section class="banner">
		<div class="container-fluid pr-0 pl-0">
			<div class="banner-index index-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="banner-cnt pl-0">
								<div class="lnd_logo mb-4"><img src="images/lOGO.png" class="img-fluid"></div>
								<h4 class="head-cnt f-40 f-medium color-orange mb-4">WE WILL BE LIVE SOON!!!</h4>
								<p class="head-p f-30 f-medium color-27 mb-4">
									<b>India's First</b> Online Mating Platform For Dogs
								</p>
								<div class="dd_middle d-flex w-100 justify-content-between">
									<div class="dd_middle_box d-flex align-items-center mr-md-5 mb-4">
										<div class="dd_middle_img mr-md-4"><img src="images/landing/track.png"></div>
										<div class="dd_middle_cnt">
											<strong class="color-orange f-32 f-bold mb-md-4 mr-1">300+</strong>
											<h6 class="color-orange dd_head f-16 f-sbold mb-0">Breeds</h6>
										</div>
									</div>
									<div class="dd_middle_box d-flex align-items-center mr-md-5 mb-4">
										<div class="dd_middle_img mr-md-4"><img src="images/landing/lnd_lp.png"></div>
										<div class="dd_middle_cnt">
											<strong class="color-orange f-32 f-bold mb-md-4 mr-1">No. 1</strong>
											<h6 class="color-orange dd_head f-16 f-sbold mb-0">Online Dating Protector</h6>
										</div>
									</div>
								</div>
								<button type="submit" class="gotham-medium btn color-fff bg-orange mb-4" style="padding: 15px 30px;font-size: 19px;border-radius: 10px;">REGISTER NOW</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-5 dd_profile bg_img">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="f-bold dd_heading f-40 color-00 breed-ctn pos-rel mb-5 px-md-5 text-center">We look forward to having you with us, Please fill details below
					</h2>
				</div>
			</div>
			<div class="dwiggy-form">
				<form>
				  <h6 class="f-20 color-27 f-sbold my-5">OWNER DETAILS</h6>
				  <div class="form-row">
					   <div class="form-group	 col-md-4 mb-4">
					    	<input class="form-control" id="inputName4" required type="text" />
		                    <label for="inputName">Dog’s Name *</label>
					    </div>
					    <div class="form-group	 col-md-4 mb-4">
					    	<input class="form-control" id="Email" required type="text" />
		                    <label for="inputName">Email*</label>
					    </div>
					    <div class="form-group col-md-4 mb-4">
							<!-- <label>Phone Number<span class="jj_star">*</span> <span class="error error-name"></span></label> -->
							<div class="increment-column d-flex">
								<select class="selectpicker countrypicker" data-live-search="true" data-flag="true" data-default="IN"></select>
								<input type="" placeholder="Phone Number" class="bdr-none w-100"  name="Phone Number*" id="PhoneNumber*">
							</div>
						</div>
					    <div class="form-group	 col-md-4 mb-4">
					    	<input class="form-control" id="CityResidence" required type="text" />
		                    <label for="inputName">City & Residence*</label>
					    </div>
					    <div class="form-group col-md-4 mb-4">
						    <select class="form-control" id="exampleFormControlSelect1">
						      <option>Gender</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
					    </div>
				  </div>
				  <h6 class="f-20 color-27 f-sbold my-5">DOG DETAILS</h6>
				  <div class="form-row">
					    <div class="form-group	 col-md-4 mb-4">
					    	<input class="form-control" id="inputName4" required type="text" />
		                    <label for="inputName">Dog’s Name *</label>
					      <!-- <input type="email" class="form-control" id="inputName4" required>
					      <label for="inputEmail4">Name*</label> -->
					    </div>
					    <div class="form-group col-md-4 mb-4">
					      <input type="text" class="form-control" id="inputMobile4" required>
					      <label for="inputPassword4">Enter your dog's breed</label>
					      <div class="img-abs"><img src="images/beagle.png"></div>
					    </div>
					    <div class="form-group col-md-4 mb-4">
						    <select class="form-control" id="exampleFormControlSelect1">
						      <option>Select Gender</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
					    </div>
					    <div class="form-group col-md-4 mb-4">
						    <select class="form-control" id="exampleFormControlSelect1">
						      <option>Select your dog's age</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
					    </div>
					    <div class="form-group col-md-4 mb-4">
						    <select class="form-control" id="exampleFormControlSelect1">
						      <option>	How smart would you like your dog to be? *</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
					    </div>
				  </div>
				  <div class="dd_upload_img text-center pt-4">
				  	<p class="f-sbold f-14 color-27 my-4">Upload your dog's pictures</p>
						<div class="wrapper d-flex justify-content-center" style="flex-wrap: wrap;">
						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>

						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>

						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>
						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>
						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>
						  <div class="box mr-4 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload" accept="image/*" />
						      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>
						</div>
				  </div>
				  <div class="dd_form_btn text-center pt-4">
				  	<button type="submit" class="bg-orange color-fff btn mr-md-2 my-4 f-medium">REGISTER NOW</button>
				  </div>
				</form>
			</div>
		</div>
	</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
<!-- country code select dropdown -->
<script src="//unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
<script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/main.js"></script>

<!-- <script type="text/javascript">
  $(function() {                       
  $(".bl_Convers_heart").click(function() { 
    $(this).toggleClass("active");     
  });
  $(".bl_mobile_right ").click(function() { 
    $(this).siblings().toggleClass("show");     
  });
  $(".go_ahead").click(function() { 
    $('.pp_after').hide("show");     
  });
   $("#submitbtn").click(function() { 
      $(this).parent().siblings('.login_pp').addClass("active");     
    });
   $(".act_frnd_bar").click(function() { 
      $(this).siblings().toggleClass("show");     
    });
   $(".act_frnd_list>li>button").click(function() { 
      $(this).addClass("active").parent().siblings().children().removeClass('active');     
    });
   $('#nav-icon4').click(function(){
    $(this).toggleClass('open');
  });
});
</script> -->

</body>
</html>
