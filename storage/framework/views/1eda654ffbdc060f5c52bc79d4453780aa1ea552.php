<?php $__env->startSection('content'); ?>
<section class="py-5 dd_profile bg_img">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 breed-ctn pos-rel mb-5 text-center">Welcome
					</h1>
			</div>
		</div>
		<ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
			<li class="nav-item mr-md-4" role="presentation">
		    <a class="nav-link <?php  if(Auth::user()->phone==''){ echo 'active'; }?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-user-alt mr-0"></i>'s Profile</a>
		  </li>
		  <li class="nav-item ml-md-4" role="presentation">
		    <a class="nav-link <?php  if(Auth::user()->phone!=''){ echo 'active'; }?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-dog mr-0"></i>'s Profile</a>
		  </li>
		  
		</ul>
		<div class="tab-content pt-5" id="pills-tabContent">
		  <div class="tab-pane fade<?php if(Auth::user()->phone!=''){ ?> show active<?php }  ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		  	<div class="dwiggy-form">
		  		<?php   
		  		$n = 1;
		  		
		  		foreach ($product as $key => $value) {

		  		$n++;
		  		?>
				<form method="post" action="<?php echo e(route('home.store')); ?>"  enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
				  <div class="form-row">
				    <div class="form-group	 col-md-4 mb-4">
				    	<input class="form-control"   name="name"  value="<?=$value['name']?>"  placeholder="Enter your dog's name*" id="inputName4" required type="text" />
	                    <!-- <label for="inputName">Enter your dog's name</label> -->
				      <!-- <input type="email" class="form-control" id="inputName4" required>
				      <label for="inputEmail4">Name*</label> -->
				    </div>

				    <div class="form-group col-md-4 mb-4">
				      	<select class="form-control" name="brand_id" id="brand_id" data-live-search="true" required="">

							<option value=""><?php echo e(('Select Breed')); ?>*</option>

								<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breeds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option  <?php if($value['brand_id']==$breeds->id){  echo "selected";  }  ?>  value="<?php echo e($breeds->id); ?>"><?php echo e($breeds->name); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
				      <!-- <label for="inputPassword4">Enter your dog's breed</label> -->
				      <div class="img-abs"><img src="images/beagle.png"></div>
				    </div>


				    <div class="form-group col-md-4 mb-4">
					    <select class="form-control" name="age" id="exampleFormControlSelect1" required="">
					      <option value="">Select your dog's age*</option>
					      <option  <?php if($value['age']==1){  echo "selected";  }  ?> value="1">1</option>
					      <option  <?php if($value['age']==2){  echo "selected";  }  ?> value="2">2</option>
					      <option  <?php if($value['age']==3){  echo "selected";  }  ?>  value="3">3</option>
					      <option  <?php if($value['age']==4){  echo "selected";  }  ?>  value="4">4</option>
					      <option  <?php if($value['age']==5){  echo "selected";  }  ?>  value="5">5</option>
					    </select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <select class="form-control" name="unit"  data-live-search="true" required="">
							<option value=""><?php echo e(('Select Gender')); ?>*</option>
								<option  <?php if($value['unit']==0){  echo "selected";  }  ?> value="0">Male</option>
								<option  <?php if($value['unit']==1){  echo "selected";  }  ?> value="1">Female</option>

						</select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					   <select class="form-control" name="category_id" id="category_id" data-live-search="true" required>
                           <option value="">Select Genes*</option>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option <?php if($value['category_id']==$category->id){  echo "selected";  }  ?> value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					      <select class="form-control" name="location_id"  data-live-search="true" required="">
							<option value=""><?php echo e(('Select Location')); ?>*</option>
								<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option  <?php if($value['location_id']==$cityss->id){  echo "selected";  }  ?> value="<?php echo e($cityss->id); ?>"><?php echo e($cityss->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
				    </div>

				    <div class="form-group col-md-4 mb-4">
					   <input class="form-control"   name="description" value="<?=$value['description']?>"  placeholder="Enter your dog's description" id="inputName4" required type="text" />
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <?php  if($value['file_path']!=''){ 
					    $fgf=explode('.',$value['file_path']); 
					    // print_r($fgf[2]);

					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {  ?>
				    	<img src="<?php echo e($value['file_path']); ?>" style="width: 50%;height: 100px;">
				            <?php  } else {   ?>
								       <video width="225" height="100" controls>
								  <source src="<?php echo e($value['file_path']); ?>" type="video/mp4">
								  Your browser does not support the video tag.
								</video>   			
				        <?php }   }  ?> 
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <?php  if($value['file_path1']!=''){ 
					    $fgf=explode('.',$value['file_path1']); 
					    // print_r($fgf[2]);

					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {  ?>
				    	<img src="<?php echo e($value['file_path1']); ?>" style="width: 50%;height: 100px;">
				            <?php  } else {   ?>
								       <video width="225" height="100" controls>
								  <source src="<?php echo e($value['file_path1']); ?>" type="video/mp4">
								  Your browser does not support the video tag.
								</video>   			
				        <?php }   }  ?> 
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <?php  if($value['file_path2']!=''){ 
					    $fgf=explode('.',$value['file_path2']); 
					    // print_r($fgf[2]);

					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {  ?>
				    	<img src="<?php echo e($value['file_path2']); ?>" style="width: 50%;height: 100px;">
				            <?php  } else {   ?>
								       <video width="225" height="100" controls>
								  <source src="<?php echo e($value['file_path2']); ?>" type="video/mp4">
								  Your browser does not support the video tag.
								</video>   			
				        <?php }   }  ?> 
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <?php  if($value['file_path3']!=''){ 
					    $fgf=explode('.',$value['file_path3']); 
					    // print_r($fgf[2]);

					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {  ?>
				    	<img src="<?php echo e($value['file_path3']); ?>" style="width: 50%;height: 100px;">
				            <?php  } else {   ?>
								       <video width="225" height="100" controls>
								  <source src="<?php echo e($value['file_path3']); ?>" type="video/mp4">
								  Your browser does not support the video tag.
								</video>   			
				        <?php }   }  ?> 
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <?php  if($value['file_path4']!=''){ 
					    $fgf=explode('.',$value['file_path4']); 
					    // print_r($fgf[2]);

					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {  ?>
				    	<img src="<?php echo e($value['file_path4']); ?>" style="width: 50%;height: 100px;">
				            <?php  } else {   ?>
								       <video width="225" height="100" controls>
								  <source src="<?php echo e($value['file_path4']); ?>" type="video/mp4">
								  Your browser does not support the video tag.
								</video>   			
				        <?php }   }  ?> 
				    </div>
				  </div>
				  <input type="hidden" name="photo" value="<?php echo e($value['file_path']); ?>">
				  <input type="hidden" name="photo1" value="<?php echo e($value['file_path1']); ?>">
				  <input type="hidden" name="photo2" value="<?php echo e($value['file_path2']); ?>">
				  <input type="hidden" name="photo3" value="<?php echo e($value['file_path3']); ?>">
				  <input type="hidden" name="photo4" value="<?php echo e($value['file_path4']); ?>">
				  <div class="dd_upload_img text-center pt-4">
				  	<p class="f-sbold f-14 color-27 mb-4">Upload your dog's pictures</p>
						<div class="wrapper d-flex justify-content-center" style="flex-wrap: wrap;">
						  <div class="box mr-2 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload"  id="myfile<?=$n?>1" name="myfile" accept="image/*,video/*" />
						      <img id="uploadedImage<?=$n?>" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
						    </div>
						  </div>

						  <div class="box mr-2 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload"  id="myfile<?=$n?>1" name="myfile1" accept="image/*,video/*" />
						      <img id="uploadedImage<?=$n?>1" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
						    </div>
						  </div>
						  <div class="box mr-2 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload"  id="myfile<?=$n?>2" name="myfile2" accept="image/*,video/*" />
						      <img id="uploadedImage<?=$n?>2" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
						    </div>
						  </div>
						  <div class="box mr-2 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload"  id="myfile<?=$n?>3" name="myfile3" accept="image/*,video/*" />
						      <img id="uploadedImage<?=$n?>3" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
						    </div>
						  </div>
						  <div class="box mr-2 mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" class="image-upload"  id="myfile<?=$n?>4" name="myfile4" accept="image/*,video/*" />
						      <img id="uploadedImage<?=$n?>4" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
						    </div>
						  </div>
					
						</div>
				  </div>
				  <input type="hidden" name="idd" value="<?=$value['id']?>">
				  <div class="dd_form_btn text-center pt-4">
				  	<button type="submit" class="btn btn-primary mr-md-2 mb-4 f-medium">SUBMIT</button>
				  	<!-- <button type="submit" class="btn btn-primary bg-trsprnt color-blue ml-md-2 mb-4 f-medium">+ Add More Dog Profile</button> -->
				  </div>
				</form>


			<?php  }   ?>
				<!-- <button type="button" class="btn btn-primary bg-trsprnt color-blue ml-md-2 mb-4 f-medium">+ Add More Dog Profile</button> -->
			<form method="post" action="<?php echo e(route('home.store')); ?>"  enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
				  <div class="form-row">
				    <div class="form-group	 col-md-4 mb-4">
				    	<input class="form-control"   name="name"  placeholder="Enter your dog's name*" id="inputName4" required type="text" />
	               
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      	<select class="form-control" name="brand_id" id="brand_id" data-live-search="true" required="">

							<option value=""><?php echo e(('Select Breed')); ?>*</option>

								<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breeds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option    value="<?php echo e($breeds->id); ?>"><?php echo e($breeds->name); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>


				      <!-- <label for="inputPassword4">Enter your dog's breed</label> -->
				      <div class="img-abs"><img src="images/beagle.png"></div>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <select class="form-control" name="age" id="exampleFormControlSelect1" required="">
					      <option value="">Select your dog's age*</option>
					      <option  value="1">1</option>
					      <option  value="2">2</option>
					      <option  value="3">3</option>
					      <option  value="4">4</option>
					      <option  value="5">5</option>
					    </select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <select class="form-control" name="unit"  data-live-search="true" required="">
							<option value=""><?php echo e(('Select Gender')); ?>*</option>
								<option  value="0">Male</option>
								<option value="1">Female</option>

						</select>
				    </div>


				    <div class="form-group col-md-4 mb-4">
					   <select class="form-control" name="category_id" id="category_id" data-live-search="true" required>
                           <option value="">Select Genes*</option>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<option  value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
				    </div>


				    <div class="form-group col-md-4 mb-4">
					      <select class="form-control" name="location_id"  data-live-search="true" required="">
							<option value=""><?php echo e(('Select Location')); ?>*</option>
								<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option  value="<?php echo e($citys->id); ?>"><?php echo e($citys->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
				    </div>

		
				    <div class="form-group col-md-4 mb-4">
					   <input class="form-control"   name="description"   placeholder="Enter your dog's description*" id="inputName4" required type="text" />
				    </div>

				   
				  </div>
				 
				  <div class="dd_upload_img text-center pt-4">
				  	<p class="f-sbold f-14 color-27 mb-4">Upload your dog's pictures</p>
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<div class="wrapper d-flex justify-content-center" style="flex-wrap: wrap;">
								
							  <div class="box mr-2 mb-4">
							    <div class="js--image-preview img_prev"></div>
							    <div class="upload-options">
							      <input type="file" class="image-upload"  id="myfile" name="new_myfile" accept="image/*,video/*" />
							      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
							    </div>
							  </div>
							  <div class="box mr-2 mb-4">
							    <div class="js--image-preview img_prev"></div>
							    <div class="upload-options">
							      <input type="file" class="image-upload"  id="myfile1" name="new_myfile1" accept="image/*,video/*" />
							      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
							    </div>
							  </div>
							  <div class="box mr-2 mb-4">
							    <div class="js--image-preview img_prev"></div>
							    <div class="upload-options">
							      <input type="file" class="image-upload"  id="myfile2" name="new_myfile2" accept="image/*,video/*" />
							      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
							    </div>
							  </div>
							  <div class="box mr-2 mb-4">
							    <div class="js--image-preview img_prev"></div>
							    <div class="upload-options">
							      <input type="file" class="image-upload"  id="myfile3" name="new_myfile3" accept="image/*,video/*" />
							      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
							    </div>
							  </div>
							  <div class="box mr-2 mb-4">
							    <div class="js--image-preview img_prev"></div>
							    <div class="upload-options">
							      <input type="file" class="image-upload"  id="myfile4" name="new_myfile4" accept="image/*,video/*" />
							      <img id="uploadedImage" src="images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg, video/*">
							    </div>
							  </div>
							</div>
						</div>
					</div>
				  </div>
				
				  <div class="dd_form_btn text-center pt-4">
				  	<button type="submit" class="btn btn-primary mr-md-2 mb-4 f-medium">SUBMIT</button>
				  
				  </div>
				</form>
			</div>
		  </div>

		  <div class="tab-pane fade<?php if(Auth::user()->phone==''){ ?> show active<?php }  ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

		  	<div class="dwiggy-form">
				<form action="<?php echo e(route('customer.profile.update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
				  <div class="form-row">
				    <div class="form-group	 col-md-4 mb-4">
				    	<input type="text" class="form-control" id="inputName4"  placeholder="Your Name*"  required  name="name" value="<?php echo e(Auth::user()->name); ?>">
	                    <!-- <label for="inputName">Your Name*</label> -->
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      <input type="text" class="form-control" id="inputMobile4"  pattern="[1-9]{1}[0-9]{9}"    placeholder="Your phone*"  required  name="phone" value="<?php echo e(Auth::user()->phone); ?>">
				      <!-- <label for="inputPassword4">Your Phone</label> -->
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      	<select class="form-control" name="profession_id" id="profession_id" data-live-search="true" required="">
							<option value=""><?php echo e(('Select Profession')); ?>*</option>
							<?php $__currentLoopData = App\Models\ProfessionCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($value->id); ?>" <?= $value->id == Auth::user()->profession_id ? 'selected' : '' ;?>><?php echo e($value->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					      <select class="form-control" name="location_id"  data-live-search="true" required="">
							<option value=""><?php echo e(('Select Location')); ?>*</option>
								<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option  value="<?php echo e($citys->id); ?>" <?= $citys->id == Auth::user()->location_id ? 'selected' : '' ;?>><?php echo e($citys->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Your Email"   value="<?php echo e(Auth::user()->email); ?>"  required>
				      <!-- <label for="inputEmail4">Enter your email</label> -->
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Pincode"   value="<?php echo e(Auth::user()->postal_code); ?>" required>
				    </div>
				    <div class="form-group col-md-4 mb-4">
				      <input type="text" class="form-control" id="age" name="age" placeholder="Age"   value="<?php echo e(Auth::user()->age); ?>" required>
				    </div>
				    <div class="form-group col-md-4 mb-4">
					    <select required=""  name="gender" class="form-control" id="exampleFormControlSelect1" required>
					      <option  value="0">Select Gender*</option>
					      <option <?php  if(Auth::user()->gender==1){ echo "selected"; }  ?> value="1">Male</option>
					      <option <?php  if(Auth::user()->gender==2){ echo "selected"; }  ?> value="2">Female</option>
					      <option <?php  if(Auth::user()->gender==3){ echo "selected"; }  ?> value="3">Other</option>
					    </select>
				    </div>
				    <div class="form-group col-md-4 mb-4">
				    	 <input type="hidden" name="photo" value="<?php echo e(Auth::user()->avatar_original); ?>" class="selected-files">

				    	<input type="file" id="myfile" name="myfile" >


				      <!-- <label for="inputUpload4">Upload your image</label> -->
				    </div>
                      <div class="form-group col-md-4 mb-4">
				    <?php  if(Auth::user()->avatar_original!=''){  ?>
				    	<img src="<?php echo e(Auth::user()->avatar_original); ?>" style="width: 50%;height: 100px;">
				            <?php  }   ?>
				            </div>
				  </div>
				  <div class="dd_form_btn text-center pt-4">
				  	<button type="submit" class="btn btn-primary mr-md-2 mb-4">Next</button>
				  </div>
				  <!-- <div class="login_cnt text-center">
				  	<p class="f-reg f-18 color-27 pt-3">Already have an account? <a href="#" class="color-blue f-medium">Login to Dwiggy Doo</a> </p>
				  </div> -->
				</form>
			</div>
		  </div>
		</div>
	
		
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/register_dog.blade.php ENDPATH**/ ?>