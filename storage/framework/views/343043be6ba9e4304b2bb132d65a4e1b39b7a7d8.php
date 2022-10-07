<?php $__env->startSection('content'); ?>
<style type="text/css">
	.tradding_popup_box .carousel-item video{width: 100%;}
	.bl_Convers_bdr .carousel-item video{width: 100%;
    margin-bottom: 80px;}
</style>
<section class="pt-5 pb-5">
	<div class="container">

	<?php if(@$product[0]->id!=''||@$product1[0]->id!=''){   ?>

		<div class="row">
			<div class="col-12 mb-5">
				<div class="text-center mb-4"><img src="images/my_connection.png" class="img-fluid"></div>
				<h1 class="f-bold dd_heading f-40 color-f3 text-center breed-ctn pos-rel mb-2">You Catch I Match
				</h1>
				<p class="color-00 text-center f-35 f-bold">Thank You!!!</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-between align-items-center w-100 pb-5">
					<h3 class="f-bold dd_heading f-28 color-00  breed-ctn pos-rel mb-0">Pawsitive Conversations
					</h3>
					<div class="dd_search d-flex align-items-center">
						<!-- <label class="f-15 gotham-medium mr-4 mb-0 color-70">Sort by</label>
						<select class="form-control srch-form px-4 bdr-rdius24 gotham-book " id="exampleFormControlSelect1">
					      <option>New to old</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">

			<?php 

			foreach ($product as $key => $value) {
				    
				$wishlist = DB::table('dog_wishlists')->where('user_id', Auth::user()->id)->where('dog_id', $value->id)->first();
		    ?>

			<?php  
			$breed = DB::table('breed')->where([
			['id', '=', $value->brand_id],
			])->first();
			$location_id = DB::table('city')->where([
			['id', '=', $value->location_id],
			])->first();

			$categories = DB::table('categories')->where([
			['id', '=', $value->category_id],
			])->first(); ?>

			<div class="col-12 mb-4">
				<div class="bl_Convers bl_Convers_bdr">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-12">
							<div class="bl_Convers_img pos-rel">
							    <div id="connect_gallery<?=$key?>" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
								    <li data-target="#connect_gallery<?=$key?>" data-slide-to="0" class="active">

								    	<?php   if($value->file_path!=''){ ?>

										<?php   $fgf=explode('.',$value->file_path); 
													if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path); ?>" >	
											
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >  			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
									    <?php  }   ?>
								    </li>
								    <?php   if($value->file_path1!=''){ ?>
								    <li data-target="#connect_gallery<?=$key?>" data-slide-to="1" class="active">
										<?php   $fgf=explode('.',$value->file_path1); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path1); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path2!=''){ ?>
								    <li data-target="#connect_gallery<?=$key?>" data-slide-to="2" class="active">
										<?php   $fgf=explode('.',$value->file_path2); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path2); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path3!=''){ ?>
								    <li data-target="#connect_gallery<?=$key?>" data-slide-to="3" class="active">
										<?php   $fgf=explode('.',$value->file_path3); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path3); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >  			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path4!=''){ ?>
								    <li data-target="#connect_gallery<?=$key?>" data-slide-to="4" class="active">
										<?php   $fgf=explode('.',$value->file_path4); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path4); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" > 		
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								  </ol>
								  <div class="carousel-inner" data-toggle="modal" data-target="#ModalMyConnection_<?=$key?>">
								  	<?php   if($value->file_path!=''){ ?>
								    <div class="carousel-item active">
								     <?php  if($value->file_path!=''){ $fgf=explode('.',$value->file_path); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path); ?>" class="d-block w-100" alt="..." height="227px">	
									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										<?php }  
										}   else {   ?>
										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
									<?php } ?>

								    <?php   if($value->file_path1!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path1!=''){
								     	$fgf=explode('.',$value->file_path1); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path1); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path1); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  <?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php   if($value->file_path2!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path2!=''){ $fgf=explode('.',$value->file_path2); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path2); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path2); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										  <?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    	<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php if($value->file_path3!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path3!=''){ $fgf=explode('.',$value->file_path3); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path3); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path3); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>

								    <?php   if($value->file_path4!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path4!=''){ $fgf=explode('.',$value->file_path4); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path4); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path4); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>
								  </div>
								</div>
								<div class="bl_Convers_heart <?= !empty($wishlist->id)? 'active': ''; ?>" onclick="wishlist_items(<?php echo e(Auth::user()->id); ?>, <?php echo e($value->id); ?>);">
									<svg class="svg" version="1.0" xmlns="http://www.w3.org/2000/svg"
										width="65px" height="65px" viewBox="0 0 64.000000 64.000000"
										preserveAspectRatio="xMidYMid meet">
										<g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
											fill="#000000" stroke="none">
											<path d="M131 590 c-48 -11 -83 -40 -109 -91 -52 -98 -7 -204 136 -320 42 -34
												96 -80 119 -102 l42 -40 55 49 c55 50 71 84 38 84 -9 0 -34 -14 -55 -31 l-37
												-30 -102 83 c-57 46 -118 106 -136 133 -31 45 -34 56 -30 104 4 45 10 59 36
												82 59 53 128 50 188 -6 20 -19 40 -35 44 -35 5 0 23 15 42 34 57 57 131 60
												189 8 25 -23 33 -38 36 -78 6 -61 -10 -96 -75 -166 -34 -37 -43 -51 -34 -60
												29 -29 130 78 153 163 43 160 -118 278 -266 196 l-47 -27 -41 24 c-50 28 -99
												37 -146 26z"/>
											<path d="M257 423 c-14 -13 -7 -43 13 -53 15 -8 21 -6 30 11 17 30 -20 66 -43
												42z"/>
											<path d="M341 416 c-9 -11 -10 -20 -1 -35 9 -18 14 -19 31 -10 13 6 19 18 17
												32 -4 26 -30 34 -47 13z"/>
											<path d="M204 345 c-9 -22 22 -53 37 -38 15 15 7 47 -14 51 -9 2 -20 -4 -23
												-13z"/>
											<path d="M397 353 c-11 -10 -8 -41 4 -49 16 -9 43 21 36 40 -7 16 -28 21 -40
												9z"/>
											<path d="M271 296 c-25 -40 -27 -72 -5 -80 23 -9 97 -7 113 3 18 12 7 58 -21
												89 -31 32 -62 28 -87 -12z"/>
										</g>
									</svg>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 pr-4">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="bl_Convers_cnt bdr-none">
										<strong class="f-18 f-sbold color-00 mb-2"><?php echo e(@$value->name); ?></strong>
										<p class="f-13 f-reg color-brown"><span>Breed</span>  <b class="f-sbold"><?php echo e(@$breed->name); ?></b> </p> 
										<p class="f-13 f-reg color-brown"><span>Gender</span>  <b class="f-sbold"><?php if($value->unit==0){ echo "Male"; }else { echo "Female"; } ?> </b> </p>  
										<p class="f-13 f-reg color-brown"><span>Location</span> <b class="f-sbold"><?php echo e(@$location_id->name); ?></b> </p>
										<strong class="color-00 f-20 mt-2">Good Genes:</strong>
										<b class="color-f3 f-20 f-bold"><?=@$categories->name?></b>
									</div>
								</div>
								<div class="col-md-6">
									<div class="act_frnd text-right">
										<div class="act_frnd_bar text-right"><i class="fas fa-ellipsis-h"></i></div>
										<ul class="act_frnd_list mb-0" style="bottom: -97px;">
											<li><a href="<?php echo e(route('connections_unfriend', $value->id)); ?>"><button  class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/sad.png"> <span class="w-50 text-left pl-4">Unfriend</span></button></a></li>
											<li><a href="<?php echo e(route('connections_block', $value->id)); ?>"><button class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/cry.png"> <span class="w-50 text-left pl-4">Block</span></button></a></li>
											<li><a href="<?php echo e(route('connections_report', $value->id)); ?>"><button class="d-flex justify-content-center  gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/dead.png"> <span class="w-50 text-left pl-4">Report</span></button></a></li>
										</ul>
									</div>
									<!-- <div class="bl_chat_group">
										<button class="mb-4 gotham-medium f-16 color-fff bg-f3 bdr-none bdr-rdius6 w-100 py-3"><i class="fab fa-facebook-messenger color-fff"></i> Chat Now</button>
										<button class="mb-4 accepted show gotham-medium f-16 color-f3 bg-ff bdr-f3 bdr-rdius6 w-100 py-3">Dwiggy Doo World</button>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Men-->
			<div class="modal fade" id="ModalMyConnection_<?=$key?>" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
				<div class="tradding_popup_box">
					<div class="modal-dialog ">
						<div class="modal-content bdr-none" style="border-radius: 0;">
							<div class="modal-header w-100 d-block p-0">
								<div class="tradding_pp_header text-center pos-rel py-4">
									<img src="images/pop_lOGO.png" class="img-fluid" style="    max-width: 139px !important;">
									<span class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times color-00 f-35"></i></span>
								</div>
							</div>
							<div class="modal-body">
								<ul class="nav nav-tabs row" id="myTab<?=$key?>" role="tablist">
									<li class="nav-item col">
										<a class="nav-link active text-center tab-content" id="home-tab<?=$key?>" data-toggle="tab" href="#home<?=$key?>" role="tab" aria-controls="home"
										aria-selected="true"><img src="images/Icon-awesome-user.svg"> 's Profile</a>
									</li>
									<li class="nav-item col">
										<a class="nav-link" id="profile-tab<?=$key?>" data-toggle="tab" href="#profile<?=$key?>" role="tab" aria-controls="profile"
										aria-selected="false"> <img src="images/Icon-awesome-dog.png">'s Profile</a>
									</li>

								</ul><br>
								<div class="tab-content" id="myTabContent<?=$key?>">
									<div class="tab-pane fade show active" id="home<?=$key?>" role="tabpanel" aria-labelledby="home-tab<?=$key?>">
										<div class="bl_Convers_img pos-rel">
											<?php if(Auth::user()->avatar_original != null): ?>
							                    <img src="<?php echo e(Auth::user()->avatar_original); ?>" class="image rounded-circle">
							                <?php else: ?>
							                    <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="image rounded-circle">
							                <?php endif; ?>
											<!-- <div id="carouselExampleCaptionsPopup22" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
												</div>
												<ol class="carousel-indicators d-flex w-100 justify-content-between pos-rel my-4">
													<li data-target="#carouselExampleCaptionsPopup2" data-slide-to="0" class="active">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="1">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="2">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="3">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="4">
														<img src="images/my_cntction.png">
													</li>
												</ol>
											</div> -->
										</div>

									</div>
									<div class="tab-pane fade" id="profile<?=$key?>" role="tabpanel" aria-labelledby="profile-tab<?=$key?>">
										<div class="bl_Convers_img pos-rel">
											<div id="carouselProfilePopup<?=$key?>" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<?php   if($value->file_path!=''){ ?>
								    <div class="carousel-item active">
								     <?php  if($value->file_path!=''){ $fgf=explode('.',$value->file_path); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path); ?>" class="d-block w-100" alt="..." height="227px">	
									    <?php  } else {   ?>
											<video controls>
											<source src="<?php echo e($value->file_path); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 
										<?php }  
										}   else {   ?>
										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
									<?php } ?>

								    <?php   if($value->file_path1!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path1!=''){
								     	$fgf=explode('.',$value->file_path1); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path1); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path1); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php   if($value->file_path2!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path2!=''){ $fgf=explode('.',$value->file_path2); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path2); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path2); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    	<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php if($value->file_path3!=''){ ?>
								    <div class="carousel-item">
								     <?php  if($value->file_path3!=''){ $fgf=explode('.',$value->file_path3); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path3); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path3); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>

								    <?php   if($value->file_path4!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path4!=''){ $fgf=explode('.',$value->file_path4); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path4); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path4); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>
												</div>
												<ol class="carousel-indicators d-flex w-100 justify-content-between pos-rel my-4">
													<li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="0" class="active">

								    	<?php   if($value->file_path!=''){ ?>

										<?php   $fgf=explode('.',$value->file_path); 
													if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >    			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
									    <?php  }   ?>
								    </li>
								    <?php   if($value->file_path1!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="1" class="active">
										<?php   $fgf=explode('.',$value->file_path1); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path1); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >    			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path2!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="2" class="active">
										<?php   $fgf=explode('.',$value->file_path2); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path2); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path3!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="3" class="active">
										<?php   $fgf=explode('.',$value->file_path3); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path3); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >     			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path4!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="4" class="active">
										<?php   $fgf=explode('.',$value->file_path4); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path4); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
												</ol>
											</div>
										</div>


									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>

			<?php 

			foreach ($product1 as $key => $value) {
				    
				$wishlist = DB::table('dog_wishlists')->where('user_id', Auth::user()->id)->where('dog_id', $value->id)->first();
		    ?>

			<?php  
			$breed = DB::table('breed')->where([
			['id', '=', $value->brand_id],
			])->first();
			$location_id = DB::table('city')->where([
			['id', '=', $value->location_id],
			])->first();

			$categories = DB::table('categories')->where([
			['id', '=', $value->category_id],
			])->first(); ?>

			<div class="col-12 mb-4">
				<div class="bl_Convers bl_Convers_bdr">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-12">
							<div class="bl_Convers_img pos-rel">
							    <div id="connect_gallery1<?=$key?>" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
								    <li data-target="#connect_gallery1<?=$key?>" data-slide-to="0" class="active">

								    	<?php   if($value->file_path!=''){ ?>

										<?php   $fgf=explode('.',$value->file_path); 
													if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path); ?>" >	
											
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >  			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
									    <?php  }   ?>
								    </li>
								    <?php   if($value->file_path1!=''){ ?>
								    <li data-target="#connect_gallery1<?=$key?>" data-slide-to="1" class="active">
										<?php   $fgf=explode('.',$value->file_path1); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path1); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path2!=''){ ?>
								    <li data-target="#connect_gallery1<?=$key?>" data-slide-to="2" class="active">
										<?php   $fgf=explode('.',$value->file_path2); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path2); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path3!=''){ ?>
								    <li data-target="#connect_gallery1<?=$key?>" data-slide-to="3" class="active">
										<?php   $fgf=explode('.',$value->file_path3); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path3); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" >  			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path4!=''){ ?>
								    <li data-target="#connect_gallery1<?=$key?>" data-slide-to="4" class="active">
										<?php   $fgf=explode('.',$value->file_path4); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path4); ?>" >	
									 
									 	<?php  } else {   ?>
									       
									       <img src="images/video_dummy_icon.jpg" > 		
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								  </ol>
								  <div class="carousel-inner" data-toggle="modal" data-target="#ModalMyConnection_<?=$key?>">
								  	<?php   if($value->file_path!=''){ ?>
								    <div class="carousel-item active">
								     <?php  if($value->file_path!=''){ $fgf=explode('.',$value->file_path); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path); ?>" class="d-block w-100" alt="..." height="227px">	
									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										<?php }  
										}   else {   ?>
										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
									<?php } ?>

								    <?php   if($value->file_path1!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path1!=''){
								     	$fgf=explode('.',$value->file_path1); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path1); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path1); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  <?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php   if($value->file_path2!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path2!=''){ $fgf=explode('.',$value->file_path2); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path2); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path2); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										  <?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    	<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php if($value->file_path3!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path3!=''){ $fgf=explode('.',$value->file_path3); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path3); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path3); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  
										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>

								    <?php   if($value->file_path4!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path4!=''){ $fgf=explode('.',$value->file_path4); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path4); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>
											
									        <video controls>
										       <source src="<?php echo e($value->file_path4); ?>" type="video/mp4">
										       Your browser does not support the video tag.
										      </video>  

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>
								  </div>
								</div>
								<div class="bl_Convers_heart <?= !empty($wishlist->id)? 'active': ''; ?>" onclick="wishlist_items(<?php echo e(Auth::user()->id); ?>, <?php echo e($value->id); ?>);">
									<svg class="svg" version="1.0" xmlns="http://www.w3.org/2000/svg"
										width="65px" height="65px" viewBox="0 0 64.000000 64.000000"
										preserveAspectRatio="xMidYMid meet">
										<g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
											fill="#000000" stroke="none">
											<path d="M131 590 c-48 -11 -83 -40 -109 -91 -52 -98 -7 -204 136 -320 42 -34
												96 -80 119 -102 l42 -40 55 49 c55 50 71 84 38 84 -9 0 -34 -14 -55 -31 l-37
												-30 -102 83 c-57 46 -118 106 -136 133 -31 45 -34 56 -30 104 4 45 10 59 36
												82 59 53 128 50 188 -6 20 -19 40 -35 44 -35 5 0 23 15 42 34 57 57 131 60
												189 8 25 -23 33 -38 36 -78 6 -61 -10 -96 -75 -166 -34 -37 -43 -51 -34 -60
												29 -29 130 78 153 163 43 160 -118 278 -266 196 l-47 -27 -41 24 c-50 28 -99
												37 -146 26z"/>
											<path d="M257 423 c-14 -13 -7 -43 13 -53 15 -8 21 -6 30 11 17 30 -20 66 -43
												42z"/>
											<path d="M341 416 c-9 -11 -10 -20 -1 -35 9 -18 14 -19 31 -10 13 6 19 18 17
												32 -4 26 -30 34 -47 13z"/>
											<path d="M204 345 c-9 -22 22 -53 37 -38 15 15 7 47 -14 51 -9 2 -20 -4 -23
												-13z"/>
											<path d="M397 353 c-11 -10 -8 -41 4 -49 16 -9 43 21 36 40 -7 16 -28 21 -40
												9z"/>
											<path d="M271 296 c-25 -40 -27 -72 -5 -80 23 -9 97 -7 113 3 18 12 7 58 -21
												89 -31 32 -62 28 -87 -12z"/>
										</g>
									</svg>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 pr-4">
							<div class="row align-items-center">
								<div class="col-md-6">
									<div class="bl_Convers_cnt bdr-none">
										<strong class="f-18 f-sbold color-00 mb-2"><?php echo e(@$value->name); ?></strong>
										<p class="f-13 f-reg color-brown"><span>Breed</span>  <b class="f-sbold"><?php echo e(@$breed->name); ?></b> </p> 
										<p class="f-13 f-reg color-brown"><span>Gender</span>  <b class="f-sbold"><?php if($value->unit==0){ echo "Male"; }else { echo "Female"; } ?> </b> </p>  
										<p class="f-13 f-reg color-brown"><span>Location</span> <b class="f-sbold"><?php echo e(@$location_id->name); ?></b> </p>
										<strong class="color-00 f-20 mt-2">Good Genes:</strong>
										<b class="color-f3 f-20 f-bold"><?=@$categories->name?></b>
									</div>
								</div>
								<div class="col-md-6">
									<div class="act_frnd text-right">
										<div class="act_frnd_bar text-right"><i class="fas fa-ellipsis-h"></i></div>
										<ul class="act_frnd_list mb-0" style="bottom: -97px;">
											<li><a href="<?php echo e(route('connections_unfriend', $value->id)); ?>"><button  class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/sad.png"> <span class="w-50 text-left pl-4">Unfriend</span></button></a></li>
											<li><a href="<?php echo e(route('connections_block', $value->id)); ?>"><button class="d-flex justify-content-center bdr_btm_light gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/cry.png"> <span class="w-50 text-left pl-4">Block</span></button></a></li>
											<li><a href="<?php echo e(route('connections_report', $value->id)); ?>"><button class="d-flex justify-content-center  gotham-medium f-16 bg-trsprnt bdr-none w-100"><img src="images/dead.png"> <span class="w-50 text-left pl-4">Report</span></button></a></li>
										</ul>
									</div>
									<!-- <div class="bl_chat_group">
										<button class="mb-4 gotham-medium f-16 color-fff bg-f3 bdr-none bdr-rdius6 w-100 py-3"><i class="fab fa-facebook-messenger color-fff"></i> Chat Now</button>
										<button class="mb-4 accepted show gotham-medium f-16 color-f3 bg-ff bdr-f3 bdr-rdius6 w-100 py-3">Dwiggy Doo World</button>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Men-->
			<div class="modal fade" id="ModalMyConnection_<?=$key?>" tabindex="-1" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
				<div class="tradding_popup_box">
					<div class="modal-dialog ">
						<div class="modal-content bdr-none" style="border-radius: 0;">
							<div class="modal-header w-100 d-block p-0">
								<div class="tradding_pp_header text-center pos-rel py-4">
									<img src="images/pop_lOGO.png" class="img-fluid" style="    max-width: 139px !important;">
									<span class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times color-00 f-35"></i></span>
								</div>
							</div>
							<div class="modal-body">
								<ul class="nav nav-tabs row" id="myTab<?=$key?>" role="tablist">
									<li class="nav-item col">
										<a class="nav-link active text-center tab-content" id="home-tab<?=$key?>" data-toggle="tab" href="#home<?=$key?>" role="tab" aria-controls="home"
										aria-selected="true"><img src="images/Icon-awesome-user.svg"> 's Profile</a>
									</li>
									<li class="nav-item col">
										<a class="nav-link" id="profile-tab<?=$key?>" data-toggle="tab" href="#profile<?=$key?>" role="tab" aria-controls="profile"
										aria-selected="false"> <img src="images/Icon-awesome-dog.png">'s Profile</a>
									</li>

								</ul><br>
								<div class="tab-content" id="myTabContent<?=$key?>">
									<div class="tab-pane fade show active" id="home<?=$key?>" role="tabpanel" aria-labelledby="home-tab<?=$key?>">
										<div class="bl_Convers_img pos-rel">
											<?php if(Auth::user()->avatar_original != null): ?>
							                    <img src="<?php echo e(Auth::user()->avatar_original); ?>" class="image rounded-circle">
							                <?php else: ?>
							                    <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>" class="image rounded-circle">
							                <?php endif; ?>
											<!-- <div id="carouselExampleCaptionsPopup22" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
													<div class="carousel-item">
														<img src="images/my_cntction.png" class="d-block w-100" alt="...">
													</div>
												</div>
												<ol class="carousel-indicators d-flex w-100 justify-content-between pos-rel my-4">
													<li data-target="#carouselExampleCaptionsPopup2" data-slide-to="0" class="active">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="1">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="2">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="3">
														<img src="images/my_cntction.png">
													</li>
													<li data-target="#carouselExampleCaptionsPopup22" data-slide-to="4">
														<img src="images/my_cntction.png">
													</li>
												</ol>
											</div> -->
										</div>

									</div>
									<div class="tab-pane fade" id="profile<?=$key?>" role="tabpanel" aria-labelledby="profile-tab<?=$key?>">
										<div class="bl_Convers_img pos-rel">
											<div id="carouselProfilePopup<?=$key?>" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<?php   if($value->file_path!=''){ ?>
								    <div class="carousel-item active">
								     <?php  if($value->file_path!=''){ $fgf=explode('.',$value->file_path); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path); ?>" class="d-block w-100" alt="..." height="227px">	
									    <?php  } else {   ?>
											<video controls>
											<source src="<?php echo e($value->file_path); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 
										<?php }  
										}   else {   ?>
										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
									<?php } ?>

								    <?php   if($value->file_path1!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path1!=''){
								     	$fgf=explode('.',$value->file_path1); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path1); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path1); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php   if($value->file_path2!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path2!=''){ $fgf=explode('.',$value->file_path2); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path2); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path2); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    	<?php  }   ?>
								    </div>
								    <?php } ?>

								    <?php if($value->file_path3!=''){ ?>
								    <div class="carousel-item">
								     <?php  if($value->file_path3!=''){ $fgf=explode('.',$value->file_path3); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path3); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path3); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>

								    <?php   if($value->file_path4!=''){?>
								    <div class="carousel-item">
								     <?php  if($value->file_path4!=''){ $fgf=explode('.',$value->file_path4); 
									   if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='webp'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
											
										<img src="<?php echo e($value->file_path4); ?>" class="d-block w-100" alt="..." height="227px">	

									    <?php  } else {   ?>

											<video controls>
											<source src="<?php echo e($value->file_path4); ?>" type="video/mp4">
											   Your browser does not support the video tag.
											</video> 

										<?php }  
										}   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" class="d-block w-100" alt="..." height="227px">
										
								    <?php  }   ?>
								    </div>
								    <?php  }   ?>
												</div>
												<ol class="carousel-indicators d-flex w-100 justify-content-between pos-rel my-4">
													<li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="0" class="active">

								    	<?php   if($value->file_path!=''){ ?>

										<?php   $fgf=explode('.',$value->file_path); 
													if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >    			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
									    <?php  }   ?>
								    </li>
								    <?php   if($value->file_path1!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="1" class="active">
										<?php   $fgf=explode('.',$value->file_path1); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path1); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >    			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path2!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="2" class="active">
										<?php   $fgf=explode('.',$value->file_path2); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path2); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path3!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="3" class="active">
										<?php   $fgf=explode('.',$value->file_path3); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path3); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >     			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
								    <?php   if($value->file_path4!=''){ ?>
								    <li data-target="#carouselProfilePopup<?=$key?>" data-slide-to="4" class="active">
										<?php   $fgf=explode('.',$value->file_path4); 
										if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='webp'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
										<img src="<?php echo e($value->file_path4); ?>" >	
									 
									 	<?php  } else {   ?>
									       <img src="images/video_dummy_icon.jpg" >   			
										<?php }  }   else {   ?>

										<img src="<?php echo e(uploaded_asset($value->thumbnail_img)); ?>" >
								    </li>
									<?php  }   ?>
												</ol>
											</div>
										</div>


									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

	<?php }else{ ?>

		<section class="pt-5 pb-5">
			<div class="container" >
				<div class="row">
					<div class="col-12 mb-5">
					<div class="text-center mb-4 f-Montserrat" style="font-family: 'Pacifico', cursive; font-size: 81px; color: black;">Oh Oh !</div>
						<div class="text-center mb-4"><img src="images/shutterstock_1610553859-removebg-preview.png" class="img-fluid"></div>
						
							<p class="color-00 text-center f-35 f-bold">Make Friends!	</p>
					</div>
				</div>
				
			</div>
		</section>
	<?php } ?>
	</div>
