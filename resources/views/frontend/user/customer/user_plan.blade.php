@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">

<style type="text/css">
	.user_has_plan .detaiks{background-color: #58bed7;    border: 1px solid #58bed7;}
	.user_has_plan .detaiks hr{background-color: #8adef3 !important;}
	.user_has_plan .boxdesign{border: 1px solid #58bed7;}
	.user_has_plan .dd_form_btn button{background-color: #93daeb !important;}
</style>
@endsection

@section('content')

<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
          @include('frontend.inc.user_top_bar')
        <div>
        	 @include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">
                <div class="contentforhelps">
					@php 
						$packages = DB::table('jp_pricing')->where('pr_status', 1)->get();
						$page_content = DB::table('pages')->where('id', 18)->get();
					@endphp

					@if(is_array($packages) || (count($packages) > 0))

					@php  $i = 0;  @endphp
					@foreach($packages as $value)
					@php  $i++; @endphp

                    <div class="boxdesign">
                        <div class="detaiks">
                            <h1 class="fntsi20"><b>{{ $value->pr_name }}</b></h1>
                            <hr style="background-color: #D4D4D4;">
                            <div class="row">
                                <div class="col ">
                                    <ul style="list-style-type: none;">
                                        <li><i class="fa-solid fa-check"></i> Validity : <?= $value->pr_type != 1 ? $value->pr_limit.' Year' : $value->pr_limit.' Months' ; ?></li>
                                        <li><i class="fa-solid fa-check"></i> Price : {{ $value->pr_orginal }}</li>
                                    </ul>
                                </div>
                                <div class="col ">
                                	<ul style="list-style-type: none;">
                                        <li> <i class="fa-solid fa-check"></i> Offer Price : {{ $value->pr_offer }}</li>
                                        <li> <i class="fa-solid fa-check"></i> Package Type : <?= $value->pr_type == 1 ? 'Monthly' : 'Annual' ; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="conterfroda">
                        	@if(Auth::check())
                            <div class="row">
                                <div class="col">
                                    <h1 class="fntsi20"><b>{{ $value->pr_orginal }} INR</b></h1>
                                    <p>/ <?= $value->pr_type != 1 ? $value->pr_limit.' Year' : $value->pr_limit.' Months' ; ?></p>
                                </div>
                                <div class="col" style="">
									<div class="package_btn">
										<div class="dd_form_btn text-center">
										  	<button  style="background-color: #ef9e91;" type="submit" class="btn my-4 f-medium bg-f3 color-fff" @if(Session::get('is_plan_active') == 1) disabled @endif onclick="payment_pack({{ $value->pr_offer }}, {{ $value->pr_id }})">@if(Session::get('active_plan_id') == $value->pr_id) Activated @else CHOOSE PLAN @endif</button>
										  </div>
									</div>
								</div>
                            </div>
							@endif

                        </div>
                    </div><br>

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
</div>
@endsection

@section('footer_script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript">
    	function payment_pack(price, id){
			 $('input[name=plan_price]').val(price);
			 $('input[name=package_id]').val(id);
	         $('#plan_payment_form').submit();
		}
    </script>
@endsection