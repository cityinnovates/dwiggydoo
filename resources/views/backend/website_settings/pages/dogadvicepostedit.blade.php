@extends('backend.layouts.app')

@section('title','Edit')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="row align-items-center">

		<div class="col">

			<h1 class="h3">{{ translate('Edit Dog Advice Post Page Information') }}</h1>

		</div>

	</div>

</div>

<div class="card">




	<form class="p-4" action="{{ route('custom-pages.dogadvicepostupdate', $page->id) }}" method="POST" enctype="multipart/form-data">

		@csrf

		<input type="hidden" name="_method" value="PATCH">




	  <h6 class="fw-600 mb-0">Dog Advice Post Content</h6>

		<hr>

		<div class="card-body">

			<div class="form-group row">

				<label class="col-sm-2 col-from-label" for="name">Title <span class="text-danger">*</span> <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>

				<div class="col-sm-10">

					<input type="text" class="form-control" placeholder="Title" name="title" value="{{ $page->title }}" required>

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

					>@php echo $page->content; @endphp</textarea>

				</div>

			</div>

		</div>




		<div class="card-body">





			<div class="text-right">

				<button type="submit" class="btn btn-primary">{{ translate('Update Page') }}</button>

			</div>

		</div>

	</form>

</div>

@endsection

