@extends('frontend.layouts.app')
@section('content')

<style type="text/css">
  .quantitys {
    width: 31px;
    height: 44px;
    border: 1px solid #D8D8D8;
    text-align: center;
    font-size: 1rem;
   }
</style>

   <section class="page-content py-5 my-lg-3">
    <div class="container">
        <div class="product-detail-top mb-4 pb-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-detail-image-sec">
                        <div class="owl-carousel owl-theme slider">
                            <div class="item">
                                <div class="product-big-image d-flex align-items-center justify-content-center p-2 product-detail-image"><img src="{{ uploaded_asset($detailedProduct->thumbnail_img) }}" class="img-fluid" /></div>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme navigation-thumbs mt-4">
                            <div class="item">
                                <div class="product-thubm-image p-1 d-flex align-items-center justify-content-center product-detail-image"><img src="{{ uploaded_asset($detailedProduct->thumbnail_img) }}" class="img-fluid" /></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-7">
                    <div class="product-detail-content">
                        <div class="inner-title mb-2"><h4 class="mb-0">{{$detailedProduct->name}}</h4></div>
                        <div class="product-short-desc mb-2"><?php echo $detailedProduct->description;?></div>

                       
                        <div class="product-detail-price mb-2 pb-1">
						@if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
                            <div class="price_detail"><inc>{{ home_discounted_price($detailedProduct->id) }}</inc> <del>{{ home_price($detailedProduct->id) }}</del> @if($detailedProduct->discount > 0 )<small> @if($detailedProduct->discount_type=='percent') {{  round($detailedProduct->discount, 2)}}% @else Rs {{ round($detailedProduct->discount, 2)}} @endif off</small>@endif</div>
						@else
							<div class="price_detail"><inc>{{ home_discounted_price($detailedProduct->id) }}</inc> </div>
						@endif
                        </div>

                       

                        <div class="form-product-detail">
                            
                                
                                <div class="variation mb-2 pb-1">
                                    <p class="mb-1"><?=$detailedProduct->name?>
                                            
                                    @php

                                        $qty = 0;

                                        if($detailedProduct->variant_product){

                                            foreach ($detailedProduct->stocks as $key => $stock) {

                                                $qty += $stock->qty;

                                            }

                                        }

                                        else{

                                            $qty = $detailedProduct->current_stock;

                                        }

                                    @endphp

                                    @if ($qty > 0)

                                        <span class="badge badge-md badge-inline badge-pill badge-success">{{ translate('In stock')}}</span>

                                    @else

                                        <span class="badge badge-md badge-inline badge-pill badge-danger">{{ translate('Out of stock')}}</span>

                                    @endif
                                     <div class="avialable-amount opacity-60">(<span >{{ $qty }}</span> {{ translate('available')}})</div>
                                    </p>
                                    
                                </div>
                            


                                <div class="category-name">
                                    <p><span>Category:</span>  {{ \App\Category::find(\App\Category::find($detailedProduct->category_id)->parent_id)->getTranslation('name') }}</p>
                                </div>




                            


                            <form id="option-choice-form">

                                @csrf

                                <input type="hidden" name="id" value="{{ $detailedProduct->id }}">



                                @if ($detailedProduct->choice_options != null)

                                    @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)



                                    <div class="row no-gutters">

                                        <div class="col-2">

                                            <div class="opacity-50 mt-2 ">{{ \App\Attribute::find($choice->attribute_id)->getTranslation('name') }}:</div>

                                        </div>

                                        <div class="col-10">

                                            <div class="aiz-radio-inline">

                                                @foreach ($choice->values as $key => $value)

                                                <label class="aiz-megabox pl-0 mr-2">

                                                    <input

                                                        type="radio"

                                                        name="attribute_id_{{ $choice->attribute_id }}"

                                                        value="{{ $value }}"

                                                        @if($key == 0) checked @endif

                                                    >

                                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">

                                                        {{ $value }}

                                                    </span>

                                                </label>

                                                @endforeach

                                            </div>

                                        </div>

                                    </div>



                                    @endforeach

                                @endif



                                @if (count(json_decode($detailedProduct->colors)) > 0)

                                    <div class="row no-gutters">

                                        <div class="col-2">

                                            <div class="opacity-50 mt-2">{{ translate('Color')}}:</div>

                                        </div>

                                        <div class="col-10">

                                            <div class="aiz-radio-inline">

                                                @foreach (json_decode($detailedProduct->colors) as $key => $color)

                                                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ \App\Color::where('code', $color)->first()->name }}">

                                                    <input

                                                        type="radio"

                                                        name="color"

                                                        value="{{ $color }}"

                                                        @if($key == 0) checked @endif

                                                    >

                                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">

                                                        <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>

                                                    </span>

                                                </label>

                                                @endforeach

                                            </div>

                                        </div>

                                    </div>



                                    <hr>

                                @endif



                                <!-- Quantity + Add to cart -->

                                            
                                <hr>



                                <div class="row no-gutters pb-3 d-none" id="chosen_price_div">

                                    <div class="col-2">

                                        <div class="opacity-50">{{ translate('Total Price')}}:</div>

                                    </div>

                                    <div class="col-10">

                                        <div class="product-price">

                                            <strong id="chosen_price" class="h4 fw-600 text-primary">



                                            </strong>

                                        </div>

                                    </div>

                                </div>
                

                                <div class="product-quantity   d-flex align-items-center mt-4">
                                    <div class="no-gutters  d-flex mr-4 aiz-plus-minus">
                                        <button class="quantity-button d-flex align-items-center justify-content-center" type="button" data-type="minus" data-field="quantity" disabled="">-</button>
                                        <input type="text" class="input-number quantitys" name="quantity"  placeholder="1" value="{{ $detailedProduct->min_qty }}" min="{{ $detailedProduct->min_qty }}"  min="{{ $detailedProduct->min_qty }}" max="10"  readonly />
                                        <button class="quantity-button d-flex align-items-center justify-content-center"  type="button" data-type="plus" data-field="quantity">+</button>
                                         <div style="display: none;" class="avialable-amount opacity-60">(<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}})</div>
                                    </div>
                                    <div class="add-to-cart"><a  onclick="addToCart()" class="red-btn px-4">Add to cart</a></div>
									<div class="add-to-cart"><a  onclick="addToWishList({{ $detailedProduct->id }})" class="red-btn px-4">Add to wishlist</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="addtional-info mb-4 pb-4">
            <nav class="d-inline-block">
                <div class="nav addtional-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    <a class="nav-link" id="additonal-tab" data-toggle="tab" href="#additonal" role="tab" aria-controls="additonal" aria-selected="false">Additional information</a>
                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{$detailedProduct->rating}})</a>



                </div>
            </nav>
            <div class="tab-content mt-4" id="nav-tabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="desc">
                       <?php echo $detailedProduct->description?>
                    </div>
                </div>
                <div class="tab-pane fade" id="additonal" role="tabpanel" aria-labelledby="additonal-tab">...</div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">...</div>
            </div>
        </div>


        <div class="related-products">
            <div class="categ-title mb-4"><h3 class="mb-0">Related Products</h3></div>
            <div class="row">
			@foreach (filter_products(\App\Product::where('subcategory_id', $detailedProduct->subcategory_id)->where('id', '!=', $detailedProduct->id))->limit(4)->get() as $key => $related_product)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <a href="{{ route('product', $related_product->slug) }}" class="list-box">
                        @if($related_product->discount > 0)<span class="ribbon"> {{$related_product->discount}}@if($related_product->discount_type=='percent')%@endif Off</span>@endif
                        <div class="pro-img"><img src="{{ uploaded_asset($related_product->thumbnail_img) }}"  class="img-fluid" /></div>
                        <p>{{ $related_product->getTranslation('name') }}</p>
                        <div class="price mb-0">
						@if(home_base_price($related_product->id) != home_discounted_base_price($related_product->id))
						<span class="cut-price">Rs{{ home_base_price($related_product->id) }} </span>
						@endif
						₹{{ home_discounted_base_price($related_product->id) }}</div>
                    </a>
                </div>
			@endforeach
            </div>
        </div>
    </div>
