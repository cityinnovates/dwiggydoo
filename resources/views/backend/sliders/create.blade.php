@extends('backend.layouts.app')
@section('title','Add')
@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="row align-items-center">

		<div class="col">

			<h1 class="h3">{{ translate('Add New Slider') }}</h1>

		</div>

	</div>

</div>

<div class="card">
	<div class="card-header">
		<h6 class="fw-600 mb-0">{{ translate('Slider Content') }}</h6>
	</div>
	<div class="card-body">
		<div class="row gutters-10">
			<div class="col-lg-12">
				<form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>{{ translate('Heading, Content, Page Name, Button Name, Banner Image & Links') }}</label>
						<div class="page-slider-target">
							<div class="row gutters-5">
								<div class="col-6">
									<div class="form-group">
										<div class="form-check">
										  <input class="form-check-input" type="checkbox" id="check1" name="is_slider" style="position: initial;" value="1">
										  <label class="form-check-label">Is Slider?</label>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<div class="form-check">
										  <input class="form-check-input" type="checkbox" id="check1" name="published" style="position: initial;" value="1">
										  <label class="form-check-label">Is Published?</label>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Page Name" name="page_name">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Heading" name="title[]">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Button Name" name="button[]">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Links" name="link[]">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<textarea class="form-control" name="content[]" placeholder="Content"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="input-group" data-toggle="aizuploader" data-type="image">
			                            <div class="input-group-prepend">
			                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
			                            </div>
			                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
			                            <input type="hidden" name="img[]" class="selected-files" value="">
			                        </div>
			                        <div class="file-preview box sm">
			                        </div><br>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>
						</div>
						<button
							type="button"
							class="btn btn-soft-secondary btn-sm"
							data-toggle="add-more"
							data-content='<div class="row gutters-5">
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Heading" name="title[]">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Button Name" name="button[]">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Links" name="link[]">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<textarea class="form-control" name="content[]" placeholder="Content"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="input-group" data-toggle="aizuploader" data-type="image">
			                            <div class="input-group-prepend">
			                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
			                            </div>
			                            <div class="form-control file-amount">Choose File</div>
			                            <input type="hidden" name="img[]" class="selected-files" value="">
			                        </div>
			                        <div class="file-preview box sm">
			                        </div><br>
								</div>
								<div class="col-auto">
									<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
										<i class="las la-times"></i>
									</button>
								</div>
							</div>'
								data-target=".page-slider-target">
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

@endsection

