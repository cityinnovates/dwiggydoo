@extends('frontend.layouts.app')
@section('content')

<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 text-center breed-ctn pos-rel mb-5"><?=@$_GET['breed']?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-end align-items-center w-100 pb-5">
					<!-- <h3 class="f-bold dd_heading f-28 color-00  breed-ctn pos-rel mb-0">Labrador Retriever
					</h3> -->
					<div class="dd_search d-flex align-items-center">
						<label class="f-15 gotham-medium mr-4 mb-0 color-70">Sort by</label>

						<form method="get" style="width: 200px;">
						<select class="form-control srch-form bdr-rdius24 gotham-book " name="city" id="exampleFormControlSelect1" onchange="breed();">
					      	<option value="">Location</option>
					     	<?Php	    
					       		$city = DB::table('city')->get(); 
			                    foreach ($city as $key => $city){
							 ?>
					      		<option  <?php  if($city->name==@$_GET['city']){  ?> selected <?php  } ?>  value="<?=$city->name?>"><?=ucwords($city->name)?></option>
					  		<?php  }   ?>
					    </select>
					     <input type="submit" id="myForm" style="display: none;" name="submit" >
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@if(count($product))
			@foreach ($product as $key => $product)
			<?php  
				$breed = DB::table('breed')->where([
				    ['id', '=', $product->brand_id],
				])->first();
				$location_id = DB::table('city')->where([
				    ['id', '=', $product->location_id],
				])->first();

			 ?>
			<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
				<div class="bl_Convers">
					<div class="row">
						<div class="col-lg-12">
							<div class="bl_Convers_img pos-rel">
								<?php   if($product->file_path!=''){ 
                            		$fgf=explode('.',$product->file_path); 
					      			if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
				    							<img src="{{$product->file_path}}" style="height: 200px;" >
								<?php  } else {   ?>
					       			<video controls>
								       	<source src="{{$product->file_path}}" type="video/mp4">
								       Your browser does not support the video tag.
								     </video>   			
								<?php }  ?> 
								<?php  }   else {   ?>
									<img src="https://dwiggydoo.com/images/No_image_available.svg.webp">	
								<?php  }   ?>
							</div>
						</div>
						<div class="col-lg-12 mb-4">
							<div class="bl_Convers_cnt">

								<strong class="f-18 f-sbold color-00 mb-2">{{ $product->name}}</strong>
								<p class="f-13 f-reg color-brown"><span>Breed</span>  <b class="f-sbold">{{$breed->name}}</b> </p> 

								<p class="f-13 f-reg color-brown"><span>Gender</span>  <b class="f-sbold"><?php if($product->unit==0){ echo "Male"; }else { echo "Female"; } ?></b> </p>  
								<p class="f-13 f-reg color-brown"><span>Location</span> <b class="f-sbold">{{$location_id->name}}</b> </p>

								<?php	
									$requests = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$product->id)->where('status','0')->count();

								   	@Auth::user()->id;
								   	$product->id;
								  	
								  	$requestsv = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$product->id)->where('status','1')->count();
									
									if($requestsv>0){   ?>

										<a><button value="{{$product->id}}" class="gotham-medium f-20 color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i class="fas fa-user-plus mr-2 color-f3"></i> Connected</button></a>
									 
									
									<?php } else if($requests>0) {   ?>

										<a><button  style="color: #128cf7;" value="{{$product->id}}" class="gotham-medium f-20 color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i  style="color: #128cf7;" class="fas fa-user-plus mr-2 color-f3"></i> Request Sent</button></a>

									<?php  } else { $brddd=@$_GET['breed']; ?>
																	  
								  	<a <?php if(isset(Auth::user()->id)){?> href="https://dwiggydoo.com/send_requests/{{$product->id}}?breed={{$brddd}}"  <?php  } else {  ?> data-toggle="modal" data-target="#staticBackdrop" <?php  }  ?>  ><button value="{{$product->id}}" class="gotham-medium f-20 color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i class="fas fa-user-plus mr-2 color-f3"></i> Send Request</button></a>
								  	<?php  }  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@else
			<?php	 
				$breed = DB::table('breed')->where([
			    ['name', '=', $_GET['breed']],
			])->first();
			?>
			<div class="col-md-12 text-center no_more">
			    <section class="no_match_found py-5">
					<div class="container">
						<div class="match_found text-center">
							<div class="match_found_top"><img src="images/Ohyes.png" class="img-fluid"></div>
							<div class="match_found_img"><img src="<?=$breed->image?>" class="img-fluid"></div>
							<div class="match_found_cnt">
								<h4 class="color-00 f-bold f-24 mb-0">I'am building up your family!</h4>
								<p class="f-bold f-24 color-f3">Find them a mate now!</p>
							</div>
						</div>
					</div>
				</section>
		  	</div>
			@endif
		</div>
		<div class="row" style="float:right">
			<div class="col-12">
				<?php  echo $products->links()?>
			</div>
		</div>
	</div>
</section>

@endsection


<script type="text/javascript">
	function breed(){
		// alert("filtering");
      document.getElementById("myForm").click();
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>