</section>


@endsection



@section('modal')

    <div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">

            <div class="modal-content position-relative">

                <div class="modal-header">

                    <h5 class="modal-title fw-600 h5">{{ translate('Any query about this product')}}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <form class="" action="{{ route('conversations.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">

                    <div class="modal-body gry-bg px-3 pt-3">

                        <div class="form-group">

                            <input type="text" class="form-control mb-3" name="title" value="{{ $detailedProduct->name }}" placeholder="{{ translate('Product Name') }}" required>

                        </div>

                        <div class="form-group">

                            <textarea class="form-control" rows="8" name="message" required placeholder="{{ translate('Your Question') }}">{{ route('product', $detailedProduct->slug) }}</textarea>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-primary fw-600" data-dismiss="modal">{{ translate('Cancel')}}</button>

                        <button type="submit" class="btn btn-primary fw-600">{{ translate('Send')}}</button>

                    </div>

                </form>

            </div>

        </div>

    </div>



    <!-- Modal -->

    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-zoom" role="document">

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

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection



@section('script')

    <script type="text/javascript">

        $(document).ready(function() {

            getVariantPrice();

        });



        function CopyToClipboard(containerid) {

            if (document.selection) {

                var range = document.body.createTextRange();

                range.moveToElementText(document.getElementById(containerid));

                range.select().createTextRange();

                document.execCommand("Copy");



            } else if (window.getSelection) {

                var range = document.createRange();

                document.getElementById(containerid).style.display = "block";

                range.selectNode(document.getElementById(containerid));

                window.getSelection().addRange(range);

                document.execCommand("Copy");

                document.getElementById(containerid).style.display = "none";



            }

            AIZ.plugins.notify('success', 'Copied');

        }



        function show_chat_modal(){

            @if (Auth::check())

                $('#chat_modal').modal('show');

            @else

                $('#login_modal').modal('show');

            @endif

        }



    </script>

@endsection