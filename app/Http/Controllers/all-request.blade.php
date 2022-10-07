@extends('frontend.layouts.app')
@section('content')
<!--  -->
<section class="py-5 dd_profile">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 breed-ctn pos-rel mb-5 text-center">All Requests
					</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<form class="dd_all_req">
				  <div class="form-row">
				    <div class="form-group col-lg-3 col-md-6 mb-4">
				    	<label for="Location">Location</label>
				    	<span class="km_abs">KM</span>
					    <input class="form-control" id="Location" type="text" placeholder="5000">
				    </div>
				    <div class="form-group col-lg-3 col-md-6 mb-4">
				    	<label for="Breeds">Breeds</label>
					    <select class="form-control" id="Breeds">
					      <option>Any</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
				    </div>
				    <div class="form-group col-lg-3 col-md-6 mb-4">
				    	<label for="Age">Age</label>
					    <select class="form-control" id="Age">
					      <option>Any</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
				    </div>
				    <div class="form-group col-lg-3 col-md-6 mb-4">
				    	<label for="goodgenes">Good Genes</label>
					    <select class="form-control" id="goodgenes">
					      <option>Any</option>
					      <option>2</option>
					      <option>3</option>
					      <option>4</option>
					      <option>5</option>
					    </select>
				    </div>
				  </div>
				</form>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="dd_form_btn text-center pt-4">
				  	<button type="submit" class="btn mr-md-2 mb-4 f-medium bg-f3 color-fff">Search</button>
				  </div>
			</div>
		</div>
	</div>
</section>
<section class="dd_know">
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-md-10 mb-5">
				<div class="dd_know_align">
					<div class="row">
						<div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">People You May Know</h2></div>
					</div>
					<div class="row d-flex align-items-center">
						<div class="col-md-5 mb-4">
							<div class="dd_know_lft">
								<div class="row d-flex align-items-center">
									<div class="col-lg-4 mb-2">
										<div class="dd_know_img"><img src="images/my_cntction.png" class="bdr-rdius24"></div>
									</div>
									<div class="col-lg-8">
										<div class="dd_know_cnt d-flex align-items-center">
											<p class="f-18 f-sbold color-00 mb-0">Name goes here</p>
											<img src="images/new_xd_images/beagle_dark.png" class="ml-3">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7 mb-4">
							<div class="dd_form_btn text-center">
							  	<button type="submit" class="btn mr-md-2 mb-4 f-medium bg-f3 color-fff">Confirm</button>
							  	<button type="submit" class="btn bg-trsprnt color-f3 ml-md-2 mb-4 f-medium">Remove</button>
							  </div>
						</div>
					</div>
											
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