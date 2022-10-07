@extends('frontend.layouts.app')

@section('content')
<section class="page-content font-14 py-5 my-lg-3">    <div class="container">	        <div class="row justify-content-center">            <div class="col-lg-8 pr-lg-4">                <div class="checkout-sec">                    <div class="checkout-links border-bottom pb-1 mb-4 text-uppercase">                        <div class="row">	                            <a href="#" class="col">MY CART</a>                            <a href="#" class="col">ADDRESS</a>                            <a href="#" class="col active">PAYMENT</a>                        </div>                    </div>                    <div class="inner-title select-delievery mb-3">                        <h5 class="mb-3">Select a Payment Option</h5>                    </div>				<form action="{{ route('payment.checkout') }}" class="form-default" role="form" method="POST" id="checkout-form">				@csrf                    <div class="checkout-block py-5 px-4">                        <div class="payment-checkout">                                                            <div class="form-group">                                    <input type="radio" name="payment_option" value="cash_on_delivery" class="form-control" checked>                                    <label for="test1">CASH ON DELIVERY</label>                                </div>                                                                                   </div>                    </div>							<label class="aiz-checkbox">                            <input type="checkbox" required id="agree_checkbox">                            <span class="aiz-square-check"></span>                            <span>{{ translate('I agree to the')}}</span>                        </label>                    <div class="add_new_address mt-3">					<button type="button" onclick="submitOrder(this)" class="button-light text-center text-uppercase w-100">{{ translate('Complete Order')}}</button>                    </div>				</form>                </div>            </div>

            <div class="col-lg-4 col-sm-8 col-md-6">
                @include('frontend.partials.cart_summary')
            </div>
        </div>    </div></section>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function(){
            $(".online_payment").click(function(){
                $('#manual_payment_description').parent().addClass('d-none');
            });
            toggleManualPaymentData($('input[name=payment_option]:checked').data('id'));
        });

        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','{{ translate('You need to agree with our policies') }}');
            }
        }
        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','{{ translate('You need to agree with our policies') }}');
                $(el).prop('disabled', false);
            }
        }

        function toggleManualPaymentData(id){
            $('#manual_payment_description').parent().removeClass('d-none');
            $('#manual_payment_description').html($('#manual_payment_info_'+id).html());
        }
    </script>
@endsection
