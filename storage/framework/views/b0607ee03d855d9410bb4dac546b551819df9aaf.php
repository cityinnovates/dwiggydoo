<?php $__env->startSection('content'); ?>
<section class="cmp_dtl my-5 pt-4">
	<div class="container">
		<div class="row">
		<?=$socialy->content?>
		</div>
	</div>
</section>
<section class="social_story mb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-27 text-center breed-ctn pos-rel mb-5">Your Social Stories
					</h1>
			</div>
		</div>
		<h3 class="f-bold dd_heading f-25 color-27  breed-ctn pos-rel mb-4">Your Story</h3>
	</div>
	<div class="our_story bg-lgray py-4">
		<div class="container">
			<div class="our_story_row d-flex align-items-center owl-carousel owl-theme">
				<div class="our_story_box mr-4 bg-ff">
					<form id="story" method="POST" enctype="multipart/form-data" action="https://dwiggydoo.com/customer_update_social">
						<?php echo csrf_field(); ?>
					<div class="our_story_img mb-4">
						<div class="box mb-4">
						    <div class="js--image-preview img_prev"></div>
						    <div class="upload-options">
						      <input type="file" name="myfile" class="image-upload" accept="image/*"   onchange="filesubmit();" />
						      <img id="uploadedImage" src="https://cilearningschool.com/dwiggydoo/images/upload_img.png" alt="Uploaded Image" accept="image/png, image/jpeg">
						    </div>
						  </div>
						</div>
						<input type="submit" id="foo"  style="display: none;" name="submit"  >
					</form>
					<script type="text/javascript">
						function filesubmit(){
							alert("uploaded");
						$( "#foo" ).trigger( "click" );
					}
					</script>
					<div class="our_story_cnt d-flex align-items-center">
						<img src="<?php echo Auth::user()->avatar_original?>" class="mr-3">
						<p class="f-18 f-medium color-46 mb-0"><?php echo Auth::user()->name?></p>
					</div>
				</div>
				
				
				
				  <?php   
                    foreach ($socials as $key => $value) {
                ?>
                	<div class="our_story_box mr-4 bg-ff">
					<div class="our_story_img mb-4">
						<button type="button" class="btn bdr-none bg-trsprnt" data-toggle="modal" data-target="#staticBackdrop<?=$value->id?>">
						  <img src="<?=$value->image?>" class="img-fluid">
						</button>
					</div>
					<div class="our_story_cnt d-flex align-items-center">
						<img src="<?=$value->uploaded_pic?>" class="mr-3">
						<p class="f-18 f-medium color-46 mb-0"><?=$value->uploaded_name?></p>
					</div>
				</div>  
				
				
				
					<?php  }   ?>
				
             

			</div>
		</div>
	</div>
	
</section>


  <?php   
                    foreach ($socials as $key => $value) {
                ?>

	<div class="modal fade" id="staticBackdrop<?=$value->id?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">
        	<div class="our_story_cnt d-flex align-items-center">
				<img src="<?=$value->uploaded_pic?>" class="mr-3" style="width: 46px;height: 46px;    border-radius: 50%;    object-fit: cover;">
				<p class="f-18 f-medium color-46 mb-0"><?=$value->uploaded_name?></p>
			</div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="<?=$value->image?>" class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn bg-f3 color-fff">Understood</button>
      </div>
    </div>
  </div>
</div>

	<?php  }   ?>
			

<section class="my-5 py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-27 text-center breed-ctn pos-rel mb-5">Your Concern our priority
				</h1>
				<h3 class="f-bold dd_heading f-25 color-27  breed-ctn pos-rel mb-5">What does a dog need the most</h3>
					
					<input  type="text" name="concern"   id="comment" class="px-3 py-3 w-100 bdr-rdius6 f-reg color-27" placeholder="Type your concern...….">
				
					<input type="submit" id="myBtn" name="submit"  style="display: none;">
				
				
				
	<!--</form>-->
	<div id="yoyo" style="display:block;">
		  <?php  

                     $cmnts = DB::table('blog_concern')->orderby('id','Desc')->get();
                     foreach($cmnts as $key => $value){
                     $user = DB::table('users')->where('id',$value->user_id)->first();  
                      $time2=time();
                     $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
                     ?>
	
	 <div class="cmt_ntcation_sec mt-4"  id="jojo" >
		<div class="cmt_ntcation d-flex">
			<div class="about_say_img mr-4"><img src="images/new_xd_images/user_img.png"></div>
			<div class="cmt_ntcation_area pos-rel">
				<div class="cmt_ntcation_body">
					<strong class="f-16 color-00 mb-4 d-block"><?php echo e($user->name); ?></strong>
					<p class="f-16 color-27 f-medium"><?php echo e($value->concern); ?></p>
				</div>
			
				<div class="cmt_ntcation_corner d-flex align-items-center">
					<p class="cmt_time mr-3 mb-0"><?php echo e($hourdiff); ?> hr</p>
					<span class="pointer"><i class="fa-solid fa-ellipsis"></i></span>
				</div>
			</div>
		</div>
		
    </div>
    <?php  }  ?>
    </div>


		</div>
	
	
	
	
	
	
	
			</div>
		</div>
	</div>
