<?php $__env->startSection('content'); ?>

<section class="pt-5 pb-5 all_breed">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 text-center breed-ctn pos-rel mb-5">All Breeds
					</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-end align-items-center w-100 pb-5">
					<!-- <h3 class="f-bold dd_heading f-28 color-00  breed-ctn pos-rel mb-0">Labrador Retriever
					</h3> -->
					<div class="dd_search d-flex align-items-center">
						<label class="f-15 gotham-medium mb-0 color-70">Sort by</label>
					    <form method="get" >
							<select class="form-control srch-form px-4 bdr-rdius24 gotham-book" data-live-search="true"  style="color: black;"  name="breeds" onchange="breed();"   id="exampleFormControlSelect1">
						      <option value="">All Breeds</option>
								<?php
									$breed = DB::table('breed')->where('status',1)->orderBy('name', 'ASC')->get(); 
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

		<?php  

		if(@$_GET['breeds']){
		  	$brd=@$_GET['breeds'];
			$breedss = DB::table('breed')->where('status',1)->where('id',$brd)->orderBy('name', 'ASC')->paginate(12);  
		}else{
			$breedss = DB::table('breed')->where('status',1)->orderBy('name', 'ASC')->paginate(12);
		}
		if(!empty($breedss)){
			foreach($breedss as $key =>$value){
			?>
			<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
				<div class="bl_Convers">
					<a href="https://dwiggydoo.com/all-connections/?breed=<?php echo e($value->name); ?>" class="d-block">
						<div class="row">
							<div class="col-lg-12">
								<div class="bl_Convers_img pos-rel">
	        						<?php   if($value->image!=''){ ?>
										<img src="<?php echo e($value->image); ?>">	
									<?php  }   else {   ?>
										<img src="https://dwiggydoo.com/images/No_image_available.svg.webp">	
									<?php  }   ?>
								</div>
							</div>
							<div class="col-lg-12 mb-4">
								<div class="bl_Convers_cnt">
									<strong class="f-18 f-sbold color-00 mb-2"><?=ucwords($value->name)?></strong> 
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<?php } }  else {   ?>
			  <div class="col-md-12 text-center no_more">
			   <div class="col-md-12 text-center no_more">
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
			  </div>
			  </div>
			<?php  }  ?>

		</div>
		<div class="row" style="float:right">
			<div class="col-12">
				<?php echo $breedss->links()?>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
	function breed(){
		// alert("filtering");
      document.getElementById("myForm").click();
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/all-connections-breed.blade.php ENDPATH**/ ?>