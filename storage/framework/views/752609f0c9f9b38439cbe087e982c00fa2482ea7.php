<!--<center><img style="margin-top:150px;" src="<?php echo e(route('home')); ?>/images/underconstruction.png"></center>-->


<?php $__env->startSection('header_style'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
 .slide {position: relative; width: 60%; margin: -70px auto; display: grid; height: 600px; overflow: hidden; } .slide:after {content: ""; position: absolute; bottom: 10px; left: 30%; background-color: #f7f7f7; width: 40%; height: 2px; border-radius: 10px; } .slide-items {position: relative; grid-area: 1/1; overflow: hidden; margin: 5px; border-radius: 12px; } .slide-items img {object-fit: cover; height: 100%; width: 100%; } .slide-nav {grid-area: 1/1; z-index: 2; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: auto 1fr; } .slide-items>* {position: absolute; top: 0; opacity: 0; pointer-events: none; } .slide-items>.active {position: relative; opacity: 1; poiter-events: initial; } .slide-nav button {-webkit-appearance: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0; } .slide-thumb {display: flex; grid-column: 1/3; padding: 0 15px; } .slide-thumb>span {flex: 1; display: block; height: 2px; background: #afafaf; margin: 3px; margin-top: 20px; border-radius: 3px; overflow: hidden; } .slide-thumb>span.done:after {content: ""; display: block; height: inherit; background: rgba(255, 255, 255, 0.9); border-radius: 3px; } .slide-thumb>span.active:after {content: ""; display: block; height: inherit; background: rgba(255, 255, 255, 0.9); border-radius: 3px; transform: translateX(-100%); animation: thumb 5s forwards linear; } @keyframes  thumb {to {transform: initial; } } header {position: relative; overflow: hidden; } .header2{height: 75vh; min-height: 25rem; width: 100%; } header video {position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; -ms-transform: translateX(-50%) translateY(-50%); -moz-transform: translateX(-50%) translateY(-50%); -webkit-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%); } header .container {position: relative; z-index: 2; } header .overlay {position: absolute; top: 0; left: 0; height: 100%; width: 100%; background-color: black; opacity: 0.5; z-index: 1; }
 @media (pointer: coarse) and (hover: none) {header {background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll; } header video {display: none; } } .borderr {position: relative; top: 35px; width: 278px; left: 70; } .girlwithpuppy {position: absolute; width: 300px; margin-top: -50px; margin-left: -298px; } ul {margin: 0 0 0 32px; line-height: 1.5 } .b1 {list-style-image: url(); }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php
	$slider_data = DB::table('homeslider')->where('id',6)->get();
	if(!empty($slider_data)):
	
	$str = $slider_data[0]->content;
?>
<header class="header2">
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?php echo e(uploaded_asset($slider_data[0]->banner_video)); ?>" type="video/mp4">
    </video>

    <!-- The header content -->
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="head-cnt f-49 f-bold" style=""><?= $slider_data[0]->title ?></h1>
          <?php echo htmlspecialchars_decode($str); ?>
          <div class="Dwiggy_bnr_btn mb-5"> 
            <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 signupnrb" href="<?= $slider_data[0]->link ?>"  color: white;">SIGN UP NOW!</a>
          </div>				
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>

<?php echo $__env->make('frontend.partials.stories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.effort-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.score_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.partials.score_missing_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="bnr-btm-sec py-5">
  <div class="container">
    <div class="row"><div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">Find The Right Breed</h2></div> </div>
    <div class="breed_sec pos-rel">
      <div class="dd_centre_div">
        <div class="dwiggy_cntr"><img src="<?php echo e(route('home')); ?>/images/dwiggy_cntr.png" class="img-fluid"></div>
        <div class="dd_arrow1"><img src="<?php echo e(route('home')); ?>/images/arrow1.png" class="img-fluid"></div>
        <div class="dd_arrow2"><img src="<?php echo e(route('home')); ?>/images/arrow2.png" class="img-fluid"></div>
        <div class="dd_arrow3"><img src="<?php echo e(route('home')); ?>/images/arrow3.png" class="img-fluid"></div>
        <div class="dd_arrow4"><img src="<?php echo e(route('home')); ?>/images/arrow4.png" class="img-fluid"></div>
      </div>
      <div class="row">
        <div class="col-md-6 text-center">
          <a href="https://dwiggydoo.com/all-connections-breed" class="d-block">
            <div class="breed_box">
              <div class="breed_icon mb-4 mt-5"><i class="fas fa-search color-f3 f-86"></i></div>
              <div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">All Breeds</h3></div>
            </div>
          </a>
        </div>
        <div class="col-md-6 text-center">
          <a href="https://dwiggydoo.com/blogs" class="d-block">
            <div class="breed_box">
              <div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
              <div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Their Health</h3></div>
            </div>
          </a>
        </div>
        <div class="col-md-6 text-center">
          <a href="https://dwiggydoo.com/dog_advice" class="d-block">
            <div class="breed_box">
              <div class="breed_icon mb-4 mt-5"><i class="fas fa-heart color-f3 f-86"></i></div>
              <div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Dating Advice</h3></div>
            </div>
          </a>
        </div>
        <div class="col-md-6 text-center">
          <a href="https://dwiggydoo.com/connections" class="d-block">
            <div class="breed_box">
              <div class="breed_icon mb-4 mt-5"><i class="fas fa-user-friends color-f3 f-86"></i></div>
              <div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Their Connections</h3></div>
            </div>
          </a>
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
            <img src="<?php echo e(route('home')); ?>/images/new_xd_images/logo-4.png" class="img-fluid dd_img_pos">
          </h3>
          <div class="dd_search pos-rel">
            <a href="<?php echo e(route('connections.breed')); ?>">
              <p class="redtoblue" style=" font-size: 18px"><b>View all</b> <img src="<?php echo e(route('home')); ?>/images/Icon ionic-ios-arrow-round-back@2x.png" style="width: 20px;"></p>
            </a>

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
				<?php  
        foreach ($breed as $key => $value) {
        ?>
				  <div class="tab-pane fade" id="pills-profile<?php echo e($value->id); ?>" role="tabpanel" aria-labelledby="pills-profile-tab<?php echo e($value->id); ?>">
            <div class="row">
            <?php 

              $product = DB::table('products')->where('website_type',2)->where(['published'=>1,'brand_id'=>$value->id])->limit(20)->get();
            ?>
            <?php if(count($product)){ ?>

            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
						<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
							<div class="dd_pet_box pos-rel">
                <?php 
                    $fgf=array();
                    if($product->file_path!=''){
                    $fgf=explode('.',$product->file_path);
                    if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {
                ?>
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
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	

        <?php }  else { ?>

            <div class="col-md-12 text-center no_more">
              <section class="no_match_found py-5">
              	<div class="container">
              		<div class="match_found text-center">
              			<div class="match_found_top"><img src="<?php echo e(route('home')); ?>/images/new_img/ohno.png" class="img-fluid"></div>
              			<div class="match_found_img"><img src="<?php echo e(route('home')); ?>/images/new_img/beagle-dog.png" class="img-fluid"></div>
              			<div class="match_found_cnt">
              				<h4 class="color-00 f-bold f-24 mb-0">You don't have a connection yet.</h4>
              				<p class="f-bold f-24 color-f3">Find them a mate now!</p>
              			</div>
              		</div>
              	</div>
              </section>
            </div>
          <?php }  ?>

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
				<?php   }   ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo $__env->make('frontend.partials.question_aws', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section>
  <div class="container">
    <img src="<?php echo e(route('home')); ?>/images/dwiggy_cntr.png" class="center">
    <br>
    <div class="row d-flex justify-content-center">
      <?php if(get_setting('home_about_section_heading') != null): ?>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 d-flex justify-content-center "><button class="btn2" onclick="champ11()"><b>What</b></button></div>
      <?php endif; ?>
      <?php if(get_setting('home_about_section_heading_why') != null): ?>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 d-flex justify-content-center"><button type="submit" class="btn2" onclick="champ22()"><b>Why</b></button></div>
      <?php endif; ?>
      <?php if(get_setting('home_about_section_heading_rewards') != null): ?>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 d-flex justify-content-center"><button type="submit" class="btn2" onclick="champ33()"><b>Rewards</b></button></div>
      <?php endif; ?>
    </div>
  </div>
</section>
<br>
<br>

<?php
 $str_word2 = json_decode(get_setting('home_about_section_content'), true)[0];
 $str_word3 = json_decode(get_setting('home_about_section_content_why'), true)[0];
 $str_word4 = json_decode(get_setting('home_about_section_content_rewards'), true)[0];
?>
<section class="pb-5 pt-4">
  <div class="container">
    <?php if(get_setting('home_about_section_heading') != null): ?>
    <div id="ddassa1">
      <div class="row">
        <div class="col-lg-7">
          <div class="dd_allCNT p-5">
            <h2 class="color-brown f-24 f-bold mb-4"><?php echo e(get_setting('home_about_section_heading')); ?></h2>
              
              <?php echo htmlspecialchars_decode($str_word2); ?>
            <div class="Dwiggy_bnr_btn mb-5">
              <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3" style="color: white;" href="<?php echo e(get_setting('home_about_section_button_link')); ?>">Read More <img src="<?php echo e(route('home')); ?>/images/Icon ionic-ios-arrow-round-back@2x.png" style="width: 20px;"></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div style="position: relative; left: 0; top: 0;">
            <img src="<?php echo e(route('home')); ?>/images/Rectangle 2924.png" class="borderr" />
            <img src="<?php echo e(uploaded_asset(json_decode(get_setting('home_about_section_image'), true)[0])); ?>" class="girlwithpuppy" />
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(get_setting('home_about_section_heading_why') != null): ?>
    <div id="ddassa2">
      <div class="row">
        <div class="col-lg-7">
          <div class="dd_allCNT p-5">
            <h2 class="color-brown f-24 f-bold mb-4"><?php echo e(get_setting('home_about_section_heading_why')); ?></h2>
              
              <?php echo htmlspecialchars_decode($str_word3); ?>

            <div class="Dwiggy_bnr_btn mb-5">
              <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3" style="color: white;"  href="<?php echo e(get_setting('home_about_section_button_link_why')); ?>">Read More <img src="<?php echo e(route('home')); ?>/images/Icon ionic-ios-arrow-round-back@2x.png" style="width: 20px;"></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div style="position: relative; left: 0; top: 0;">
            <img src="<?php echo e(route('home')); ?>/images/Rectangle 2924.png" class="borderr" />
            <img src="<?php echo e(uploaded_asset(json_decode(get_setting('home_about_section_image_why'), true)[0])); ?>" class="girlwithpuppy" />
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if(get_setting('home_about_section_heading_rewards') != null): ?>
    <div id="ddassa3">
      <div class="row">
        <div class="col-lg-7">
          <div class="dd_allCNT p-5">
            <h2 class="color-brown f-24 f-bold mb-4"><?php echo e(get_setting('home_about_section_heading_rewards')); ?></h2>
              
              <?php echo htmlspecialchars_decode($str_word4); ?>

            <div class="Dwiggy_bnr_btn mb-5">
             <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3" style="color: white;"  href="<?php echo e(get_setting('home_about_section_button_link_rewards')); ?>">Read More <img src="<?php echo e(route('home')); ?>/images/Icon ionic-ios-arrow-round-back@2x.png" style="width: 20px;"></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div style="position: relative; left: 0; top: 0;">
            <img src="<?php echo e(route('home')); ?>/images/Rectangle 2924.png" class="borderr" />
            <img src="<?php echo e(uploaded_asset(json_decode(get_setting('home_about_section_image_rewards'), true)[0])); ?>" class="girlwithpuppy" />
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>



<?php if(get_setting('home_world_section_heading') != null): ?>
<?php
 $str_word = json_decode(get_setting('home_world_section_content'), true)[0];
?>
<section class="pb-5 pt-4" style="background: url(<?php echo e(json_decode(get_setting('home_world_section_background'), true)[0]); ?>) 100% 0 no-repeat;">
	
		<div class="dd_bgimg  g_life">
			<div class="row">
				<div class="col-lg-7">
					<div class="dd_allCNT p-5">
						<h2 class="color-brown f-32 f-bold mb-4"><?php echo e(get_setting('home_world_section_heading')); ?></h2>
						
						<?php echo htmlspecialchars_decode($str_word); ?>
						<div class="Dwiggy_bnr_btn mb-5"> 
							<a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3" style="color: white;" href="<?php echo e(get_setting('home_world_section_button_link')); ?>">COMMING SOON</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<?php endif; ?>


<?php $slider_images = json_decode(get_setting('home_banner2_images'), true);  ?>
<?php $i = 0; ?>

<?php $i = 0;
$n=1;
?>
<?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $i++; ?>
<?php   $n++; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
      <div class="col-12">
        <h2 class="dd_head f-28 color-27 f-bold mb-5">Dwiggy Dodgy memes</h2>
      </div>
    </div>
		<div class="row">
		<?php $slider_images = json_decode(get_setting('home_banner2_images'), true);  ?>
    <?php $i = 0; ?>
    
    <?php 
      $i = 0;
      $n=1;
    ?>
    <?php $__currentLoopData = $slider_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $i++; ?>

    <div class="col-md-6  mb-4 <?php if($n==1){?> slideInLeft  <?php  } else { ?> slideInRight<?php }  ?>" data-wow-duration="1s" data-wow-delay="0s">
      <div class="dd_img">
        <img id="myImg<?php echo $n; ?>" alt="" src="<?php echo e(uploaded_asset($slider_images[$key])); ?>" class="img-fluid">
        <div id="myModal<?php echo $n; ?>" class="modal">
          <span class="close<?php echo $n; ?>">&times;</span>
          <img class="modal-content" id="img01<?php echo $n; ?>" src="<?php echo e(uploaded_asset($slider_images[$key])); ?>" >
          <br>
          <div class="centered">
            <a href="#" class="fb"><i class="fa-solid fa-thumbs-up"></i></a>
            <a href="#" class="insta"><i class="fa-solid fa-share-from-square"></i></a>
            <div id="caption<?php $n; ?>"></div>
          </div>
        </div>
      </div>
    </div>
		
  	<script>	
      var modal = document.getElementById("myModal<?php echo $n; ?>");

      var img = document.getElementById("myImg<?php echo $n; ?>");
      var modalImg = document.getElementById("img01<?php echo $n; ?>");
      var captionText = document.getElementById("caption<?php echo $n; ?>");
      img.onclick = function(){

        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        var $body = $(document.body);
      var oldWidth = $body.innerWidth();
      $body.css("overflow", "hidden");
      $body.width(oldWidth);
      }	

      var span<?php echo $n; ?> = document.getElementsByClassName("close<?php echo $n; ?>")[0];

      // When the user clicks on <span> (x), close the modal
      span<?php echo $n; ?>.onclick = function() { 
        modal.style.display = "none";
        var $body = $(document.body);
      $body.css("overflow", "auto");
      $body.width("auto");
      }
  	</script>	

  	
  		<?php   $n++; ?>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			 </div>
</section>


<?php
	$slider_data2 = DB::table('homeslider')->where('id',8)->get();
	if(!empty($slider_data2)):
	$str2 = $slider_data2[0]->content;
?>
<header class="header2">
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?php echo e(uploaded_asset($slider_data2[0]->banner_video)); ?>" type="video/mp4">
    </video>
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="head-cnt f-49 f-bold" ><?php echo e($slider_data2[0]->title); ?></h1>
          <?php echo htmlspecialchars_decode($str2); ?>
          <div class="Dwiggy_bnr_btn mb-5"> 
            <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 signupnrb" href="<?php echo e($slider_data2[0]->link); ?>" style="color: white;">SIGN UP NOW!</a>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>



<!---------second video header 3------------>
<?php
	$slider_data3 = DB::table('homeslider')->where('id',7)->get();
	if(!empty($slider_data3)):
		$str3 = $slider_data3[0]->content;
?>
<header class="header2">
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?php echo e(uploaded_asset($slider_data3[0]->banner_video)); ?>" type="video/mp4">
    </video>
    <!-- The header content -->
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="head-cnt f-49 f-bold" ><?php echo e($slider_data3[0]->title); ?></h1>
          <?php echo htmlspecialchars_decode($str3); ?>
          <div class="Dwiggy_bnr_btn mb-5"> 
            <a class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 signupnrb" href="<?php echo e($slider_data3[0]->link); ?>" style=" color: white;">KNOW ME</a>
          </div>			
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>

<!--Testimonial Section-->
<?php echo $__env->make('frontend.partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>


	  <?php 
        @$uid=Auth::user()->id;
        $socials = DB::table('socials')->where('end_time','>=',time())->where('user_id','!=',@$uid)->groupby('user_id')->get(); 
        foreach ($socials as $key => $value) {
    ?>
  <?php  }   ?>

<div class="modal fade rewardpagepop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: none;" id="css">
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	function breed(){
		// alert("filtering");
      document.getElementById("myForm").click();
}
</script>




<!-- Thank you popup after login -->
<?php  if(@$_GET['thnx']==1){  ?>
 <div class="pp_after">
  <div class="pp_after_body">
    <div class="pp_after_img"><img src="<?php echo e(route('home')); ?>/images/1.png" class="img-fluid"></div>
    <div class="pp_after_cnt pt-4">
      <h3 class="f-sbold f-35 color-27 mb-4 text-center">Thanking you <br> for taking care of your woofy</h3>
      <a href="https://dwiggydoo.com/"><span class="color-blue f-20 f-sbold go_ahead" style="text-decoration: underline; cursor: pointer;">Go ahead</span></a>
    </div>
  </div>
</div> 
<?php  }   ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer_script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$('.slider-rewards').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 6,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

    // Get the modal
    var modal = document.getElementById("myModal");

    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {

        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        var $body = $(document.body);
        var oldWidth = $body.innerWidth();
        $body.css("overflow", "hidden");
        $body.width(oldWidth);
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        var $body = $(document.body);
        $body.css("overflow", "auto");
        $body.width("auto");
    }
    
    function submitans(val1,val2,val3,val4,val5,val6)
    {
        // alert('hi');
      $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/hsubmitquesdaily',
            data: {"val1":val1,"val2":val2,"val3":val3,"val4":val4,"val5":val5,"val6":val6,"_token": "<?php echo e(csrf_token()); ?>"},
            success:function(data) {
        if(data==1)
        {
            window.reload();
        }
          
        }
    });   
    }
    
    function sliderdynamic1(uid)
    {
        // alert(uid);
      $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/sliderdynamicuserc',
            data: {"uid":uid,"_token": "<?php echo e(csrf_token()); ?>"},
            success:function(data) {
                // alert(data);
                  $('#css').empty();
                $('#css').html(data);
             
             
            class SlideStories {
  constructor(id) {
    this.slide = document.querySelector(`[data-slide=${id}]`);
    this.active = 0;
    this.init();
  }

  activeSlide(index) {
    this.active = index;
    this.items.forEach((item) => {
      item.classList.remove("active");
    });
    this.items[index].classList.add("active");
    this.thumbItems.forEach((item) => {
      item.classList.remove("active");
    });
    this.thumbItems[index].classList.add("active");
    this.autoSlide();
    console.log(this.thumbItems.classList);
  }

  prev() {
    if (this.active > 0) {
      this.activeSlide(this.active - 1);
    } else {
      this.activeSlide(this.items.length - 1);
    }
  }

  next() {
    if (this.active < this.items.length - 1) {
      this.activeSlide(this.active + 1);
    } else {
      this.activeSlide(0);
    }
  }

  addNavigation() {
    const nextBtn = this.slide.querySelector(".slide-next");
    const prevBtn = this.slide.querySelector(".slide-prev");
    nextBtn.addEventListener("click", this.next);
    prevBtn.addEventListener("click", this.prev);
  }

  addThumbItems() {
    this.items.forEach(() => (this.thumb.innerHTML += `<span></span>`));
    this.thumbItems = Array.from(this.thumb.children);
  }

  autoSlide() {
    clearTimeout(this.timeout);
    this.timeout = setTimeout(this.next, 5000);
  }

  init() {
    this.next = this.next.bind(this);
    this.prev = this.prev.bind(this);
    this.items = this.slide.querySelectorAll(".slide-items > *");
    this.thumb = this.slide.querySelector(".slide-thumb");
    this.addThumbItems();
    this.activeSlide(0);
    this.addNavigation();
  }
}

new SlideStories("slide"); 
                
       
          
        }
    });   
    }
    
     function sliderdynamic(uid)
    {
        // alert(uid);
      $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/sliderdynamicuser',
            data: {"uid":uid,"_token": "<?php echo e(csrf_token()); ?>"},
            success:function(data) {
                // alert(data);
                    $('#css').empty();
                $('#css').html(data);
             
             
            class SlideStories {
  constructor(id) {
    this.slide = document.querySelector(`[data-slide=${id}]`);
    this.active = 0;
    this.init();
  }

  activeSlide(index) {
    this.active = index;
    this.items.forEach((item) => {
      item.classList.remove("active");
    });
    this.items[index].classList.add("active");
    this.thumbItems.forEach((item) => {
      item.classList.remove("active");
    });
    this.thumbItems[index].classList.add("active");
    this.autoSlide();
    console.log(this.thumbItems.classList);
  }

  prev() {
    if (this.active > 0) {
      this.activeSlide(this.active - 1);
    } else {
      this.activeSlide(this.items.length - 1);
    }
  }

  next() {
    if (this.active < this.items.length - 1) {
      this.activeSlide(this.active + 1);
    } else {
      this.activeSlide(0);
    }
  }

  addNavigation() {
    const nextBtn = this.slide.querySelector(".slide-next");
    const prevBtn = this.slide.querySelector(".slide-prev");
    nextBtn.addEventListener("click", this.next);
    prevBtn.addEventListener("click", this.prev);
  }

  addThumbItems() {
    this.items.forEach(() => (this.thumb.innerHTML += `<span></span>`));
    this.thumbItems = Array.from(this.thumb.children);
  }

  autoSlide() {
    clearTimeout(this.timeout);
    this.timeout = setTimeout(this.next, 5000);
  }

  init() {
    this.next = this.next.bind(this);
    this.prev = this.prev.bind(this);
    this.items = this.slide.querySelectorAll(".slide-items > *");
    this.thumb = this.slide.querySelector(".slide-thumb");
    this.addThumbItems();
    this.activeSlide(0);
    this.addNavigation();
  }
}

new SlideStories("slide"); 
                
       
          
        }
    });   
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/index.blade.php ENDPATH**/ ?>