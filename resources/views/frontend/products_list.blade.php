@extends('frontend.layouts.app')
@section('header_style')

@endsection

@section('content')

	<section class="upwordbaner">
	    <div class="container">
	        <div class="row">
	            <div class="col hiwwe">
	                <h1 style="color: white; margin-top: 130px;"><i><b>Want to earn more points?</b></i></h1>
	                <img class="cbh" src="{{ route('home') }}/images/Layer_1-2.png">
	                <button class="fghy" style="border: 1px solid #fff; ">Earn Points</button>
	            </div>
	            <div class="col" id="res"></div>
	        </div>
	    </div>
	</section>
	<br>
	<div class="container">
		<form class="" id="search-form" action="" method="GET">
	    <div class="row">
	        <div class="col-3" id="res">
	            <div class="prl">
	                <h4>PRODUCT LISTING</h4>
	            </div>
	            <br>
	            <div class="alct ">
		                <h5 style="border-bottom: 1px solid rgb(224, 224, 224); padding-bottom: 10px;"><span class="leftop">ALL CATEGORY</span></h5>
		                <div class="checkbx leftop mb-4">
		                	@foreach(\App\Models\EcomCategory::where('level', 0)->get() as $key => $category)
		                	 <a class="text-reset fs-14" href="{{ route('products.listing_category', $category->slug) }}">{{ $category->name }}</a> <br/>
	                        @endforeach
		                </div>
		                <h5 style="border-bottom: 1px solid rgb(224, 224, 224); padding-bottom: 10px; border-top: 1px solid rgb(224, 224, 224); padding-top: 10px;"><span class="leftop" style="padding-top: 30px !important;">FILTER BY</span></h5>
		                <div class="leftop">
		                    <p>SELL PRICE</p>
		                    <input type="checkbox" id="vehicle7" name="vehicle7" value="Bike7">
		                    <label for="vehicle7"> Nike</label><br>
		                </div>
	            </div>


	        </div>
	        <div class="col">
	            <div class="row">
	                <div class="col"></div>
	                <div class="col">
	                    <div class="dd_search d-flex align-items-center">
	                        <label class="f-15 gotham-medium mr-4 mb-0 color-70">Sort by</label>
		                        <select class="form-control srch-form px-4 gotham-book " name="sort_by" onchange="filter()">
		                             <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>

	                                <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>

	                                <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>

	                                <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
		                        </select>
		                    </div>
	                </div>

	            </div>
	            <br>

	            <div class="row text-center">
	            	 @foreach ($products as $key => $product)
	                <div class="col-md-4">
	                	<a href="{{route('products.details', $product->slug)}}">
		                	<img src="{{ uploaded_asset($product->thumbnail_img) }}">
		                    <h4 style="margin-top: 10px;">{{ $product->getTranslation('name') }}</h4>
		                    <p><b><i class="fa-solid fa-coins"></i> {{ $product->unit_price }} Dwiggy coin</b></p>
		                </a>
	                    <hr>
	                </div>
	                @endforeach
                    <div class="col-12 mt-4">
                    	<div class="d-flex justify-content-end align-items-center">{{ $products->links() }}</div>
                    </div>
	            </div>
	        </div>
	    </div>
	</form>
</div>

@endsection

@section('footer_script')
    <script type="text/javascript">

        function filter(){
            $('#search-form').submit();

        }

        function rangefilter(arg){

            $('input[name=min_price]').val(arg[0]);

            $('input[name=max_price]').val(arg[1]);

            filter();

        }

    </script>
@endsection