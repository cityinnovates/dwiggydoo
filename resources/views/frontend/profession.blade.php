@extends('frontend.layouts.app')
@section('header_style')
	<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
	<script src="https://www.chartjs.org/chartjs-chart-financial/chartjs-chart-financial.js"></script>
@endsection

@section('content')
@php 
    $profession = App\Models\Profession::where('category', Auth::user()->profession_id)->first();
	$ProfessionCategory =  App\Models\ProfessionCategory::where('id', Auth::user()->profession_id)->first();
	$content = @$profession->description;
@endphp
<section>
	<div class="container">
		<div class="row" style="margin: 10px;">
			<div class="col" >
				<img src="{{ Auth::user()->avatar_original }}" style="width: 80px;">
				<p><b>{{ Auth::user()->name }}</b></p>
			</div>
			<div class="col">
				<div style="float: right;" >
					<button  style=" background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">{{ @$ProfessionCategory->name }}</button>
				</div>
			</div>
		</div>
		<div style="width:100%">
			<canvas id="chart"></canvas>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<div class=" text-center">
					<button  style=" background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2017</button>
				</div>
			</div>
			<div class="col">
				<div class=" text-center">
					<button  style="background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2018</button>
				</div>
			</div>
			<div class="col">
				<div class=" text-center">
					<button  style="background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2019</button>
				</div>
			</div>
			<div class="col">
				<div class=" text-center">
					<button  style="background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2020</button>
				</div>
			</div>
			<div class="col">
				<div class=" text-center">
					<button  style="background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2021</button>
				</div>
			</div>
			<div class="col">
				<div class=" text-center">
					<button  style="background-color: #F3735F; color: white; border-radius: 25px; border: none;" type="submit" class="btn btn-primary">2022</button>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container"><br>
		<div class="row" style="background-color: #000;">
			<div class="col-8" style="margin: 15px;">
				<h1 style="color: white;"><b>{{ @$ProfessionCategory->name }}</b></h1>
				<img src="<?= route('home') ?>/images/RiDoubleQuotesL.png" style="margin-top: 20px;"><br>
				<div style="color: white; margin-top: 20px; font-size: 18px;"><?php echo htmlspecialchars_decode($content); ?></div>
			</div>
			<div class="col">
				<img src="{{ uploaded_asset(@$profession->photo) }}">
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container" >
		<div class="whole" style="margin-top: 60px;">
			<h1 style="color: black;"><b>Worthy Doctors In your Locality</b></h1>
			<div class="row">
			@if(count($products))
			@foreach ($products as $key => $product)
			<?php  
				$breed = DB::table('breed')->where([
				    ['id', '=', $product->brand_id],
				])->first();
				$location_id = DB::table('city')->where([
				    ['id', '=', $product->location_id],
				])->first();
				$wishlist = DB::table('dog_wishlists')->where('user_id', Auth::user()->id)->where('dog_id', $product->id)->first();
				$users = DB::table('users')->where('id', $product->user_id)->first();
			 ?>
				<div class="col-md-3">
					<div class="bl_Convers bl_Convers_bdr">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="bl_Convers_img pos-rel">
									<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators" style="margin-left: -80px;">
											<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active">
												<?php   if($product->file_path!=''){ 
			                            		$fgf=explode('.',$product->file_path); 
								      			if($fgf[2]=='jpg'||$fgf[2]=='jpeg'||$fgf[2]=='png'||$fgf[2]=='svg'||$fgf[2]=='jpg'||$fgf[2]=='gif') {  ?>
							    							<img src="{{$product->file_path}}">
											<?php  } else {   ?>
								       			<video controls>
											       	<source src="{{$product->file_path}}" type="video/mp4">
											       Your browser does not support the video tag.
											     </video>   			
											<?php }  ?> 
											<?php  }   else {   ?>
												<img src="https://dwiggydoo.com/images/No_image_available.svg.webp">	
											<?php  }   ?>
											</li>
										</ol>
										<div class="carousel-inner" data-toggle="modal" data-target="#ModalMyConnection2" style="    width: 155%;">
											<div class="carousel-item active">
												<img src="{{ $users->avatar_original }}" style="height: 200px;" class="img-fluid">

											</div>
										</div>
									</div>
									<div class="bl_Convers_heart <?= !empty($wishlist->id)? 'active': ''; ?>" onclick="wishlist_items({{ Auth::user()->id }}, {{ $product->id }});">
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
							<div class="col-md-12 py-4 px-5">
								<div class="row">
									<div class="col"><p><b>Owner Name:{{ $users->name }}</b><br>
										Location: {{$location_id->name}}<br> </p></div>
										<div class="col"><p><b>Profession:</b> {{ $product->name}}<br>
											<b>Age</b>:{{ $product->age}}
										</p></div>
								</div>
								<br>
								<div class=" text-center" > 
									


								<?php	
									$requests = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$product->id)->where('status','0')->count();

								   	Auth::user()->id;
								   	$product->id;
								  	
								  	$requestsv = DB::table('connection')->where('send_by',@Auth::user()->id)->where('product_for',$product->id)->where('status','1')->count();
									
									if($requestsv>0){   ?>

									<a> <button value="{{$product->id}}" style="background-color: #f3735f; border: none; color: white;" type="submit" class="btn btn-primary">
										<svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
											<path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
										</svg>
										Connected
									</button></a>
									
									<?php } else if($requests>0) {   ?>

										<a><button value="{{$product->id}}" style="background-color: #5f86f3; border: none; color: white;" type="submit" class="btn btn-primary">
										<svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
											<path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
										</svg> Request Sent
									</button></a>

									<?php  } else { $brddd=@$_GET['breed']; ?>
																	  
								  	<a <?php if(isset(Auth::user()->id)){?> href="https://dwiggydoo.com/send_requests/{{$product->id}}?breed={{$brddd}}"  <?php  } else {  ?> data-toggle="modal" data-target="#staticBackdrop" <?php  }  ?>  ><button value="{{$product->id}}" style="background-color: #f3735f; border: none; color: white;" type="submit" class="btn btn-primary">
										<svg class="svg-inline--fa fa-user-plus mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
											<path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z"></path>
										</svg> Send Request
									</button></a>

								  	<?php  }  ?>
								</div>
							</div>
						</div>
					</div><br>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>
