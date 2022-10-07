@extends('frontend.layouts.app')
@section('content')
  @if (get_setting('home_slider_images') != null)
<section class="banner">
	<div class="container-fluid pr-0 pl-0">
		<div class="owl-carousel owl-theme">


            @php $slider_images = json_decode(get_setting('home_slider_images'), true);  @endphp
            @php $i = 0; @endphp
            
             @php $i = 0; @endphp
            @foreach ($slider_images as $key => $value)
            @php $i++; @endphp
	
			<div class="banner-index index-1" style="background: url({{ uploaded_asset($slider_images[$key]) }});">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-lg-7">
							<div class="banner-cnt pl-0">
								<h1 class="head-cnt f-40 f-bold color-27 mb-4">{{ json_decode(get_setting('home_slider_text'), true)[$key] }}</h1>
								<p class="head-p f-18 f-medium color-27 mb-5">
									{{ json_decode(get_setting('home_slider_text2'), true)[$key] }}
								</p>
								<div class="Dwiggy_bnr_btn mb-5">
									<a href="/dwiggydoo/registers"><button class="dwiggy_btn bdr-rdius24 bdr-none bg-f3 gothambold-f15 color-fff">SIGN UP NOW!</button></a>
									<div class="bnr_btm_img"><img src="images/bnr_btn.png" class="img-fluid"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
              @endforeach


		
			
		</div>
	</div>
</section>
    @endif
<section class="bnr-btm-sec py-5">
	<div class="container">
		<div class="row"><div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">Find The Right Breed</h2></div> </div>
		<div class="breed_sec pos-rel">
			<div class="dd_centre_div">
				<div class="dwiggy_cntr"><img src="images/dwiggy_cntr.png" class="img-fluid"></div>
				<div class="dd_arrow1"><img src="images/arrow1.png" class="img-fluid"></div>
				<div class="dd_arrow2"><img src="images/arrow2.png" class="img-fluid"></div>
				<div class="dd_arrow3"><img src="images/arrow3.png" class="img-fluid"></div>
				<div class="dd_arrow4"><img src="images/arrow4.png" class="img-fluid"></div>
			</div>
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="breed_box">
						<div class="breed_icon mb-4 mt-5"><i class="fas fa-search color-blue f-86"></i></div>
						<a href="https://cilearningschool.com/DwiggyDoo/DwiggyDoo-mating-development/human_advice.php"><div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Explore Breeds</h3></div></a>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="breed_box">
						<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-blue f-86"></i></div>
						<a href="https://cilearningschool.com/DwiggyDoo/DwiggyDoo-mating-development/helpyou_achieve.php"><div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Find your Match</h3></div></a>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="breed_box">
						<div class="breed_icon mb-4 mt-5"><i class="fas fa-user-plus color-blue f-86"></i></div>
						<a href="https://cilearningschool.com/DwiggyDoo/DwiggyDoo-mating-development/dogs_advice.php"><div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Send Request</h3></div></a>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="breed_box">
						<div class="breed_icon mb-4 mt-5"><i class="fab fa-facebook-messenger color-blue f-86"></i></div>
						<a href="https://cilearningschool.com/DwiggyDoo/DwiggyDoo-mating-development/achieve_detail_page.php"><div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5">Send Messages</h3></div></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="dd_cnt_sec d-flex justify-content-between align-items-center w-100 pb-5">
					<h3 class="f-bold dd_heading f-25 color-27  breed-ctn pos-rel mb-0">Find them a connection
						<img src="images/dd_right.png" class="img-fluid dd_img_pos">
					</h3>
					<div class="dd_search pos-rel">
						<a href="/dwiggydoo/all-connections-breed"><input class="form-control srch-form px-3 bdr-rdius24 gotham-book" type="search" placeholder="Find Breed"></a>
						<div class="search-icon"><i class="fas fa-search color-blue"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 pb-5">
				<ul class="nav nav-pills pb-2" id="pills-tab" role="tablist">

				  <li class="nav-item mr-4 mb-4" role="presentation">
				    <a class="nav-link active bdr-rdius24 color-blue gothambold-f15" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ALL</a>
				  </li>

		<?php 	
		$breed = DB::table('breed')->limit(20)->get();	  
		foreach ($breed as $key => $value) {
		
?>
				  <li class="nav-item mr-4 mb-4" role="presentation">
				    <a class="nav-link bdr-rdius24 color-blue gothambold-f15" id="pills-profile-tab{{$value->id}}" data-toggle="pill" href="#pills-profile{{$value->id}}" role="tab" aria-controls="pills-profile{{$value->id}}" aria-selected="false">{{$value->name}}</a>
				  </li>
		<?php }   ?>  
				
				</ul>
				<div class="tab-content" id="pills-tabContent">
				  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				  	<div class="row">

