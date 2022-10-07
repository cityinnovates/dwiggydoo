@extends('backend.layouts.app')



@section('content')



    <div class="aiz-titlebar text-left mt-2 mb-3">

    	<div class="row align-items-center">

    		<div class="col">

    			<h1 class="h3">{{ translate('Website Others') }}</h1>

    		</div>

    	</div>

    </div>



    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">{{ translate('Others Widget') }}</h6>
    	</div>

    	<div class="card-body">

    		<div class="row gutters-10">

    			<div class="col-lg-12">

    				<div class="card shadow-none bg-light">


    					<div class="card-body">

    						<form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">

                                <label>{{ translate('Photos & Links') }}</label>

                                <div class="others-target">
                                    @if (get_setting('earn_points_point') != null)

                                        @foreach (json_decode(get_setting('earn_points_point'), true) as $key => $value)

                                            <div class="row gutters-5">

                                                <div class="col-8">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_name">

                                                        <input type="text" class="form-control" placeholder="Heading" name="earn_points_name[]" value="{{ json_decode(get_setting('earn_points_name'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-4">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_point">

                                                        <input type="text" class="form-control" placeholder="Points" name="earn_points_point[]" value="{{ json_decode(get_setting('earn_points_point'), true)[$key] }}">

                                                    </div>

                                                </div>

                                                <div class="col-10">

                                                    <div class="form-group">

                                                        <input type="hidden" name="types[]" value="earn_points_link">

                                                        <input type="text" class="form-control" placeholder="Links" name="earn_points_link[]" value="{{ json_decode(get_setting('earn_points_link'), true)[$key] }}">

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
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_name">
                                                        <input type="text" class="form-control" placeholder="Heading" name="earn_points_name[]" value="{{ json_decode(get_setting('earn_points_name'), true)[$key] }}">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_point">
                                                        <input type="text" class="form-control" placeholder="Points" name="earn_points_point[]" value="{{ json_decode(get_setting('earn_points_point'), true)[$key] }}">
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="earn_points_link">
                                                        <input type="text" class="form-control" placeholder="Links" name="earn_points_link[]" value="{{ json_decode(get_setting('earn_points_link'), true)[$key] }}">
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

