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
                   
                <div class="rewardpp">
                    <h1 style="" class=" justify-content-center formik">  <i class="fa-solid fa-coins"></i> {{ $total_cr }}<br><span style="font-size: 20px;">REDEEMABLE  POINTS</span></h1>
                    <div class="row">
                        <div class="col"><div class="dd_form_btn text-center col-12">
                            <button type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium"> <i class="fa-solid fa-coins"></i>  {{ $total_rewards }}<br><span>Total POINTS</span></button>
                        </div></div>
                        <div class="col"><div class="dd_form_btn text-center col-12">
                            <button type="submit" class="btn bg-f3 color-fff ml-md-2 my-4 f-medium"> <i class="fa-solid fa-coins"></i>  {{ $total_dr }}<br><span>Used Points</span></button>
                        </div></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><p style="color: black"><b>All Transaction</b></p></div>
                    <div class="col">
                        <form action="" id="filter-form" method="get">
                            <div style="float:right;" class="sdsda dd_search d-flex align-items-center">
                                <label class="f-15 gotham-medium mr-4 mb-0 color-70">Sort by</label>
                                <select class="form-control srch-form px-4 bdr-rdius24 gotham-book " style="width: 170px;" name="sort_by" onchange="filter()">
                                     <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>

                                    <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($rewards) > 0)
                @foreach($rewards as $key => $value)
                
                <div class="row meff">
                    <div class="col">
                        @if($value->type == 'cr')
                            <img SRC="{{ route('home') }}/images/onearrow.png"> <b>Received </b><br>
                        @else
                            <img SRC="{{ route('home') }}/images/spent.png"> <b>Spent </b><br>
                        @endif
                         <span class="hut" style="margin-left: 40px; margin-top: -12px; position: absolute;">{{ $value->reward_type }} </span>
                    </div>
                    <div class="col">
                        <div class="righttree">
                            <b> 
                            @if($value->type == 'cr')
                                + <i class="fa-solid fa-coins" style="color: #F3735F;"></i>
                            @else
                                - <i class="fa-solid fa-coins" style="color: #58BED7;"></i>
                            @endif
                          {{ $value->reward_point }}</b>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                {{ $rewards->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

