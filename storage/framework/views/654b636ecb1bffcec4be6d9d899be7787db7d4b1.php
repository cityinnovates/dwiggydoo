<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
        	<?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
                <?php   
                $n = 1;
                foreach ($product as $key => $value) {
                $n++;
                ?>
                <form method="post" action="<?php echo e(route('home.store')); ?>"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="contentforprof">
                        <b>Your Account</b>
                        <div class="row">

                            
                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file'   id="myfile<?=$n?>1" name="myfile" accept=".png, .jpg, .jpeg" />
                                        <label for="myfile<?=$n?>1"></label>
                                    </div>
                                    <div class="avatar-preview">
                                    <?php  if($value['file_path']!=''){?>
                                    <?php  

                                        $fgf=explode('.',$value['file_path']); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {
                                    ?>

                                        <div id="imagePreview" style="background-image: url(<?php echo e($value['file_path']); ?>);"></div>

                                        <?php  } else {   ?>

                                        <video width="225" height="100" controls>
                                          <source src="<?php echo e($value['file_path']); ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>   

                                    <?php } ?>
                                    
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="myfile<?=$n?>2" name="myfile1" accept=".png, .jpg, .jpeg" />
                                        <label for="myfile<?=$n?>2"></label>
                                    </div>
                                    <div class="avatar-preview">
                                    <?php  if($value['file_path1']!=''){?>
                                    <?php  

                                        $fgf=explode('.',$value['file_path1']); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {
                                    ?>

                                        <div id="imagePreview" style="background-image: url(<?php echo e($value['file_path1']); ?>);"></div>

                                        <?php  } else {   ?>

                                        <video width="225" height="100" controls>
                                          <source src="<?php echo e($value['file_path1']); ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>   

                                    <?php } ?>
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="myfile<?=$n?>3" name="myfile2" accept=".png, .jpg, .jpeg" />
                                        <label for="myfile<?=$n?>3"></label>
                                    </div>
                                    <div class="avatar-preview">
                                    <?php  if($value['file_path2']!=''){?>
                                    <?php  

                                        $fgf=explode('.',$value['file_path2']); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {
                                    ?>

                                        <div id="imagePreview" style="background-image: url(<?php echo e($value['file_path2']); ?>);"></div>

                                        <?php  } else {   ?>

                                        <video width="225" height="100" controls>
                                          <source src="<?php echo e($value['file_path2']); ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>   

                                    <?php } ?>
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="myfile<?=$n?>4" name="myfile3" accept=".png, .jpg, .jpeg" />
                                        <label for="myfile<?=$n?>4"></label>
                                    </div>
                                    <div class="avatar-preview">
                                    <?php  if($value['file_path3']!=''){?>
                                    <?php  

                                        $fgf=explode('.',$value['file_path3']); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {
                                    ?>

                                        <div id="imagePreview" style="background-image: url(<?php echo e($value['file_path3']); ?>);"></div>

                                        <?php  } else {   ?>

                                        <video width="225" height="100" controls>
                                          <source src="<?php echo e($value['file_path3']); ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>   

                                    <?php } ?>
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="myfile<?=$n?>5" name="myfile4" accept=".png, .jpg, .jpeg" />
                                        <label for="myfile<?=$n?>5"></label>
                                    </div>
                                    <div class="avatar-preview">
                                    <?php  if($value['file_path4']!=''){?>
                                    <?php  

                                        $fgf=explode('.',$value['file_path4']); 
                                        if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif'||$fgf[2]=='webp'||$fgf[2]=='jfif') {
                                    ?>

                                        <div id="imagePreview" style="background-image: url(<?php echo e($value['file_path4']); ?>);"></div>

                                        <?php  } else {   ?>

                                        <video width="225" height="100" controls>
                                          <source src="<?php echo e($value['file_path4']); ?>" type="video/mp4">
                                          Your browser does not support the video tag.
                                        </video>   

                                    <?php } ?>
                                    <?php } ?>
                                    
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br><br id="res">
                    <div class="contentforprof">

                      <input type="hidden" name="photo" value="<?php echo e($value['file_path']); ?>">
                      <input type="hidden" name="photo1" value="<?php echo e($value['file_path1']); ?>">
                      <input type="hidden" name="photo2" value="<?php echo e($value['file_path2']); ?>">
                      <input type="hidden" name="photo3" value="<?php echo e($value['file_path3']); ?>">
                      <input type="hidden" name="photo4" value="<?php echo e($value['file_path4']); ?>">
                        <b >Apollo Profile</b>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col"><label class="forlaell"><b>Dog name</b></label><input type="text" style="width: 85%;height: 40px; background: white;
    border: 1px solid;" name="name"  value="<?=$value['name']?>" ></div>
                            <div class="col">
                                <label class="forlaell"><b>Dog breed</b></label>
                                <select type="text" style="background: white;
    border: 1px solid; width: 85%; height: 40px;" name="brand_id" id="brand_id" >

                                    <option value=""><?php echo e(('Select Breed')); ?>*</option>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breeds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  <?php if($value['brand_id']==$breeds->id){  echo "selected";  }  ?>  value="<?php echo e($breeds->id); ?>"><?php echo e($breeds->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col"><label class="forlaell"><b>Dog age</b></label>
                                <select type="text" style="width: 85%;height: 40px;" name="age" >
                                      <option value="">Select your dog's age*</option>
                                      <option  <?php if($value['age']==1){  echo "selected";  }  ?> value="1">1</option>
                                      <option  <?php if($value['age']==2){  echo "selected";  }  ?> value="2">2</option>
                                      <option  <?php if($value['age']==3){  echo "selected";  }  ?>  value="3">3</option>
                                      <option  <?php if($value['age']==4){  echo "selected";  }  ?>  value="4">4</option>
                                      <option  <?php if($value['age']==5){  echo "selected";  }  ?>  value="5">5</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="forlaell"><b>Select Gender</b></label>
                                <select type="text" style="width: 85%;height: 40px;" name="unit" >
                                    <option value=""><?php echo e(('Select Gender')); ?>*</option>
                                    <option  <?php if($value['unit']==0){  echo "selected";  }  ?> value="0">Male</option>
                                    <option  <?php if($value['unit']==1){  echo "selected";  }  ?> value="1">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col"><label class="forlaell"><b>Select Location</b></label>
                                <select type="text" style="width: 85%; height: 40px;" name="location_id">
                                     <option value=""><?php echo e(('Select Location')); ?>*</option>
                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  <?php if($value['location_id']==$cityss->id){  echo "selected";  }  ?> value="<?php echo e($cityss->id); ?>"><?php echo e($cityss->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="forlaell"><b>Select Good genes</b></label>
                                <select type="text" style="width: 85%;height: 40px;" name="category_id">
                                    <option value="">Select Genes*</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($value['category_id']==$category->id){  echo "selected";  }  ?> value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col"><label class="forlaell"><b>Description</b></label>
                                <input name="description" value="<?=$value['description']?>"  placeholder="Enter your dog's description" id="inputName4" required type="text" style=" background: white;
    border: 1px solid; width: 85%;height: 40px;" /></div>
                            <div class="col"></div>
                        </div>
                        <hr>
                    </div>
                    <div class="row" style="margin: 20px;">
                        <!-- <div class="col">
                            <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:Tomato; width: 300px; color: white; border-radius: 10px; margin: 10px;">Disable</button>
                        </div> -->

                        <div class="col">
                            <input type="hidden" name="idd" value="<?=$value['id']?>">
                            <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style=" color: white; width: 300px; border-radius: 10px; margin: 10px;">Update</button>
                        </div>
                    </div>
                </form>
        
            <?php  }   ?>
            <?php if(isset($_GET['id']) && $_GET['id'] == 'new' ){ ?>
                <form method="post" action="<?php echo e(route('home.store')); ?>"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="contentforprof">
                        <b>Your Account</b>
                        <div class="row">

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="new_myfile" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('images/Ellipse-177.png');">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="new_myfile1" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('images/Ellipse-177.png');">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="new_myfile2" id="imageUpload2" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('images/Ellipse-177.png');">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="new_myfile3" id="imageUpload3" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('images/Ellipse-177.png');">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="new_myfile4" id="imageUpload4" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('images/Ellipse-177.png');">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br><br id="res">
                    <div class="contentforprof">
                        <b >Apollo Profile</b>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <label class="forlaell"><b>Dog name</b></label>
                                <input type="text" name="name"  placeholder="Enter your dog's name*" style="width: 85%;height: 40px;">
                            </div>
                            <div class="col">
                                <label class="forlaell"><b>Dog breed</b></label>
                                <select type="text" name="brand_id" style="width: 85%;height: 40px;">
                                    <option value=""><?php echo e(('Select Breed')); ?>*</option>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breeds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option    value="<?php echo e($breeds->id); ?>"><?php echo e($breeds->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <label class="forlaell"><b>Dog age</b></label>
                                <select type="text" style="width: 85%;height: 40px;" name="age">
                                    <option value="1" style="background: url(images/beagle.png) 0 0 no-repeat;">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4">5</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="forlaell"><b>Select Gender</b></label>
                                <select type="text" style="width: 85%;height: 40px;" name="unit" >
                                    <option value=""><?php echo e(('Select Gender')); ?>*</option>
                                    <option  value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col">
                                <label class="forlaell"><b>Select Location</b></label>
                                <select type="text" name="location_id" style="width: 85%;height: 40px;">
                                    <option value=""><?php echo e(('Select Location')); ?>*</option>
                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  value="<?php echo e($citys->id); ?>"><?php echo e($citys->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="forlaell"><b>Select Good genes</b></label>
                                <select type="text" name="category_id" style="width: 85%;height: 40px;">
                                   <option value="">Select Genes*</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row" style="margin: 20px;">
                        <div class="col">
                            <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:Tomato; width: 300px; color: white; border-radius: 10px; margin: 10px;">+ Add More Dog Profile</button>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </form>
            <?php } ?>
         </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/dog_account.blade.php ENDPATH**/ ?>