@if(count($product))
@foreach ($product as $key => $product)	
						<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
							<div class="dd_pet_box pos-rel">
								<!-- <img src="{{ uploaded_asset($product->thumbnail_img) }}"> -->
								<?php   if($product->file_path!=''){ ?>
								<img src="{{ $product->file_path }}">	
								<?php  }   else {   ?>
								<img src="{{ uploaded_asset($product->thumbnail_img) }}">
							    <?php  }   ?>
								<div class="dd_pet_cnt text-center w-100">
									<p class="color-fff f-16 f-sbold">{{ \Illuminate\Support\Str::words(strip_tags($product->getTranslation('name')), 3, $end='...') }}</p>
								</div>
							</div>
						</div>


@endforeach	
@endif

						
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
				  <div class="tab-pane fade" id="pills-profile{{$value->id}}" role="tabpanel" aria-labelledby="pills-profile-tab{{$value->id}}">
				 


				 	<div class="row">
<?Php $product = DB::table('products')->where(['published'=>1,'brand_id'=>$value->id])->get();  ?>
@if(count($product))
@foreach ($product as $key => $product)	
						<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
							<div class="dd_pet_box pos-rel">
								<!-- <img src="{{ uploaded_asset($product->thumbnail_img) }}"> -->
								<?php   if($product->file_path!=''){ ?>
								<img src="{{ $product->file_path }}">	
								<?php  }   else {   ?>
								<img src="{{ uploaded_asset($product->thumbnail_img) }}">
							    <?php  }   ?>
								<div class="dd_pet_cnt text-center w-100">
									<p class="color-fff f-16 f-sbold">{{$product->name}}</p>
								</div>
							</div>
						</div>


