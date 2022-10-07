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
        	  <div class="contes" style="padding: 20px;">
                <p><b>Dwiggy Doo Privacy Policy</b></p>
                <div class="intro">
                    <p>Introduction</p>
                </div><br>
                    @php 
                        $content = \App\Page::where('id', 19)->first(); 
                        $data = $content->content;
                        if($data != null) {
                            echo htmlspecialchars_decode($data);
                        }
                    @endphp
            </div>
		</div>
    </div>
</div>
@endsection
