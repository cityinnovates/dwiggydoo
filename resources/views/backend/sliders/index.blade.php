@extends('backend.layouts.app')
@section('title','All Pages')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Website Slider') }}</h1>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h6 class="mb-0 fw-600">{{ translate('All Slider') }}</h6>
		<a href="{{ route('sliders.create') }}" class="btn btn-primary">{{ translate('Add New') }}</a>
	</div>
	<div class="card-body">
		<table class="table aiz-table mb-0">
			<thead>
				<tr>
					<th>#</th>
					<th>{{translate('Page Name')}}</th>
					<th data-breakpoints="md">{{translate('Title')}}</th>
					<th class="text-right">{{translate('Actions')}}</th>
				</tr>
			</thead>
			<tbody>
				@foreach (App\Models\PageSlider::all() as $key => $slider)
				<tr>
					<td>{{ $key+2 }}</td>
					<td>{{ $slider->page_name }}</td>
					<td>{{ $slider->title }}</td>
					<td class="text-right">
						<a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">
							<i class="las la-pen"></i>
						</a>
						<a href="#" class="btn btn-soft-danger btnslidern btn-circle btn-sm confirm-delete" data-href="" title="{{ translate('Delete') }}">
							<i class="las la-trash"></i>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('modal')
    @include('modals.delete_modal')
@endsection