<?php 
	$details1 = @$ProfessionCategory->details1;
	$details2 = @$ProfessionCategory->details2;
?>
<section>
	<div class="container septype">

		<div class="row" style="text-align: center;  ">
			<div class="col " id="heading11" style="border-radius: 0px; "><a class="thn" onclick="mytabris()">Potential Reason For Growth</a></div>
			<div class="col " id="heading22" style="border-radius: 0px; "><a" class="thn" onclick="mytabris2()" >Trending ways of grwing</a></div>

		</div>
		<div class="container " id="firsttab" >
			<div class="contentff" >
				<?php echo htmlspecialchars_decode($details1); ?>

			</div>
		</div>
		<div class="container " id="secondtab">
			<div class="contentff" >
				<?php echo htmlspecialchars_decode($details2); ?>

			</div>
		</div>

	</div>	
</section>
</section>
<div class="container">
	<h1 style="color: black; margin-top: 20px;"><b>Area of Concern</b></h1>
	<img src="{{ uploaded_asset($ProfessionCategory->photo) }}">
</div>
<!-- <div style="display: none;">
Mixed:
<select id="mixed">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
<button id="update">Update</button>
<button id="randomizeData">Randomize Data</button>
</div> -->
</section>
<section class="bg-yellow py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 mb-5 mt-4">
				<img src="<?=route('home')?>/images/RiDoubleQuotesL.png">
				<p class="f-20 f-reg color-27 mb-4 text-center">{{ json_decode($ProfessionCategory->testimonial_content, true)[1] }}</p>

			</div>
		</div>
	</div>
</section>
<section class="my-5 pb-5" style="overflow: visible!important;">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="prf_otm2 text-center" style="    margin-top: -12%;">

					<img src="{{ uploaded_asset(json_decode($ProfessionCategory->testimonial_photo, true)[1]) }}" class="img-fluid mb-4">
					<h4 class="f-bold f-30 color-27">{{ json_decode($ProfessionCategory->testimonial_name, true)[1] }}</h4>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

@section('footer_script')
<script type="text/javascript">
	$(document).ready(function(){

	});
	function wishlist_items(user_id, dog_id){
		jQuery.ajax({
			url: '{{ route("connections_dog_wishlists") }}',  
			data: { "_token": "{{ csrf_token() }}", user_id:user_id, dog_id:dog_id},  
			type: 'post',  
			  success: function(res) {  
			    //            
			  }  
		}); 
	}
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endsection