</section>


<script>
var input = document.getElementById("comment");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
 
    var comment=$('#comment').val();
    var id=$('#id').val();
	  $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/hsubmitconcern',
            data: {"concern":comment,"id": id,"_token": "<?php echo e(csrf_token()); ?>"},
            success:function(data) {
            $('#yoyo').html(data);
            $('#comment').val('');
          
        }
    });
 
  }
});


$("button").click(function(){
  $("p").toggle();
});
</script>


<section class="my-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bg_video bdr-rdius24"   style="background-image: url('https://dwiggydoo.com/public/<?php echo $file_namey;?>');height: 400px;">
					<div class="big_play_btn"><img src="images/new_xd_images/Icon-play-big.png"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="bg-yellow py-5"  >
	<div class="container">
		<div class="row">
			<div class="col-12 mb-5 mt-4">
				<h1 class="f-bold dd_heading f-40 color-27 text-center breed-ctn pos-rel mb-5"><?php echo e($social->title); ?>

					</h1>
			
				<p class="f-20 f-reg color-27 mb-4 text-center"><?=$social->content?> </p>
			</div>
		</div>
	</div>
</section>
<section class="my-5 pb-5" style="overflow: visible!important;">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="prf_otm text-center">
					<img src="https://dwiggydoo.com/public/<?php echo $file_name;?>" class="img-fluid mb-4">
					<h4 class="f-bold f-30 color-27"><?=$social->description?></h4>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-between align-items-center w-100 pb-5">
					<h3 class="f-bold dd_heading f-25 color-27  breed-ctn pos-rel mb-0">Find them a connection
						<img src="images/new_xd_images/logo-4.png" class="img-fluid dd_img_pos">
					</h3>
					<div class="dd_search pos-rel">
						<form method="get"  action="https://dwiggydoo.com/all-connections-breed" >
						<select class="selectpicker form-control srch-form px-4 bdr-rdius24 gotham-book" data-live-search="true"  style="color: black;"  name="breeds" onchange="breed();"   id="exampleFormControlSelect1">
					      <option value="">All Breeds</option>
				<?Php	      $breed = DB::table('breed')->where('status',1)->orderBy('name', 'ASC')->get(); 
                    foreach ($breed as $key => $breeds){
				 ?>
					      <option  <?php  if($breeds->id==@$_GET['breeds']){  echo "selected"; }  ?> value="<?=$breeds->id?>"><?=$breeds->name?></option>
					  <?php  }   ?>
					    </select>
					    <input type="submit" id="myForm" style="display: none;" name="submit" >
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul style="display: none;" class="nav nav-pills pb-2" id="pills-tab" role="tablist">

				  <li class="nav-item mr-4 mb-4" role="presentation">
				    <a class="nav-link active bdr-rdius24 color-f3 gothambold-f15" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ALL</a>
				  </li>

		<?php 	
		$breed = DB::table('breed')->where('status',1)->limit(8)->orderBy('name', 'Asc')->get();	  
		foreach ($breed as $key => $value) {
		
?>
				  <li class="nav-item mr-4 mb-4" role="presentation">
				    <a class="nav-link bdr-rdius24 color-f3 gothambold-f15" id="pills-profile-tab<?php echo e($value->id); ?>" data-toggle="pill" href="#pills-profile<?php echo e($value->id); ?>" role="tab" aria-controls="pills-profile<?php echo e($value->id); ?>" aria-selected="false"><?php echo e($value->name); ?></a>
				  </li>
		<?php }   ?>  
				
				</ul>
				<div class="tab-content" id="pills-tabContent">
				  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				  	<div class="row">



<?php

$breedss = DB::table('breed')->where('home_publish',1)->limit(8)->orderBy('name', 'ASC')->get();