</section>
<section class="pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-between align-items-center w-100 pb-5">
					<h3 class="f-bold dd_heading f-25 color-27  breed-ctn pos-rel mb-0 mt-4">Pawfect Suggestions
					</h3>
					<div class="dd_search pos-rel">
					<a href="https://dwiggydoo.com/all-connections">	<p class="d-block color-blue f-28 f-sbold" style="cursor: pointer;">See All</p></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-6">
				<div class="row">
				    
			
<?php foreach ($products as $key => $products){  ?>   
					<div class="col-lg-6 mb-5">
						<div class="fsuggetion d-flex align-items-center">
							<div class="mr-4" style="width: 80px;
    height: 80px;">
							    
							  	<?php   if($products->file_path!=''){ 
                            $fgf=explode('.',$products->file_path); 
					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
				    	<img style="width: 80px; height: 80px; border-radius: 50%;object-fit: cover;" src="<?php echo e($products->file_path); ?>" >
									            <?php  } else {   ?>
					       <video style="width: 80px; height: 80px; border-radius: 50%;object-fit: cover;" controls>
					       <source src="<?php echo e($products->file_path); ?>" type="video/mp4">
					       Your browser does not support the video tag.
					      </video>   			
									        <?php }    ?>

							    <?php  }  else { ?>
							    	<img style="width: 80px; height: 80px; border-radius: 50%;object-fit: cover;" src="https://dwiggydoo.com/images/No_image_available.svg.webp">	
								  
								  
							    <?php  }   ?>
							    
							    
							    </div>
							<div class="fsuggetion_cnt">
								<h3 class="f-25 f-sbold color-27 mb-3"><?php echo e($products->name); ?></h3>
								<div class="dd_form_btn text-center">
								    
								    
	<?php	$requests = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$products->id)->where('status','0')->count();
	
		$requestsv = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$products->id)->where('status','1')->count();
	
