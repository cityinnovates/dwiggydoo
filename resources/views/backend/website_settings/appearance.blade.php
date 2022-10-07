@extends('backend.layouts.app')



@section('content')



    <div class="row">

    	<div class="col-lg-8 mx-auto">

    		<div class="card">

    			<div class="card-header">

    				<h6 class="fw-600 mb-0">{{ translate('General') }}</h6>

    			</div>

    			<div class="card-body">

    				<form action="{{ route('business_settings.update') }}" method="POST">

    					@csrf

                        <div class="form-group row">

                            <label class="col-md-3 col-from-label">{{translate('Frontend Website Name')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="website_name">

        	                    <input type="text" name="website_name" class="form-control" placeholder="{{ translate('Website Name') }}" value="{{ get_setting('website_name') }}">

                            </div>

                        </div>

    	                <div class="form-group row">

    	                    <label class="col-md-3 col-from-label">{{translate('Site Motto')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="site_motto">

        	                    <input type="text" name="site_motto" class="form-control" placeholder="{{ translate('Best eCommerce Website') }}" value="{{  get_setting('site_motto') }}">

                            </div>

    	                </div>

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Site Icon') }}</label>

                            <div class="col-md-8">

        						<div class="input-group " data-toggle="aizuploader" data-type="image">

        							<div class="input-group-prepend">

        								<div class="input-group-text bg-soft-secondary">{{ translate('Browse') }}</div>

        							</div>

        							<div class="form-control file-amount">{{ translate('Choose File') }}</div>

                                    <input type="hidden" name="types[]" value="site_icon">

        							<input type="hidden" name="site_icon" value="{{ get_setting('site_icon') }}" class="selected-files">

        						</div>

        						<div class="file-preview box"></div>

        						<small class="text-muted">{{ translate('Website favicon. 32x32 .png') }}</small>

                            </div>

    					</div>

    	                <div class="form-group row">

    	                    <label class="col-md-3 col-from-label">{{translate('Website Base Color')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="base_color">

        	                    <input type="text" name="base_color" class="form-control" placeholder="#377dff" value="{{ get_setting('base_color') }}">

        						<small class="text-muted">{{ translate('Hex Color Code') }}</small>

                            </div>

    	                </div>

    	                <div class="form-group row">

    	                    <label class="col-md-3 col-from-label">{{translate('Website Base Hover Color')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="base_hov_color">

        	                    <input type="text" name="base_hov_color" class="form-control" placeholder="#377dff" value="{{  get_setting('base_hov_color') }}">

        						<small class="text-muted">{{ translate('Hex Color Code') }}</small>

                            </div>

    	                </div>

                        <div class="form-group row">

                            <label class="col-md-3 col-from-label">{{translate('Website Offer')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="website_offer">

                                <input type="text" name="website_offer" class="form-control" placeholder="5" value="{{  get_setting('website_offer') }}">

                                <small class="text-muted">{{ translate('5% discount Points') }}</small>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label class="col-md-3 col-from-label">{{translate('Promo Time Discount')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="website_promo_time_discount">

                                <input type="text" name="website_promo_time_discount" class="form-control" placeholder="5" value="{{  get_setting('website_promo_time_discount') }}">

                                <small class="text-muted">{{ translate('5% off') }}</small>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label class="col-md-3 col-from-label">{{translate('Wallet amount use')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="website_wallet_amount_use">

                                <input type="text" name="website_wallet_amount_use" class="form-control" placeholder="10" value="{{  get_setting('website_wallet_amount_use') }}">

                                <small class="text-muted">{{ translate('10% off') }}</small>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label class="col-md-3 col-from-label">{{translate('Website Sign In Points')}}</label>

                            <div class="col-md-8">

                                <input type="hidden" name="types[]" value="website_sign_in_offer">

                                <input type="text" name="website_sign_in_offer" class="form-control" placeholder="250" value="{{  get_setting('website_sign_in_offer') }}">

                                <small class="text-muted">{{ translate('250 Points') }}</small>

                            </div>

                        </div>

    					<div class="text-right">

    						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>

    					</div>

                    </form>

    			</div>

    		</div>
            <div class="card">

                <div class="card-header">

                    <h6 class="mb-0">{{ translate('Delivery Setting') }}</h6>

                </div>

                <div class="card-body">

                    <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label>{{ translate('Delivery') }}</label>

                            <div class="home-delivery-target">

                                <input type="hidden" name="types[]" value="website_delivery_extra_amount">
                                <input type="hidden" name="types[]" value="website_delivery_text">
                                <input type="hidden" name="types[]" value="website_delivery_time_slot">

                                @if (get_setting('website_delivery_text') != null)

                                    @foreach (json_decode(get_setting('website_delivery_text'), true) as $key => $value)

                                        <div class="row gutters-5">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <input type="hidden" name="types[]" value="website_delivery_text">

                                                    <input type="text" class="form-control" placeholder="Text" name="website_delivery_text[]" value="{{ json_decode(get_setting('website_delivery_text'), true)[$key] }}">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <input type="hidden" name="types[]" value="website_delivery_extra_amount">

                                                    <input type="text" class="form-control" placeholder="Extra Amount" name="website_delivery_extra_amount[]" value="{{ json_decode(get_setting('website_delivery_extra_amount'), true)[$key] }}">

                                                </div>

                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" name="types[]" value="website_delivery_time_slot">
                                                    <div class="">
                                                        <input type="text" class="form-control aiz-tag-input" name="website_delivery_time_slot[]" id="tags"placeholder="{{ translate('Type to add a time slot') }}" data-role="tagsinput" value="{{ json_decode(get_setting('website_delivery_time_slot'), true)[$key] }}">
                                                    </div>
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

                            </div><!-- 

                            <button

                                type="button"

                                class="btn btn-soft-secondary btn-sm"

                                data-toggle="add-more"

                                data-content='<div class="row gutters-5">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="Text" name="website_delivery_text[]">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Extra Amount" name="website_delivery_extra_amount[]">

                                                </div>

                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="">
                                                        <input type="text" class="form-control aiz-tag-input" name="website_delivery_time_slot[]" id="tags2" placeholder="{{ translate('Type to add a time slot') }}" data-role="tagsinput">
                                                    </div>
                                                </div> 
                                            </div>

                                    </div>

                                    <div class="col-auto">

                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">

                                            <i class="las la-times"></i>

                                        </button>

                                    </div>

                                </div>'

                                data-target=".home-delivery-target">

                                {{ translate('Add New') }}

                            </button> -->

                        </div>

                        <div class="text-right">

                            <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>

                        </div>

                    </form>

                </div>

            </div>

    		<div class="card">

    			<div class="card-header">

    				<h6 class="fw-600 mb-0">{{ translate('Global SEO') }}</h6>

    			</div>

    			<div class="card-body">

    				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">

    					@csrf

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Meta Title') }}</label>

                            <div class="col-md-8">

        						<input type="hidden" name="types[]" value="meta_title">

        						<input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{ get_setting('meta_title') }}">

                            </div>

    					</div>

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Meta description') }}</label>

                            <div class="col-md-8">

        						<input type="hidden" name="types[]" value="meta_description">

        						<textarea class="resize-off form-control" placeholder="Description" name="meta_description">{{  get_setting('meta_description') }}</textarea>

                            </div>

    					</div>

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Keywords') }}</label>

                            <div class="col-md-8">

        						<input type="hidden" name="types[]" value="meta_keywords">

        						<textarea class="resize-off form-control" placeholder="Keyword, Keyword" name="meta_keywords">{{ get_setting('meta_keywords') }}</textarea>

        						<small class="text-muted">{{ translate('Separate with coma') }}</small>

                            </div>

    					</div>

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Meta Image') }}</label>

                            <div class="col-md-8">

        						<div class="input-group " data-toggle="aizuploader" data-type="image">

        							<div class="input-group-prepend">

        								<div class="input-group-text bg-soft-secondary">{{ translate('Browse') }}</div>

        							</div>

        							<div class="form-control file-amount">{{ translate('Choose File') }}</div>

        							<input type="hidden" name="types[]" value="meta_image">

        							<input type="hidden" name="meta_image" value="{{ get_setting('meta_image') }}" class="selected-files">

        						</div>

        						<div class="file-preview box"></div>

                            </div>

    					</div>

    					<div class="text-right">

    						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>

    					</div>

    				</form>

    			</div>

    		</div>

            <div class="card">

    			<div class="card-header">

    				<h6 class="fw-600 mb-0">{{ translate('Cookies Agreement') }}</h6>

    			</div>

    			<div class="card-body">

    				<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">

    					@csrf

    					<div class="form-group row">

    						<label class="col-md-3 col-from-label">{{ translate('Cookies Agreement Text') }}</label>

                            <div class="col-md-8">

        						<input type="hidden" name="types[]" value="cookies_agreement_text">

        						<textarea name="cookies_agreement_text" rows="4" class="aiz-text-editor form-control" data-buttons='[["font", ["bold"]],["insert", ["link"]]]'>{{ get_setting('cookies_agreement_text') }}</textarea>

                            </div>

    					</div>

                        <div class="form-group row">

    						<label class="col-md-3 col-from-label">{{translate('Show Cookies Agreement?')}}</label>

    						<div class="col-md-8">

    							<label class="aiz-switch aiz-switch-success mb-0">

    								<input type="hidden" name="types[]" value="show_cookies_agreement">

    								<input type="checkbox" name="show_cookies_agreement" @if( get_setting('show_cookies_agreement') == 'on') checked @endif>

    								<span></span>

    							</label>

    						</div>

    					</div>

    					<div class="text-right">

    						<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>

    					</div>

    				</form>

    			</div>

    		</div>

    	</div>

    </div>



@endsection

