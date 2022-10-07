@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">
<style type="text/css">
  .dfgt{background: url("{{ route('home') }}/images/Subtraction-1.png") 0 0 no-repeat;}
</style>
@endsection

@section('content')
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        @include('frontend.inc.user_top_bar')
        <div>
        	@include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">

            @php
              $available = 0;
              foreach (json_decode(get_setting('user_coupons_off'), true) as $key => $value){
                if(date('y-m-d') < date('y-m-d', strtotime(json_decode(get_setting('user_coupons_date'), true)[$key]))){$available = 1;}
              }

            @endphp
            @if($available > 0)

            @if (get_setting('user_coupons_off') != null)
            @foreach (json_decode(get_setting('user_coupons_off'), true) as $key => $value)
              @php 
                  $ecom_brands = \App\Models\EcomBrand::where('id', json_decode(get_setting('user_coupons_brand_id'), true)[$key])->first();
              @endphp

                <div class="dfgt">
                    <div class="row">
                        <div class="col-4 dvh">
                            <div class="xcvf">
                                <img src="{{ uploaded_asset($ecom_brands->logo) }}" class="img-fluid" style="max-width: 80px;">
                                <input type="text" id="coupon-text-<?= $key ?>" value="{{ json_decode(get_setting('user_coupons_code'), true)[$key] }}" style=" margin-top: 20px; border: 0px solid transparent;background-color: #ffffff;padding: 10px; margin-left: -21px !important;"/>
                                <button class="copy-text-<?= $key ?>" data-clipboard-target="#content111" style="border: 1px solid #F3735F; background: none; color: #F3735F;     padding-left: 20px;padding-right: 20px;" onclick="copyClickBoard('coupon-text-<?= $key ?>', '.copied-msg-<?= $key ?>')">copy</button><small class="copied-msg-<?= $key ?> text-success" style="display: none"> Copied!</small>
                            </div>
                        </div>
                        <script> $(function() { new Clipboard('.copy-text-<?= $key ?>'); }); </script>
                        <div class="col-8" style="padding-top: 10px;">
                            <p>{{ $ecom_brands->name }}</p>
                            <h1 style="font-size: 56px;"><b>{{ json_decode(get_setting('user_coupons_off'), true)[$key] }}% OFF</b></h1>
                            <p><b>{{ json_decode(get_setting('user_coupons_brand_details'), true)[$key] }}</b></p>
                            <hr style="border-top: 1px dotted grey; width: 91%;">
                            <p>Use by: {{ date('d M, Y', strtotime(json_decode(get_setting('user_coupons_date'), true)[$key])) }}</p>
                        </div>
                    </div>
                </div>
              @endforeach
              @endif
            @else

              <div class="row">
                  <div class="col-12">
                      <div class="py-5 my-5 text-center">
                        <h4>Don't find any coupons.Please check after some times.</h4>
                      </div>
                  </div>
              </div>
            
            @endif
		    </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection
@section('footer_script')
<script type="text/javascript">
  function copyClickBoard(cl, ms) {
    $(ms).show();
  var copyText = document.getElementById(cl);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    if(copyText.value != null){
      setTimeout(function(){$(ms).hide();}, 1000);
      
    }
  }
</script>

@endsection