foreach($breedss as $key =>$value){
								?>
								
						<div class="col-lg-3 col-md-4 col-sm-6 mb-5">
							<a href="https://dwiggydoo.com/all-connections/?breed=<?php echo e($value->name); ?>">
				
							<div class="dd_pet_box pos-rel">
								
                        <img src="<?php echo e($value->image); ?>"   >
                          
								<div class="dd_pet_cnt text-center w-100">
									<p class="color-fff f-16 f-sbold"><?=$value->name?></p>
								</div>
							</div>
						</a></div>


<?php  }  ?>
			
			
				
						<nav style="display: none;" aria-label="Page navigation example" class="dd_pagination pt-5 align-items-center">
						  <ul class="pagination">
						    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
						    <li class="page-item active"><a class="page-link" href="#">1</a></li>
						    <li class="page-item"><a class="page-link" href="#">2</a></li>
						    <li class="page-item"><a class="page-link" href="#">3</a></li>
						    <li class="page-item"><a class="page-link" href="#">4</a></li>
						    <li class="page-item"><a class="page-link" href="#">5</a></li>
						    <li class="page-item"><a class="page-link" href="#">6</a></li>
						    <li class="page-item"><a class="page-link" href="#">Next</a></li>
						  </ul>
						</nav>
					</div>
				  </div>
				<?php   foreach ($breed as $key => $value) {   ?>
				  <div class="tab-pane fade" id="pills-profile<?php echo e($value->id); ?>" role="tabpanel" aria-labelledby="pills-profile-tab<?php echo e($value->id); ?>">
				 


				 	<div class="row">
<?Php $product = DB::table('products')->where('website_type',2)->where(['published'=>1,'brand_id'=>$value->id])->limit(20)->get();  ?>
<?php if(count($product)){ ?>
<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
						<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
							<div class="dd_pet_box pos-rel">

								<!-- <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"> -->
								<?php 
                               $fgf=array();
                                  if($product->file_path!=''){ 


                                   $fgf=explode('.',$product->file_path); 

                          if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
                        <img src="<?php echo e($product->file_path); ?>"   >
                                                <?php  } else {   ?>
                           <video controls width=255  height=208>
                           <source src="<?php echo e($product->file_path); ?>" type="video/mp4">
                           Your browser does not support the video tag.
                          </video>      


								<?php  }  }  else {   ?>
								<img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>">
							    <?php  }   ?>
								<div class="dd_pet_cnt text-center w-100">
									<p class="color-fff f-16 f-sbold"><?php echo e($product->name); ?></p>
								</div>
							</div>
						</div>
						<!--<div class="Dwiggy_bnr_btn my-4"> -->
						<!--	<a class="nav-link bdr-rdius24 color-f3 gothambold-f15" id="pills-profile-tab59" data-toggle="pill" href="https://dwiggydoo.com/all-connections" role="tab" aria-controls="pills-profile59" aria-selected="false">VIEW ALL</a>-->
						<!--</div>-->


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
<?php }  else 
{ ?>   <div class="col-md-12 text-center no_more">
    <section class="no_match_found py-5">
	<div class="container">
		<div class="match_found text-center">
			<div class="match_found_top"><img src="images/new_img/ohno.png" class="img-fluid"></div>
			<div class="match_found_img"><img src="images/new_img/beagle-dog.png" class="img-fluid"></div>
			<div class="match_found_cnt">
				<h4 class="color-00 f-bold f-24 mb-0">You don't have a connection yet.</h4>
				<p class="f-bold f-24 color-f3">Find them a mate now!</p>
			</div>
		</div>
	</div>
</section>
  </div> <?php }  ?>

						
						<nav style="display: none;" aria-label="Page navigation example" class="dd_pagination pt-5 align-items-center">
						  <ul class="pagination">
						    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
						    <li class="page-item active"><a class="page-link" href="#">1</a></li>
						    <li class="page-item"><a class="page-link" href="#">2</a></li>
						    <li class="page-item"><a class="page-link" href="#">3</a></li>
						    <li class="page-item"><a class="page-link" href="#">4</a></li>
						    <li class="page-item"><a class="page-link" href="#">5</a></li>
						    <li class="page-item"><a class="page-link" href="#">6</a></li>
						    <li class="page-item"><a class="page-link" href="#">Next</a></li>
						  </ul>
						</nav>
					</div> 	
					<!-- <div class="row">
						<div class="col-12 my-2">
							
						</div>
					</div> -->


				  </div>
				<?php   }   ?>
				</div>
			</div>
		</div>
			<div class="row">
						<div class="col-12 my-2 text-right nav-pills">
							<div class="Dwiggy_bnr_btn mb-5" style="display: inline-block;"> 
								<a class="nav-link bdr-rdius24 color-f3 gothambold-f15" href="https://dwiggydoo.com/all-connections-breed">VIEW ALL</a>
							</div>
						</div>
					</div>	
	</div>
</section>
<?php $__env->stopSection(); ?>
<!-- Modal -->

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/social.blade.php ENDPATH**/ ?>