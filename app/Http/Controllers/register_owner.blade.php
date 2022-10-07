<?php include ('header.php') ?>
<section class="py-5 dd_profile bg_img">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 mb-4">
				<div class="owner_profile">
					<img src="images/owner_profile.png" class="img-fluid">
				</div>
			</div>
			<div class="col-md-6">
				<div class="modal-content bdr-none bg-lgray" style="border-radius: 0;">
			      <div class="modal-header">
			        <h1 class="f-bold dd_heading f-32 color-27 text-center breed-ctn pos-rel w-100 text-center pt-4">Welcome To Dwiggy Doo !
			          </h1>
			      </div>
			      <div class="modal-body px-md-5">
			        <div class="dwiggy-form">
			          <form>
			            <div class="form-row w-100">
			              <div class="login_id w-100">
			                <div class="form-group mb-4">
			                  <input type="email" name="email" id="email" required="" class="form-control f-14 f-sbold color-27" placeholder="Enter your email">
			                  <small id="emailvalid" class="form-text
			                    text-danger invalid-feedback f-sbold">
			                        Enter your email id must be a valid
			                  </small>
			              </div>
			                <div class="form-group mb-4">
			                  <input type="password" name="pass" id="password2" class="form-control f-14 f-sbold color-27 " placeholder="Password">
			                  <h5 class="text-danger f-sbold" id="passcheck2" style="font-size: 13px; display: none;">
			                    Please Fill the password
			                  </h5>
			               </div>
			                <div class="form-group mb-4">
			                  <input type="password" name="pass" id="confirm-password" class="form-control f-14 f-sbold color-27 " placeholder="Confirm Password">
			                  <h5 class="text-danger f-sbold" id="confirm-password2" style="font-size: 13px; display: none;">
			                    Please Fill the Confirm Password
			                  </h5>
			               </div>
			              </div>
			            </div>
			            <div class="dd_form_btn text-center login_pp_btn mb-2" disabled="disabled">
			             <input type="submit" id="submitbtn" value="REGISTER" class="py-2 btn btn-primary disabled w-100 bg-blue" disabled="disabled"> 
			            </div>
			          </form>
			        </div>
			      </div>
			       <div class="login_cnt text-center pb-5">
			        <p class="f-reg f-16 color-27">Already have an account?<br> <a href="#" class="color-blue f-medium">Login to Dwiggy Doo</a> </p>
			     </div>
			    </div>
			</div>
		</div>
	</div>
</section>
<?php include ('footer.php') ?>