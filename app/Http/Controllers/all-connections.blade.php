@extends('frontend.layouts.app')
@section('content')
<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- <h1 class="f-40 color-00 f-bold mb-5 text-center">All Matches</h1> -->
				<!-- <div class="mb-5 text-center"><img src="images/all_conection/all_bread.png" class="img-fluid"></div> -->
				<h1 class="f-bold dd_heading f-40 color-00 text-center breed-ctn pos-rel mb-5">Labrador Retriever
					</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-end align-items-center w-100 pb-5">
					<!-- <h3 class="f-bold dd_heading f-28 color-00  breed-ctn pos-rel mb-0">Labrador Retriever
					</h3> -->
					<div class="dd_search d-flex align-items-center">
						<label class="f-15 gotham-medium mr-4 mb-0 color-70" style="width: auto;">Sort by</label>
						<form method="get" style="width: 200px;">
						<select class="form-control srch-form px-4 bdr-rdius24 gotham-book " name="city" id="exampleFormControlSelect1" onchange="breed();">
					      <option value="">Location</option>
					     <?Php	    
					       $city = DB::table('city')->get(); 
                    foreach ($city as $key => $city){
				 ?>
					      <option  <?php  if($city->name==$_GET['city']){  ?> selected <?php  } ?>  value="<?=$city->name?>"><?=ucwords($city->name)?></option>
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

			<div class="col-xl-3 col-lg-4 col-md-6 mb-4 vd_dwiggy">
				<div class="bl_Convers">
					<div class="row">
						<div class="col-lg-12">
							<div class="bl_Convers_img pos-rel">
								<?php   if($product->file_path!=''){ 
                            $fgf=explode('.',$product->file_path); 
					      if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
				    	<img src="{{$product->file_path}}" >
									            <?php  } else {   ?>
					       <video controls>
					       <source src="{{$product->file_path}}" type="video/mp4">
					       Your browser does not support the video tag.
					      </video>   			
									        <?php }  




									?>

								<!-- <img src="{{ $product->file_path }}"> -->


								<?php  }   else {   ?>
								<img src="{{ uploaded_asset($product->thumbnail_img) }}">
							    <?php  }   ?>
							</div>
						</div>
						<div class="col-lg-12 mb-4">
							<div class="bl_Convers_cnt">
								<strong class="f-18 f-sbold color-00 mb-2">{{ $product->name}}</strong>
								<p class="f-13 f-reg color-brown"><span>Breed</span>  <b class="f-sbold">{{$breed->name}}</b> </p> 
								<p class="f-13 f-reg color-brown"><span>Gender</span>  <b class="f-sbold"><?php if($product->unit==0){ echo "Male"; }else { echo "Female"; } ?></b> </p>  
								<p class="f-13 f-reg color-brown"><span>Location</span> <b class="f-sbold">{{$location_id->name}}</b> </p>
								  <div class="bl_Convers_chat mt-3">
								  	<a <?php if(isset(Auth::user()->id)){?> href="https://cilearningschool.com/dwiggydoo/send_request/{{$product->id}}"  <?php  } else {  ?> data-toggle="modal" data-target="#staticBackdrop" <?php  }  ?>  ><button value="{{$product->id}}" class="gotham-medium f-20 color-f3 bg-trsprnt bdr-none bdr-rdius6 py-2"><i class="fas fa-user-plus mr-2 color-f3"></i> Send Request</button></a>
								  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			 @endforeach

			 @else
  <div class="col-md-12 text-center no_more">
    <p>-- No More Products Found --</p>
  </div>
@endif
		
			
			
		</div>
		<div class="row" style="display: none;">
			<div class="col-12">
				<nav aria-label="Page navigation example" class="d-flex justify-content-end align-items-center">
						  <ul class="pagination w-100 justify-content-end">
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