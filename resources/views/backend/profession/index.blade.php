@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Profession') }}</h1>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h6 class="mb-0 fw-600">{{ translate('All Profession') }}</h6>
		<a href="{{ route('profession.create') }}" class="btn btn-primary">{{ translate('Add New Profession') }}</a>
	</div>
	<div class="card-body">
		<table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>{{translate('Name')}}</th>
                <th data-breakpoints="md">Profession</th>
                <th data-breakpoints="md">Photo</th>
                <th class="text-right">{{translate('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
        	@foreach (\App\Models\Profession::all() as $key => $profession)
        	<tr>
        		<td>{{ $key+2 }}</td>
        		<td>{{ $profession->title }}</td>
        		<td><img src="{{ uploaded_asset($profession->photo) }}"></td>
        		<td>
                    @php 
                        $cate = App\Models\ProfessionCategory::where('id', $profession->category)->first();
                    @endphp
                    {{ $cate->name }}
                </td>
				<td class="text-right">
					<a href="{{route('profession.edit', $profession->id )}}" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">
						<i class="las la-pen"></i>
					</a>
					<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('profession.destroy', $profession->id)}} " title="{{ translate('Delete') }}">
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
