@extends('backend.layouts.app')

@section('title','Edit')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Edit Page Information') }}</h1>
		</div>
	</div>
</div>

<div class="card">
	<ul class="nav nav-tabs nav-fill border-light">
		@foreach (\App\Language::all() as $key => $language)
			<li class="nav-item">
			<a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('custom-pages.edit', ['id'=>$page->slug, 'lang'=> $language->code] ) }}">
					<img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
					<span>{{$language->name}}</span>
				</a>
			</li>
		@endforeach
	</ul>
	<form class="p-4" action="{{ route('custom-pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="_method" value="PATCH">
		<input type="hidden" name="lang" value="{{ $lang }}">
		<input type="hidden" name="page" value="about1">
		  
		<h6 class="fw-600 mb-0">{{ translate('Page Content') }}</h6><hr>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Title')}} <span class="text-danger">*</span><i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Title" name="title" value="{{ $page->getTranslation('title',$lang) }}" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Description')}} <span class="text-danger">*</span>
					<i class="las la-language text-danger" title="{{translate('Translatable')}}"></i>
				</label>
				<div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Description" name="description" value="{{ $page->description }}" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Link')}} <span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<div class="input-group">
								@if($page->type == 'custom_page')
									<div class="input-group-prepend"><span class="input-group-text">{{ route('home') }}/</span></div>
										<input type="text" class="form-control" placeholder="{{ translate('Slug') }}" name="slug" value="{{ $page->slug }}">
									@else
									<input class="form-control" value="{{ route('home') }}/{{ $page->slug }}" disabled>
									@endif
							</div>
						<small class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Banner Image')}}</label>
					<div class="col-sm-10">
						<div class="input-group " data-toggle="aizuploader" data-type="image">
							<div class="input-group-prepend">
								<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
							</div>
							<div class="form-control file-amount">{{ translate('Choose File') }}</div>
							<input type="hidden" name="banner_image" class="selected-files" value="{{ $page->banner_image }}">
						</div>
						<div class="file-preview">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Add Content')}} <span class="text-danger">*</span></label>
					<div class="col-sm-10">
						<textarea
							class="aiz-text-editor form-control"
								placeholder="Content.."
								data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
								data-min-height="300"
								name="content"
								required
							>
							@php echo $page->getTranslation('content',$lang); @endphp
						</textarea>
					</div>
				</div>
			</div>
			<div class="card-header">
				<h6 class="fw-600 mb-0">{{ translate('Seo Fields') }}</h6>
			</div>
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Meta Title')}}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Title" name="meta_title" value="{{ $page->meta_title }}">
						</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Meta Description')}}</label>
					<div class="col-sm-10">
						<textarea class="resize-off form-control" placeholder="Description" name="meta_description">
							@php
								echo $page->meta_description
								@endphp
						</textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Keywords')}}</label>
					<div class="col-sm-10">
						<textarea class="resize-off form-control" placeholder="Keyword, Keyword" name="keywords">
							@php echo $page->keywords @endphp
						</textarea>
						<small class="text-muted">{{ translate('Separate with coma') }}</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-from-label" for="name">{{translate('Meta Image')}}</label>
						<div class="col-sm-10">
							<div class="input-group " data-toggle="aizuploader" data-type="image">
								<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
								</div>
							<div class="form-control file-amount">{{ translate('Choose File') }}</div>
							<input type="hidden" name="meta_image" class="selected-files" value="{{ $page->meta_image }}">
						</div>
						<div class="file-preview">
						</div>
					</div>
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">{{ translate('Update Page') }}</button>
				</div>
			</div>
	</form>

	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">{{ translate('About Me') }}</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="types[]" value="about_me_big_image">
						<input type="hidden" name="types[]" value="about_me_small_image1">
						<input type="hidden" name="types[]" value="about_me_small_image2">
						<input type="hidden" name="types[]" value="about_me_small_image3">
						<input type="hidden" name="types[]" value="about_me_small_image4">
						<div class="form-group row">
							<label class="col-sm-2 col-from-label" for="name">{{translate('Big Image')}}</label>
							<div class="col-sm-10">
								<div class="input-group " data-toggle="aizuploader" data-type="image">
									<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
									</div>
									<div class="form-control file-amount">{{ translate('Choose File') }}</div>
									<input type="hidden" name="about_me_big_image" class="selected-files" value="{{ get_setting('about_me_big_image') }}">
								</div>
								<div class="file-preview">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-from-label" for="name">{{translate('Image1')}}</label>
							<div class="col-sm-10">
								<div class="input-group " data-toggle="aizuploader" data-type="image">
									<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
									</div>
									<div class="form-control file-amount">{{ translate('Choose File') }}</div>
									<input type="hidden" name="about_me_small_image1" class="selected-files" value="{{ get_setting('about_me_small_image1') }}">
								</div>
								<div class="file-preview">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-from-label" for="name">{{translate('Image2')}}</label>
							<div class="col-sm-10">
								<div class="input-group " data-toggle="aizuploader" data-type="image">
									<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
									</div>
									<div class="form-control file-amount">{{ translate('Choose File') }}</div>
									<input type="hidden" name="about_me_small_image2" class="selected-files" value="{{ get_setting('about_me_small_image2') }}">
								</div>
								<div class="file-preview">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-from-label" for="name">{{translate('Image3')}}</label>
							<div class="col-sm-10">
								<div class="input-group " data-toggle="aizuploader" data-type="image">
									<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
									</div>
									<div class="form-control file-amount">{{ translate('Choose File') }}</div>
									<input type="hidden" name="about_me_small_image3" class="selected-files" value="{{ get_setting('about_me_small_image3') }}">
								</div>
								<div class="file-preview">
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-from-label" for="name">{{translate('Image4')}}</label>
							<div class="col-sm-10">
								<div class="input-group " data-toggle="aizuploader" data-type="image">
									<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
									</div>
									<div class="form-control file-amount">{{ translate('Choose File') }}</div>
									<input type="hidden" name="about_me_small_image4" class="selected-files" value="{{ get_setting('about_me_small_image4') }}">
								</div>
								<div class="file-preview">
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">{{ translate('Journey') }}</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>{{ translate('Photos & Links') }}</label>
							<div class="about_slider">
								@if (get_setting('about_slider_images') != null)
									@foreach (json_decode(get_setting('about_slider_images'), true) as $key => $value)
									<div class="row gutters-5">
										<div class="col-12">
											<div class="input-group" data-toggle="aizuploader" data-type="image">
				                                <div class="input-group-prepend">
	    			                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
	        		                                </div>
	    		                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
	    										<input type="hidden" name="types[]" value="about_slider_images">
				                                <input type="hidden" name="about_slider_images[]" class="selected-files" value="{{ json_decode(get_setting('about_slider_images'), true)[$key] }}">
	    		                            </div>
	    		                            <div class="file-preview box sm">
	    		                            </div><br>
	    		                        </div>
										<div class="col-12">
											<div class="form-group">
												<input type="hidden" name="types[]" value="about_slider_text">
												<input type="text" class="form-control" placeholder="banner text h3" name="about_slider_text[]" value="{{ json_decode(get_setting('about_slider_text'), true)[$key] }}">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<input type="hidden" name="types[]" value="about_slider_text2">
												<textarea
													class="aiz-text-editor form-control"
													placeholder="Content.."
													data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
													data-min-height="300"
													name="about_slider_text2[]"
													required
												>{{ json_decode(get_setting('about_slider_text2'), true)[$key] }}</textarea>
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
									data-content='
								<div class="row gutters-5">
									<div class="col-12">
										<div class="input-group" data-toggle="aizuploader" data-type="image">
											<div class="input-group-prepend">
												<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
											</div>
											<div class="form-control file-amount">{{ translate('Choose File') }}</div>
											<input type="hidden" name="types[]" value="about_slider_images">
											<input type="hidden" name="about_slider_images[]" class="selected-files">
										</div>
										<div class="file-preview box sm">
										</div><br>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="hidden" name="types[]" value="about_slider_text">
											<input type="text" class="form-control" placeholder="Heading text h3" name="about_slider_text[]">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="hidden" name="types[]" value="about_slider_text2">
											<textarea
												class="aiz-text-editor form-control"
												placeholder="Content.."
												data-min-height="300"
												name="about_slider_text2[]"
												required
											></textarea>
										</div>
									</div>
									<div class="col-auto">

									</div>
								</div>' data-target=".about_slider">Add Row
							</button>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6 class="mb-0">{{ translate('Home Register now (Max 3)') }}</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>{{ translate('Banner & Links') }}</label>
							<div class="home-banner1-target">
								<input type="hidden" name="types[]" value="abouthome_banner1_images">
								<input type="hidden" name="types[]" value="abouthome_banner1_links">
								<input type="hidden" name="types[]" value="abouthome_banner1_text1">
								<input type="hidden" name="types[]" value="abouthome_banner1_text2">
								@if (get_setting('abouthome_banner1_images') != null)
								@foreach (json_decode(get_setting('abouthome_banner1_images'), true) as $key => $value)
								<div class="row gutters-5">
									<div class="col-5">
										<div class="input-group" data-toggle="aizuploader" data-type="image">
											<div class="input-group-prepend">
												<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
											</div>
											<div class="form-control file-amount">{{ translate('Choose File') }}</div>
											<input type="hidden" name="types[]" value="abouthome_banner1_images">
											<input type="hidden" name="abouthome_banner1_images[]" class="selected-files" value="{{ json_decode(get_setting('abouthome_banner1_images'), true)[$key] }}">
										</div>
										<div class="file-preview box sm">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<input type="hidden" name="types[]" value="abouthome_banner1_links">
											<input type="text" class="form-control" placeholder="http://" name="abouthome_banner1_links[]" value="{{ json_decode(get_setting('abouthome_banner1_links'), true)[$key] }}">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="hidden" name="types[]" value="abouthome_banner1_text1">
											<input type="text" class="form-control" placeholder="h2 heading" name="abouthome_banner1_text1[]" value="{{ json_decode(get_setting('abouthome_banner1_text1'), true)[$key] }}">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="hidden" name="types[]" value="abouthome_banner1_text2">

											<textarea
											class="aiz-text-editor form-control"
											data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
											placeholder="Content.."
											data-min-height="300"

											name="abouthome_banner1_text2[]"
											required
											>{{ json_decode(get_setting('abouthome_banner1_text2'), true)[$key] }}</textarea>
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
							data-content='
							<div class="row gutters-5">
								<div class="col-5">
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="types[]" value="abouthome_banner1_images">
										<input type="hidden" name="abouthome_banner1_images[]" class="selected-files">
									</div>
									<div class="file-preview box sm">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="hidden" name="types[]" value="abouthome_banner1_links">
										<input type="text" class="form-control" placeholder="http://" name="abouthome_banner1_links[]">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="types[]" value="abouthome_banner1_text1">
										<input type="text" class="form-control" placeholder="h2 heading" name="abouthome_banner1_text1[]">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="types[]" value="abouthome_banner1_text2">
										<input type="text" class="form-control" placeholder="h4 heading" name="abouthome_banner1_text2[]">
									</div>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
							data-target=".home-banner1-target">
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

@endsection

