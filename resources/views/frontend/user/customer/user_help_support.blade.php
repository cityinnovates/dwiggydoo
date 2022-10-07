@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">
@endsection

@section('content')
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        
        @include('frontend.inc.user_top_bar')
        <div>
        	@include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">
                <div class="contentforhelps">
                    <P><b>How To Earn More Points?</b></P>
                    <ul>
                        @if (get_setting('earn_points_point') != null)
                            @foreach (json_decode(get_setting('earn_points_point'), true) as $key => $value)
                            <li class="bhulk" style="font-size: 14px; margin: 15px; padding: 20px;">
                                &nbsp; &nbsp; &nbsp; &nbsp; {{ json_decode(get_setting('earn_points_name'), true)[$key] }}<span style="float: right;"><i class="fa-solid fa-coins"></i> {{ json_decode(get_setting('earn_points_point'), true)[$key] }}</span>
                            </li>
                            <hr>
                            @endforeach
                        @endif

                    </ul>
                </div>
		</div>
    </div>
</div>
</div>
@endsection
