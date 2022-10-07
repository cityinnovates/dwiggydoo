@extends('frontend.layouts.app')
@section('content')


<section class="page-content font-14 py-5 my-lg-3">
<div class="container">

 @if( Session::has('cart') && count(Session::get('cart')) > 0 )
<div class="row justify-content-center">
<div class="col-lg-8 pr-lg-4">
<div class="cart-table">

<table class="table mb-0">
<thead>
<tr>
<th scope="col">{{ translate('Product')}}</th>
<th scope="col">{{ translate('Price')}}</th>
<th scope="col">{{ translate('Quantity')}}</th>
<th scope="col" class="pl-3">{{ translate('Total')}}</th>
<th scope="col">{{ translate('Remove')}}</th>
</tr>
</thead>
<tbody>

 @php

                                $total = 0;

                                @endphp

                                @foreach (Session::get('cart') as $key => $cartItem)

                                    @php

                                    $product = \App\Product::find($cartItem['id']);

                                    $total = $total + $cartItem['price']*$cartItem['quantity'];

                                    $product_name_with_choice = $product->getTranslation('name');

                                    if ($cartItem['variant'] != null) {

                                        $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];

                                    }

                                    @endphp

<tr>
<td>
<div class="product-details-name d-flex align-items-center  pr-lg-2">	
<div class="product-cart-thumb d-flex align-items-center justify-content-center p-1">
<img src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fluid h-100"  alt="{{  $product->getTranslation('name')  }}">
</div>

<div class="product-cart-name ml-4 pl-lg-3">
<p>{{ $product_name_with_choice }}</p>
</div>

</div>
</td>
<td>
<div class="mrp-price">	
<h6 class="mb-1">{{ translate('Price')}}</h6>
<p>{{ single_price($cartItem['price']) }}</p>
</div>
</td>



<td>
 @if($cartItem['digital'] != 1)
<div class=" d-flex no-gutters align-items-center aiz-plus-minus">	
<button class="inc quantity-button d-flex align-items-center justify-content-center" type="button" data-type="minus" data-field="quantity[{{ $key }}]">-</button>
<input type="text"  name="quantity[{{ $key }}]" style="width: 35px;" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $cartItem['quantity'] }}" min="1" max="10" readonly onchange="updateQuantity({{ $key }}, this)">
<button class="dec quantity-button d-flex align-items-center justify-content-center" type="button"   data-type="plus" data-field="quantity[{{ $key }}]">+</button>
</div>
@endif 
</td>

<td>
<div class="mrp-price pl-3"> 
<h6 class="mb-1">{{ translate('Total')}}</h6>
<p class="text-primary">{{ single_price(($cartItem['price']+$cartItem['tax'])*$cartItem['quantity']) }}</p>
</div>
</td>

<td>
    <a href="javascript:void(0)" onclick="removeFromCartView(event, {{ $key }})">
<div class="remove">	
X	
</div></a>
</td>
</tr>
 @endforeach


</tbody>
</table>


</div>

<div class="button-site mt-4 pt-lg-2">
<a href="{{ route('home') }}" class="red-btn">Return to Shop</a>
</div>

</div>


<div class="col-lg-4 col-sm-8 col-md-6">
<div class="sidebar-do overflow-hidden mt-4 mt-lg-0">
<div class="sidebar-title d-flex align-items-center justify-content-center p-2 text-center">
<h5 class="mb-0">Cart Total (<?=count(Session::get('cart'))?> items)</h5>
</div>

<div class="sidebar-details px-3 py-2 my-1">
<table class="table table-borderless mb-0">
<tbody><tr>
<td>Subtotal:</td>
<td>{{ single_price($total) }}</td>
</tr>		      	
</tbody></table>

</div>

<div class="total-calll px-3 pt-2 mt-1">

<div class="total-price mb-2 pb-1 d-flex justify-content-between">
<h5 class="mb-0">Total</h5>
<h5 class="mb-0">{{ single_price($total) }}</h5>
</div>
<div class="proceed py-4">
     @if(Auth::check())
<a  href="{{ route('checkout.shipping_info') }}" class="red-btn text-center w-100">{{ translate('Continue to Shipping')}}</a>
  @else
<a  onclick="showCheckoutModal()" class="red-btn text-center w-100">{{ translate('Continue to Shipping')}}</a>
   @endif
</div>	
</div>
</div>
</div>

</div>
 @else
<div class="row justify-content-center">
        <div class="col-lg-12 pr-lg-6">
<div class="cart-table">
                            <i class="las la-frown la-3x opacity-60 mb-3"></i>
                            <center><h3 class="h4 fw-700">{{translate('Your Cart is empty')}}</h3></center>
                        </div>
                    </div>
                </div>
  @endif

</div>
</section>
@endsection

@section('modal')

    <div class="modal fade" id="GuestCheckout">

        <div class="modal-dialog modal-dialog-zoom">

            <div class="modal-content">

                <div class="modal-header">

                    <h6 class="modal-title fw-600">{{ translate('Login')}}</h6>

                    <button type="button" class="close" data-dismiss="modal">

                        <span aria-hidden="true"></span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="p-3">

                        <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)

                                    <input type="text" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone')}}" name="email" id="email">

                                @else

                                    <input type="email" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">

                                @endif

                                @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)

                                    <span class="opacity-60">{{  translate('Use country code before number') }}</span>

                                @endif

                            </div>



                            <div class="form-group">

                                <input type="password" name="password" class="form-control h-auto form-control-lg" placeholder="{{ translate('Password')}}">

                            </div>



                            <div class="row mb-2">

                                <div class="col-6">

                                    <label class="aiz-checkbox">

                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <span class=opacity-60>{{  translate('Remember Me') }}</span>

                                        <span class="aiz-square-check"></span>

                                    </label>

                                </div>

                                <div class="col-6 text-right">

                                    <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>

                                </div>

                            </div>



                            <div class="mb-5">

                                <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Login') }}</button>

                            </div>

                        </form>



                    </div>

                    <div class="text-center mb-3">

                        <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>

                        <a href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>

                    </div>

                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)

                        <div class="separator mb-3">

                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>

                        </div>

                        <ul class="list-inline social colored text-center mb-5">

                            @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)

                                <li class="list-inline-item">

                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">

                                        <i class="lab la-facebook-f"></i>

                                    </a>

                                </li>

                            @endif

                            @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)

                                <li class="list-inline-item">

                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">

                                        <i class="lab la-google"></i>

                                    </a>

                                </li>

                            @endif

                            @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)

                                <li class="list-inline-item">

                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">

                                        <i class="lab la-twitter"></i>

                                    </a>

                                </li>

                            @endif

                        </ul>

                    @endif

                    @if (\App\BusinessSetting::where('type', 'guest_checkout_active')->first()->value == 1)

                       <!-- <div class="separator mb-3">

                            <span class="bg-white px-3 opacity-60">{{ translate('Or')}}</span>

                        </div>

                        <div class="text-center">

                            <a href="{{ route('checkout.shipping_info') }}" class="btn btn-soft-primary">{{ translate('Guest Checkout')}}</a>

                        </div>-->

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection





@section('script')

    <script type="text/javascript">

    function removeFromCartView(e, key){

        e.preventDefault();

        removeFromCart(key);
        location.reload();

    }



    function updateQuantity(key, element){

        $.post('{{ route('cart.updateQuantity') }}', { _token:'{{ csrf_token() }}', key:key, quantity: element.value}, function(data){

            updateNavCart();

            $('#cart-summary').html(data);
            location.reload();

        });

    }



    function showCheckoutModal(){

        $('#GuestCheckout').modal();

    }

    </script>

@endsection
