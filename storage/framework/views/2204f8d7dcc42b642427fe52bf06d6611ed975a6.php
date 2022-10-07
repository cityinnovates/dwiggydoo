<?php $__env->startSection('content'); ?>
<section class="py-5 dd_profile bg_img">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 mb-4">
				<div class="owner_profile">
					<img src="<?php echo e(route('home')); ?>/images/owner_profile.png" class="img-fluid">
				</div>
			</div>
			<div class="col-md-6">
				<div class="modal-content bdr-none bg-lgray" style="background: #f1f1f1;border-radius: 13px;">
			      <div class="modal-header">
			        	<h1 class="f-bold dd_heading f-32 color-27 text-center breed-ctn pos-rel w-100 text-center pt-4 mb-4">Welcome To Dwiggy Doo !
			          </h1>
			        <!-- <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="alert alert-danger"><?php echo e($message['message']); ?></div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
			      </div>
			      <div class="modal-body px-md-5">
			        <div class="dwiggy-form">
			          <form action="<?php echo e(route('register')); ?>" method="POST">
			          	 <?php echo csrf_field(); ?>
			          	 <div class="form-row w-100" id="registerss">
							<div class="login_id w-100">
								<div class="form-group mb-4">
									<input type="text" name="name" id="name" required class="form-control f-14 f-sbold color-27" placeholder="Full Name*">
								</div>
								<div class="form-group mb-4">
									<input type="email" name="email" id="email" required class="form-control f-14 f-sbold color-27 " placeholder="Email id*">
									<h5 class="text-danger f-sbold" id="passcheck2" style="font-size: 13px; display: none;">
										Please Fill the password
									</h5>
								</div>
								<div class="form-group mb-4">
									<input type="text"  pattern="[789][0-9]{9}" name="mobile"   id="mobile" required class="form-control f-14 f-sbold color-27 " placeholder="Phone Number*">
									<p style="font-size: 8px;">We will send you the 4-digit verification code in your Phone Number and Email-id</p>
								</div>
							</div>
						</div>
			          	  <div class="">
			          	  <input type="submit" id="submitbtn" value="REGISTER11"  style="display:none;" class="py-2 btn  color-fff w-100 bg-f3" >
			             <input type="submit" id="submitbtn" value="REGISTER" class="py-2 btn  color-fff w-100 bg-f3"  style="background-color: #f3735f;"> 
			          	 </div>
			          </form>
			        </div>
			      </div>
			      
			      	<div class="login_cnt text-center pb-5">
						<p class="f-medium f-14 color-27">Already have an account? <a  data-toggle="modal" data-target="#dynamicBackdrop"  class="color-f3 f-medium">Login to Dwiggy Doo</a> </p>
						<div class="modal-footer" style="border: none;">
							<p class="f-12 f-medium color-27 mb-3 w-100 text-center">or Register with</p>
							<div class="login_with w-100 text-center mb-3">
								<a href="https://dwiggydoo.com/login/instagram" class="mx-2"><img src="<?php echo e(route('home')); ?>/images/login_with/instagram.png"></a>
								<a href="https://dwiggydoo.com/social-login/redirect/google" class="mx-2"><img src="<?php echo e(route('home')); ?>/images/login_with/google.png"></a>
								<!-- <a href="#" class="mx-2"><img src="<?php echo e(route('home')); ?>/images/login_with/spotify.png"></a> -->
							<a href="<?php echo e(env('APP_URL')); ?>/social-login/redirect/facebook"  class="mx-2"><img style="width: 30px;" src="<?php echo e(route('home')); ?>/images/login_with/fb.png"></a>
							</div>
						</div>
						<p class="f-16 f-medium color-27 mb-3 w-100 text-center"><b>NOT A PET OWNER?</b></p>

						<div class="container">
							<div class=" text-center " style="margin: 30px;">
								<!--  <button type="submit" class="btn btn-primary w-100">POST</button> -->
								<input type="submit" id="submitbtn" value="Do Something good too" style="background-color: #F3735F;" class="btn  w-100 bg-f3 color-fff">
								<p class="f-10 f-medium   text-center">You should do something good too...…</p>
							</div>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</section>
<script>
function sendotp(value){
    
    var name=$('#name').val();
    var email=$('#email').val();
    var mobile=$('#mobile').val();
    
    $('#registerss').hide();
  	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  	var filter = /^\d*(?:\.\d{1,2})?$/;
   if(filter.test(mobile)){
    $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/sendotptomobiler',
             data: {"email": email, "_token": "<?php echo e(csrf_token()); ?>","name":name,"mobile":mobile,
            success:function(data) {
                  $('#ottpss').show();
                //   $("#submitbtn1").prop('disabled', false);
                  $("#submitbtn1").show();
                   
            $('#msg').show();
            $('#msg1').hide();
            $('#msg').html(data);
            if(data=="This number is not registered with us."){
            window.location.href="https://dwiggydoo.com/registers";
            }
        }
    });
  }else{
    var msgg="Not a valid number";
        $('#msg1').show();
        $('#msg').hide();
        $('#msg1').html(msgg);
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/register_owner.blade.php ENDPATH**/ ?>