@extends('frontend.layouts.app')
@section('content')
<!--  -->
<?php 
//print_r($users); ?>

<section class="py-5 dd_profile">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 breed-ctn pos-rel mb-5 text-center">All Requests
					</h1>
			</div>
		</div>
		<form class="dd_all_req" method="get">
			<div class="row">
				<div class="col-lg-9 col-md-8">
					  <div class="form-row">
					    <!-- <div class="form-group col-lg-3 col-md-6 mb-4">
					    	<label for="Location">Location</label>
					    	<span class="km_abs">KM</span>
						    <input class="form-control" id="Location" type="text" placeholder="5000">
					    </div> -->
					    <div class="form-group col-lg-4 col-md-6 mb-4">
					    	<label for="Breeds">Breeds</label>
						    <select class="form-control" id="Breeds" name="breeds">
							    <option value="any">Any</option>
							     @foreach($attributes as $breed)
									<option value="{{ $breed->id }}" <?=@$_GET['breeds'] == $breed->id? 'selected':'';?>>{{ $breed->name}}</option>
								@endforeach
						    </select>
					    </div>
					    <div class="form-group col-lg-4 col-md-6 mb-4">
					    	<label for="age">Age</label>
						    <select class="form-control" id="age" name="age">
						      <option value="any">Any</option>
						      <option value="1" <?=@$_GET['age'] == 1? 'selected':'';?>>1</option>
						      <option value="2" <?=@$_GET['age'] == 2? 'selected':'';?>>2</option>
						      <option value="3" <?=@$_GET['age'] == 3? 'selected':'';?>>3</option>
						      <option value="4" <?=@$_GET['age'] == 4? 'selected':'';?>>4</option>
						      <option value="5" <?=@$_GET['age'] == 5? 'selected':'';?>>5</option>
						    </select>
					    </div>
					    <div class="form-group col-lg-4 col-md-6 mb-4">
					    	<label for="goodgenes">Good Genes</label>
						    <select class="form-control" id="goodgenes" name="goodgenes">
						    <option value="any">Any</option>
							    @foreach($categories as $category)
									<option value="{{$category->id}}" <?=@$_GET['goodgenes'] == $category->id? 'selected':'';?>>{{ $category->getTranslation('name') }}</option>
								@endforeach
						    </select>
					    </div>
					  </div>
				</div>
				<div class="col-lg-3 col-md-4">
					<div class="dd_form_btn text-center pt-4">
					  	<button type="submit" class="btn mr-md-2 mb-4 f-medium bg-f3 color-fff">Search</button>
					  </div>
				</div>
			</form>
		</div>
	</div>
</section>
<section class="dd_know">
	<div class="container">
		<?php  if( is_array($users) || (count($users) > 0) ){  ?>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-md-10 mb-5">
				<div class="dd_know_align">
					<div class="row">
						<div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">People You May Know</h2></div>
					</div>
					
			
					<?php  
						foreach ($users as $key => $value) { 
						$products = DB::table('products')->where('id', $value->product_by)->first();
					?>
						<div class="row d-flex align-items-center">
							<div class="col-md-5 mb-4">
								<div class="dd_know_lft">
									<div class="row d-flex align-items-center">
										<div class="col-lg-4 mb-2">
											<div class="dd_know_img"><img src="{{$products->file_path }}" class="bdr-rdius24"></div>
										</div>
										<div class="col-lg-8">
											<div class="dd_know_cnt d-flex align-items-center">
												<p class="f-18 f-sbold color-00 mb-0"><?=$products->name?></p>
												<img src="images/new_xd_images/beagle_dark.png" class="ml-3">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7 mb-4">
								<div class="dd_form_btn text-center">
								  	<a href="https://dwiggydoo.com/confirm-request/{{$value->id}}" style="    background: white;"><button type="submit" class="btn mr-md-2 mb-4 f-medium bg-f3 color-fff">Confirm</button></a>
								  	<a href="https://dwiggydoo.com/remove-request/{{$value->id}}" style="    background: white;"><button style="background: transparent !important;" type="submit" class="btn bg-trsprnt color-f3 ml-md-2 mb-4 f-medium">Remove</button></a>
								  </div>
							</div>
						</div>
						<?php  }   ?>

					<?php  }  else  { ?>

					<div class="col-md-12 text-center no_more">
						<section class="no_match_found py-5">
								<div class="container">
									<div class="match_found text-center">
										<div class="match_found_top"><img src="images/new_img/ohno.png" class="img-fluid"></div>
										<div class="match_found_img"><img src="images/new_img/beagle-dog.png" class="img-fluid"></div>
										<div class="match_found_cnt">
											<h4 class="color-00 f-bold f-24 mb-0">You don't have a connection yet.</h4>
											<p class="f-bold f-24 color-f3">Find your mate now!</p>
										</div>
									</div>
								</div>
						</section>
					</div>

					<?php  }  ?>
					<div class="row">
						<div class="col-12">
							<div class="dd_form_btn text-center pt-4">
							  	<!-- <button type="submit" class="btn mr-md-2 mb-4 f-medium bg-f3 color-fff">View More</button> -->
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection