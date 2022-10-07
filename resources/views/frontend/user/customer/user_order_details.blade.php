@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">

@endsection

@section('content')
 @php
    $details = App\Models\EcomOrderDetail::where('order_id', $order->id)->first();
@endphp
<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        @include('frontend.inc.user_top_bar')
        <div>
            @include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">
                               <div class="cardcoupon" style="margin: 20px;">
                    <div class="row">
                        <div class="col">
                            <p style="color: #707070; "><b>Your Orders<span style="color: black"> > Order Details</span></b></p>
                        </div>

                    </div>
                    <br>
                    <div class="cardfrodash" style="border-radius: 5px !important;">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ uploaded_asset($details->ecom_product->thumbnail_img) }}" alt="" class="dodo">
                            </div>
                            <div class="col-9">
                                <div class="infoer ">
                                    <p style="color: grey;"><b>{{ $details->ecom_product->getTranslation('name') }}</b></p><br>
                                    <?php echo substr($details->ecom_product->description, 0, 350); ?>...<br><br>
                                    <a href="{{ route('products.details', $details->ecom_product->slug) }}">
                                        <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:#F3735F; color: white; border-radius: 25px;">Redeem Again</button>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br>
                    <div class="cardfrodash" style="border-radius: 5px !important;">

                        <div class="infoer" style="padding: 10px;">
                            <p><b>DELIVERY ADDRESS</b></p>
                            <p><b>{{ json_decode($order->shipping_address)->name }}</b></p>
                            <p class="addressfrodash"><b>{{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->country }}</br></p>
                            <br>

                            <div class="row content">

                                @foreach ($order->orderDetails as $key => $orderDetail)
                                    @php
                                        $status = $orderDetail->delivery_status;
                                        $track_row = 0;
                                        if($status != null){
                                            switch($status){
                                                case 'pending' :
                                                    $track_row = 1;
                                                    break;
                                                case 'confirmed' :
                                                    $track_row = 2;
                                                    break;
                                                case 'on_delivery' :
                                                    $track_row = 3;
                                                    break;
                                                case 'delivered' :
                                                    $track_row = 4;
                                                    break;
                                                default:
                                                    $track_row = 0;
                                                    break;

                                            }
                                        }
                                        
                                    @endphp

                                    <div class="timeline">
                                        <div class="item @if($track_row >=1) active @endif">

                                            <div class="item-description">
                                                <div class="item-description-status" @if($track_row < 1) style="color: gray;" @endif>
                                                    Order Pending
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item @if($track_row >=2) active @endif">

                                            <div class="item-description">
                                                <div class="item-description-status" @if($track_row < 2) style="color: gray;" @endif>
                                                    Order Confirmed
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item @if($track_row >=3) active @endif">

                                            <div class="item-description">
                                                <div class="item-description-status" @if($track_row < 3) style="color: gray;" @endif>
                                                    On Delivery
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item @if($track_row >=4) active @endif">

                                            <div class="item-description">
                                                <div class="item-description-status" @if($track_row < 4) style="color: gray;" @endif>
                                                    Delivered successfully
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                        </div>

                    </div><br>
                    <div class="cardfrodash" style="border-radius: 5px !important;">

                        <div class="infoer" style="padding: 10px;">
                            <p><b>POINT DETAILS</b></p>
                            <div class="row">
                                <div class="col">
                                    <p>Dwiggy Doo coin used</p>
                                </div>
                                <div class="col"><span style="float: right;"><b>{{ optional($order->orderDetails[0])->points }}</b></span></div>

                            </div>
                            <hr>
                            <a href="{{ route('products.details', $details->ecom_product->slug) }}">
                                <button class="dwiggy_btn bg-ff bdr-none gothambold-f15" style="padding: 8px 20px;background-color:#F3735F; color: white; border-radius: 25px;">Redeem Again</button>
                            </a>
                            <br>


                        </div>


                    </div>



                    <br>
                    <div class="cardfrodash" style="border-radius: 5px !important;">

                        <div class="infoer" style="padding: 10px;">
                            <p><b>More Action</b></p>
                            <div class="row">
                                <div class="col">
                                    <p>Download Invoice</p>
                                </div>
                                <div class="col">
                                    <span style="float: right;">
                                        <a href="{{ route('user.invoice.download', $order->id) }}">
                                            <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color:#F3735F; color: white; border-radius: 25px;">Download</button>
                                        </a>
                                    </span>
                                </div>

                            </div>
                            <br>


                        </div>


                    </div>
                    <br>
                    <div class="cardfrodash" style="border-radius: 5px !important;">

                        <div class="infoer" style="padding: 10px;">
                            <p><b>Rate and Review Product</b></p>

                            <br>
                            <p style="font-size: 12px;"><b>Rating</b></p>
                            <div class="rating" style="float: left; margin-top: -12px;">

                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <br><br>
                            <p style="font-size: 12px;"><b>Review</b></p>
                            <textarea class="form-control" placeholder="Write Product Review" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                            <div class="col-md-12 text-center">
                                <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style="background-color: #F3735F; color: white; border-radius: 5px;">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
  
@endsection
