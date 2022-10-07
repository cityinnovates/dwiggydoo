@extends('backend.layouts.app')

@section('title','All Blog Pages')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="row align-items-center">

		<div class="col">

			<h1 class="h3">{{ translate('Website Blog Pages') }}</h1>

		</div>

	</div>

</div>



<div class="card">

	<div class="card-header">

		<h6 class="mb-0 fw-600">{{ translate('All Blog Pages') }}</h6>

		<a href="{{ route('custom-pages.blogcreate') }}" class="btn btn-primary">{{ translate('Add New Blog Page') }}</a>

	</div>

	<div class="card-body">

		<table class="table aiz-table mb-0">

        <thead>

            <tr>

                <th>#</th>

                <th>{{translate('Name')}}</th>

               

                <th class="text-right">{{translate('Actions')}}</th>

            </tr>

        </thead>

        <tbody>

        <?php  	$blog = DB::table('blog_pages')->get();
   ?>
@foreach ($blog as $key => $page)  

        	<tr>

        		<td>{{ $key+2 }}</td>

        		<td><a href="{{ route('custom-pages.show_custom_blogpage', $page->slug) }}" class="text-reset">{{ $page->title }}</a></td>

        	
        		<td class="text-right">

								@if($page->type == 'admin')

									<a href="{{route('custom-pages.blogedit', ['id'=>$page->id, 'lang'=>env('DEFAULT_LANGUAGE'), 'page'=>'home'] )}}" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">

										<i class="las la-pen"></i>

									</a>

								@else

	          			<a href="{{route('custom-pages.blogedit', ['id'=>$page->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" class="btn btn-icon btn-circle btn-sm btn-soft-primary" title="Edit">

	    							<i class="las la-pen"></i>

	    						</a>

								@endif

								@if($page->type == 'admin')

          				<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('custom-pages.blogdestroy', $page->id)}} " title="{{ translate('Delete') }}">

          					<i class="las la-trash"></i>

          				</a>

								@endif

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

