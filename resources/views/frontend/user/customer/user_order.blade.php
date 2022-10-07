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
                
                <div class="cardcoupon" style="margin: 20px;">
                    <div class="row">
                        <div class="col">
                            <p style="color: black"><b>Your Orders</b></p>
                        </div>
                        <div class="col">
                            <form action="" id="filter-form" method="get">
                                <div style="float:right;" class="sdsda dd_search d-flex align-items-center">
                                    <label class="f-15 gotham-medium mb-0 color-70 fgty">Sort by</label>
                                    <select class="form-control srch-form px-4 bdr-rdius24 gotham-book " style="width: 170px;" name="sort_by" onchange="filter()">
                                         <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>

                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    @foreach($orders as $key => $order)
                    @php
                        $details = App\Models\EcomOrderDetail::where('order_id', $order->id)->first();
                    @endphp
                    <div class="cardfrodash">
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 15px;"> Order Placed: {{ date('d-m-Y H:i A', $order->date) }}</p>

                            </div>
                            <div class="col">
                                <a style="float: right;" href="{{ route('user.orders_details', $order->id) }}"><b>View Details</b></a>
                            </div>
                        </div>
                        <hr style="width: 102.5%; margin-left: -10px;">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ uploaded_asset($details->ecom_product->thumbnail_img) }}" alt="" class="dodo">
                            </div>
                            <div class="col-9">
                                <div class="infoer ">
                                    <p style="color: grey;"><b>{{ $details->ecom_product->getTranslation('name') }}</b></p><?php echo substr($details->ecom_product->description, 0, 350); ?>...
                                    <br>
                                    <br>
                                    <a href="{{ route('products.details', $details->ecom_product->slug) }}">
                                        <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:#F3735F; color: white; border-radius: 25px;">Redeem Again</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 102.5%; margin-left: -10px;">
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 15px;">Purchased Dwiggy Coin: <b>{{ $details->points }}</b></p>
                            </div><!-- 
                            <div class="col">
                                <div class="comtetr" style="float: right;">
                                    <p style="color: #F3735F;"><b>Write Review</b></p>
                                </div>
                                <div class="rating" style="float: right; margin-top: -12px;">

                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                </div>

                            </div> -->
                        </div>
                    </div><br>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script type="text/javascript">

        function filter(){
            $('#filter-form').submit();

        }

    </script>
@endsection