@endforeach	
@endif

						
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
 @if (get_setting('home_banner1_text1') != null)
  @php $home_banner1_text1 = json_decode(get_setting('home_banner1_text1'), true);  @endphp
  <?php   $ii=0;  ?>
                 @foreach ($home_banner1_text1 as $key => $value)
                 <?php  if($ii==0){   ?>
<section class="pb-5">
	<div class="container">
		<div class="dd_bgimg py-5 bdr-rdius24">
			<div class="row">
				<div class="col-lg-6">
					<div class="dd_allCNT p-5">
						<h2 class="color-brown f-32 f-bold mb-4">{{ json_decode(get_setting('home_banner1_text1'), true)[$key] }}</h2>
						<p class="f-18 f-reg color-00">{{ json_decode(get_setting('home_banner1_text2'), true)[$key] }}</p>
						<div class="Dwiggy_bnr_btn mb-5">
							<a href="/dwiggydoo/registers"><button class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3">SIGN UP NOW!</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><?php  }   ?>
<?php   $ii++;  ?>
 @endforeach
@endif

<section class="pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-5 text-center wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s">
				<div class="dd_img"><img src="images/dating_dog.png" class="img-fluid"></div>
			</div>
			<div class="col-md-7 pl-md-5 wow slideInRight  d-flex align-items-center" data-wow-duration="1s" data-wow-delay="0s" style="background: url(images/heart_bg.png) 0 0 no-repeat; background-size: cover;">
				<div class="dd_allCNT">
					<h3 class="f-bold dd_heading f-25 color-27  breed-ctn mb-4">Get Dating and Relationship Advice</h3>
					<ul class="dd_ul pl-5"> 
						<li class="pos-rel color-blue f-18 f-reg mb-3">Find Doggy dating. (dog's Dating link)</li>
						<li class="pos-rel color-blue f-18 f-reg mb-3">Find Playmates for your dog. (dog's connection link)</li>
					</ul>
					<button type="button" class="bg-trsprnt bdr-none"><img src="images/surprice.png" class="img-fluid"> </button>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pt-5 pb-5">
	<div class="container">
		<div class="row"><div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">Dwiggy Doo memes</h2></div> </div>
		<div class="row">
@php $slider_images = json_decode(get_setting('home_banner2_images'), true);  @endphp
            @php $i = 0; @endphp
            
             @php $i = 0; @endphp
            @foreach ($slider_images as $key => $value)
            @php $i++; @endphp
	

			<div class="col-md-6 mb-4">
				<div class="dd_img">
					<img src="{{ uploaded_asset($slider_images[$key]) }}" class="img-fluid">
				</div>
			</div>
			 @endforeach
		</div>
	</div>
</section>


@if (get_setting('home_banner1_text1') != null)
  @php $home_banner1_text1 = json_decode(get_setting('home_banner1_text1'), true);  @endphp
  <?php   $ii=0;  ?>
                 @foreach ($home_banner1_text1 as $key => $value)
                 <?php  if($ii==1){   ?>
<section class="pb-5 pt-4">
	<div class="container">
		<div class="dd_bgimg bdr-rdius24 g_life">
			<div class="row">
				<div class="col-lg-7">
					<div class="dd_allCNT p-5">
						<h2 class="color-brown f-32 f-bold mb-4">{{ json_decode(get_setting('home_banner1_text1'), true)[$key] }}</h2>
						<p class="f-18 f-reg color-00">{{ json_decode(get_setting('home_banner1_text2'), true)[$key] }}</p>
						<div class="Dwiggy_bnr_btn mb-5"> 
							<a href="/dwiggydoo/registers"><button class="dwiggy_btn bg-ff bdr-rdius24 bdr-none gothambold-f15 color-f3">SIGN UP NOW!</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php  }   ?>
<?php   $ii++;  ?>
 @endforeach
@endif


<section class="pt-5 pb-5">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-md-7 pl-md-5 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s">
				<div class="dd_allCNT">
					<h3 class="f-bold dd_heading f-25 color-27  breed-ctn mb-5">Wanna know who <span class="color-blue">Dwiggy Doo</span>  is?</h3>
					<ul class="dd_ul pl-5">
						<li class="pos-rel color-blue f-18 f-reg mb-3">Find Doggy dating.(dog's Dating link) </li>
						<li class="pos-rel color-blue f-18 f-reg mb-3">Find Playmates for your dog.(dog's connection link) </li>
						<li class="pos-rel color-blue f-18 f-reg mb-3">Lorem ipsum dolor sit a dog.()</li>
					</ul>
				</div>
			</div>
			<div class="col-md-5 text-center wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
				<div class="dd_img"><img src="images/Group_973.png" class="img-fluid"></div>
			</div>
		</div>
	</div>
</section>
    @if (get_setting('home_testimonial_heading') != null)
<section class="footer_top_sec pt-5 pb-5">
	<div class="container">
		 @php $home_testimonial = json_decode(get_setting('home_testimonial_heading'), true);  @endphp
                 @foreach ($home_testimonial as $key => $value)
		<div class="row">
			<div class="col-md-7">
				<h2 class="dd_head f-28 color-fff f-bold mb-4">{{ json_decode(get_setting('home_testimonial_heading'), true)[$key] }}</h2>
				<span></span>
				<div class="pos-rel">
					<span class="color-fff f-40"><i class="fas fa-quote-left"></i></span>
					<p class="f-18 f-medium color-fff">{{ json_decode(get_setting('home_testimonial_description'), true)[$key] }}</p>
				</div>
				<div class="about_say d-flex align-items-center pt-4">
					<div class="about_say_img"></div>
					<div class="about_say_cnt ml-3">
						<strong class="d-block color-fff f-18 f-sbold">{{ json_decode(get_setting('home_testimonial_name'), true)[$key] }}</strong>
						<small class="d-block color-fff">{{ json_decode(get_setting('home_testimonial_location'), true)[$key] }}</small>
					</div>
				</div>
			</div> 
		</div>
 @endforeach

	</div>
</section>
@endif
<!-- Thank you popup after login -->
<!-- <div class="pp_after">
  <div class="pp_after_body">
    <div class="pp_after_img"><img src="images/1.png" class="img-fluid"></div>
    <div class="pp_after_cnt pt-4">
      <h3 class="f-sbold f-35 color-27 mb-4 text-center">Thanking you <br> for taking care of your woofy</h3>
      <span class="color-blue f-20 f-sbold go_ahead" style="text-decoration: underline; cursor: pointer;">Go ahead</span>
    </div>
  </div>
</div> -->
@endsection