if($requestsv>0){   ?>

	
	<button type="button" style="background: #008bb7;" class="btn btn-primary"><svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path></svg><!-- <i class="fas fa-user-plus mr-2"></i> Font Awesome fontawesome.com -->Connected</button>
 
	  <?php
} else	if($requests>0){   ?>
<button type="button" style="background: #008bb7;" class="btn btn-primary"><svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path></svg><!-- <i class="fas fa-user-plus mr-2"></i> Font Awesome fontawesome.com -->Request sent</button>
								  	
    	  <?php
} else {   ?>

								  	
								  	
								
    	  <a <?php if(@isset(Auth::user()->id)){?> href="https://dwiggydoo.com/send_request/<?php echo e($products->id); ?>"  <?php  } else {  ?> data-toggle="modal" data-target="#staticBackdrop" <?php  }  ?>>	<button type="button" class="btn btn-primary"><svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path></svg><!-- <i class="fas fa-user-plus mr-2"></i> Font Awesome fontawesome.com -->Send Request</button></a>  	
								  	
								  	
								  <?php  }  ?>
								  </div>
							</div>
						</div>
					</div>
	
		<?php  }  ?>			
					
			
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="Group1253 pos-rel text-center">
					<!--<img src="images/Group1253.png">-->
					<video  width="400" height="300" controls autoplay muted loop  playsinline style="pointer-events: none;">
  <source src="images/flower.mp4" type="video/mp4">
</video>
					<a href="#" class="color-blue f-25 f-sbold d-block" style="margin-top: -50px;">Dwiggy Doo live feed</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal Men-->

<?php  if(@$_GET['thnx']==1){  ?>
 <div class="pp_after">
  <div class="pp_after_body">
    <div class="pp_after_img"><img src="images/1.png" class="img-fluid"></div>
    <div class="pp_after_cnt pt-4">
      <h3 class="f-sbold f-35 color-27 mb-4 text-center">Request Send Successfully <br>Thank you for taking care of your woofy</h3>
      <a href="https://dwiggydoo.com/connections"><span class="color-blue f-20 f-sbold go_ahead" style="text-decoration: underline; cursor: pointer;">Go ahead</span></a>
    </div>
  </div>
</div> 
<?php  }   ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
<script type="text/javascript">
	$(document).ready(function(){

	});
	function wishlist_items(user_id, dog_id){
		jQuery.ajax({
			url: '<?php echo e(route("connections_dog_wishlists")); ?>',  
			data: { "_token": "<?php echo e(csrf_token()); ?>", user_id:user_id, dog_id:dog_id},  
			type: 'post',  
			  success: function(res) {  
			    //            
			  }  
		}); 
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/my_connection.blade.php ENDPATH**/ ?>