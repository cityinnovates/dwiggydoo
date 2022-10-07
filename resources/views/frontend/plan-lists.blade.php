@extends('frontend.layouts.app')

@section('header_style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

<section class="py-5 dd_profile">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="f-bold dd_heading f-40 color-00 breed-ctn pos-rel mb-5 mt-4 text-center">Their Health is Your Wealth?
					</h1>
				<div class="blur_img text-center"><img src="images/new_xd_images/blur_img.png" class="img-fluid mb-5"></div>
				<p class="f-30 f-blck color-27 mb-4 text-center">Premium Packages</p>
			</div>
		</div>
	</div>
</section>
<section class="package_sec">
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-md-10">
				<div class="package_sec_row">
					<div class="row">

						@php 
							$packages = DB::table('jp_pricing')->where('pr_status', 1)->get();
							$page_content = DB::table('pages')->where('id', 18)->get();
						@endphp

						@if(is_array($packages) || (count($packages) > 0))

						@php  $i = 0;  @endphp
						@foreach($packages as $value)
						@php  $i++; @endphp

							<div class="col-md-6 mb-4">
								<div class="package_box <?= $i==1? 'active' : ''; ?>">
									<div class="package_cnt" >
										<strong class="f-30 f-blck  mb-4 d-block" >{{ $value->pr_name }}</strong>
										<p class="f-18  d-flex justify-content-between" ><span class="f-blck">{{ $value->pr_offer }}</span> {{ $value->pr_orginal }}</p>
									</div>
									<div class="planss" style="padding: 22px 20px;">
										<ul style="list-style-type: none;">
										  <li><i class="fa-solid fa-check"></i> Package Type : <?= $value->pr_type == 1 ? 'Monthly' : 'Annual' ; ?></li>
										  <li><i class="fa-solid fa-check"></i> Validity : <?= $value->pr_type != 1 ? $value->pr_limit.' Year' : $value->pr_limit.' Months' ; ?></li>
										  <li><i class="fa-solid fa-check"></i> Price : {{ $value->pr_orginal }}</li>
										  <li><i class="fa-solid fa-check"></i> Offer Price : {{ $value->pr_offer }}</li>
										</ul>
									</div>
									@if(Auth::check())

									<div class="package_btn">
										<div class="dd_form_btn text-center">
										  	<button  style="background-color: #ef9e91;" type="submit" class="btn my-4 f-medium bg-f3 color-fff" @if(Session::get('is_plan_active') == 1) disabled @endif onclick="payment_pack({{ $value->pr_offer }}, {{ $value->pr_id }})">@if(Session::get('active_plan_id') == $value->pr_id) Activated @else CHOOSE PLAN @endif</button>
										  </div>
									</div>
									@endif
								</div>
							</div>

						@endforeach
						@endif
					<form class="" id="plan_payment_form" action="{{ route('plan.purchase') }}" method="post">
						@csrf
						<input type="hidden" name="plan_price">
						<input type="hidden" name="package_id">
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" class="cnd_drp_btn my-5 f-bold bdr-none bg-trsprnt  " style="color: #F3735F;">Service Conditions* <i class="fa-solid fa-circle-chevron-down"></i></button>
				<div class="conditions_drop text-left">
					<div class="f-reg f-18 color-00"><?= $page_content[0]->content ?></div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@section('footer_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(".cnd_drp_btn").click(function() { 

	    $(".conditions_drop").slideToggle();   
	    $(this).toggleClass("enable"); 

  });
	function payment_pack(price, id){
		 $('input[name=plan_price]').val(price);
		 $('input[name=package_id]').val(id);
         $('#plan_payment_form').submit();
	}

</script>
@endsection