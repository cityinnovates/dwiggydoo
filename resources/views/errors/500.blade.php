@extends('frontend.layouts.app')

@section('content')
<section class="text-center py-6">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mx-auto">
<?php 

?>
				<h1 class="h2 fw-700 mt-5">{{ $exception->getMessage() }}</h1>
		    	<p class="fs-16 opacity-60">{{ translate("Sorry for the inconvenience, but we're working on it.") }} <br> {{ translate("Error code") }}: 500</p>
			</div>
		</div>
	</div>
</section>
@endsection
