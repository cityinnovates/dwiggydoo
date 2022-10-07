@extends('backend.layouts.app')



@section('content')



    <div class="aiz-titlebar text-left mt-2 mb-3">

    	<div class="row align-items-center">

    		<div class="col">

    			<h1 class="h3">{{ translate('User Coupons') }}</h1>

    		</div>

    	</div>

    </div>



    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">{{ translate('Coupons Widget') }}</h6>
    	</div>

    	<div class="card-body">

    		<div class="row gutters-10">

    			<div class="col-lg-12">

    				<div class="card shadow-none bg-light">


    					<div class="card-body">

    						<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                                <label>{{ translate('Details') }}</label>

                                <div class="others-target">
                                    @if (get_setting('user_coupons_off') != null)

                                        @foreach (json_decode(get_setting('user_coupons_off'), true) as $key => $value)

                                            <div class="row gutters-5">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="user_coupons_brand_id">
                                                        <select class="form-control aiz-selectpicker" name="user_coupons_brand_id[]">
                                                            <option value="">{{ ('Select Brand') }}</option>
                                                            @foreach (\App\Models\EcomBrand::all() as $brand)
                                                                <option value="{{ $brand->id }}" @if(json_decode(get_setting('user_coupons_brand_id'), true)[$key] == $brand->id) selected @endif>{{ $brand->getTranslation('name') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_code">

                                                        <input type="text" class="form-control" placeholder="Coupon Code" name="user_coupons_code[]" value="{{ json_decode(get_setting('user_coupons_code'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_off">

                                                        <input type="text" class="form-control" placeholder="Off" name="user_coupons_off[]" value="{{ json_decode(get_setting('user_coupons_off'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_brand_details">

                                                        <input type="text" class="form-control" placeholder="Details" name="user_coupons_brand_details[]" value="{{ json_decode(get_setting('user_coupons_brand_details'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_date">

                                                        <input type="date" class="form-control" placeholder="Date" name="user_coupons_date[]" value="{{ json_decode(get_setting('user_coupons_date'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-auto">

                                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

                                                        <i class="las la-times"></i>

                                                    </button>

                                                </div>

                                            </div>

                                        @endforeach

                                    @endif

                                </div>

                                <button

                                    type="button"

                                    class="btn btn-soft-secondary btn-sm"

                                    data-toggle="add-more"

                                    data-content='<div class="row gutters-5">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="user_coupons_brand_id">
                                                        <select class="form-control aiz-selectpicker" name="user_coupons_brand_id[]">
                                                            <option value="">{{ ('Select Brand') }}</option>
                                                            @foreach (\App\Models\EcomBrand::all() as $brand)
                                                                <option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_code">

                                                        <input type="text" class="form-control" placeholder="Coupon Code" name="user_coupons_code[]">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_off">

                                                        <input type="text" class="form-control" placeholder="Off" name="user_coupons_off[]" value="20">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_brand_details">

                                                        <input type="text" class="form-control" placeholder="Details" name="user_coupons_brand_details[]">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="user_coupons_date">

                                                        <input type="date" class="form-control" placeholder="Date" name="user_coupons_date[]">

                                                    </div>

                                                </div>

                                                <div class="col-auto">

                                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

                                                        <i class="las la-times"></i>

                                                    </button>

                                                </div>

                                            </div>'

                                    data-target=".others-target">

                                    {{ translate('Add New') }}

                                </button>

                            </div>

                            <div class="text-right">

                                <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>

                            </div>

                        </form>

    					</div>

    				</div>

    			</div>

    		</div>

    	</div>

    </div>


@endsection

