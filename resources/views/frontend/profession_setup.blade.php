@extends('frontend.layouts.app')
@section('header_style')
	<style type="text/css">
		.dd_form_btn a{    margin: 0 auto;border: 1px solid;border-radius: 10px;padding: 10px 0px;width: 225px;}
		.dd_form_btn a{background: #F3735F;}
	</style>
@endsection
@section('content')
<section class="my-5">
	<div class="container">
		
			<img src="images/dwiggy_cntr.png" class="mx-auto d-block">
			<h4 class="text-center"  style="color: black;"><b>Hello, {{ Auth::user()->name }}!!</b></h4>
			<p class="text-center">Now choose the profession you are interested in</p>
			<br><br id="res"><br id="res">
			<form action="{{ route('profession.save') }}" method="post">
				@csrf
			<div id="toogggle1">
				<h4 class="text-center"  style="color: black;"><b>Your Profession</b></h4>
				<p class="text-center">Select 5 Business Categories you are Interested in</p> 
				<br>
				<div class="formcntr d-flex justify-content-center" >
					<div class="form-row">
						<div class="form-group	col-12 mb-4">
							<select class="form-control srch-form px-4 bdr-rdius6 color-f3 f-sbold gotham-book bdr-f3" style="height: 45px;" id="profession_id" name="profession_id" required>
								<option value="">{{ ('Select Profession') }}*</option>
							@foreach(App\Models\ProfessionCategory::all() as $key => $value)
								<option value="{{$value->id}}" <?= $value->id == Auth::user()->profession_id ? 'selected' : '' ;?>>{{$value->name}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="dd_form_btn text-center col-12">
					<a type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium" onclick="formfortoogggle1();">NEXT >></a>
				</div>
			</div>
			<div id="toogggle2">
				<h4 class="text-center"  style="color: black;"><b>Your Priorities</b></h4>
				<p class="text-center">5 Top priorities/ Interests you are looking for your fellow dog owner</p> 
				<br>
				<div class="formcntr d-flex justify-content-center" >
					<div class="form-row">
						<div class="form-group	col-12 mb-4">
							<select class="form-control srch-form px-4 bdr-rdius6 color-f3 f-sbold gotham-book bdr-f3" style="height: 45px;" id="priorities_profession_id" name="priorities_profession_id" required>
								<option value="">{{ ('Select Profession') }}*</option>
							@foreach(App\Models\ProfessionCategory::all() as $key => $value)
								<option value="{{$value->id}}" <?= $value->id == Auth::user()->priorities_profession_id ? 'selected' : '' ;?>>{{$value->name}}</option>
							@endforeach
							</select>
						</div>
					</div>   
				</div>
				<div class="dd_form_btn text-center col-12">
					<a type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium" onclick="formfortoogggle2();">BACK</a>
					<button type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium">SUBMIT</button>
				</div>
			</div>
	 	</form>
	</div>
</section>
@endsection