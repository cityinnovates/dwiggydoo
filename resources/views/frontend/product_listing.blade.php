@extends('frontend.layouts.app')@section('content')
<div class="container pt-4">
    <!--<section>		<img src="images/list-banner.png" class="w-100">  </section>-->
    <section>
	 <form class="" id="search-form" action="" method="GET">
        <div class="row">
            <div class="col-lg-3 col-12"></div>
            <div class="col-lg-9 col-12">
                 <ul class="breadcrumb bg-transparent p-0">

                            <li class="breadcrumb-item opacity-50">

                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>

                            </li>

                            @if(!isset($category_id))

                                <li class="breadcrumb-item fw-600  text-dark">

                                    <a class="text-reset" href="{{ route('search') }}">"{{ translate('All Categories')}}"</a>

                                </li>

                            @else

                                <li class="breadcrumb-item opacity-50">

                                    <a class="text-reset" href="{{ route('search') }}">{{ translate('All Categories')}}</a>

                                </li>

                            @endif

                            @if(isset($category_id))

                                <li class="text-dark fw-600 breadcrumb-item">

                                    <a class="text-reset" href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">{{ \App\Category::find($category_id)->getTranslation('name') }}</a>

                                </li>

                            @endif

                        </ul>
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="result"></div>
                    <div class="shortby form-inline">
                        <label class="mr-3"> Sort By</label>
						<select class="form-control shortby" name="sort_by" onchange="filter()">

                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>

                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>

                                        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>

                                        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>

                                    </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12 p-3 mt-3">
                <div class="filter-box">
                    <div class="title">Categories</div>
                    <div class="p-4">
                        <div class="mb-4">
                                                                    <ul class="list-unstyled">

                                            @if (!isset($category_id))

                                                @foreach (\App\Category::where('level', 0)->get() as $category)

                                                    <li class="mb-2 ml-2">

                                                        <a class="text-reset fs-14" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>

                                                    </li>

                                                @endforeach

                                            @else

                                                <li class="mb-2">

                                                    <a class="text-reset fs-14 fw-600" href="{{ route('search') }}">

                                                        <i class="las la-angle-left"></i>

                                                        {{ translate('All Categories')}}

                                                    </a>

                                                </li>

                                                @if (\App\Category::find($category_id)->parent_id != 0)

                                                    <li class="mb-2">

                                                        <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find(\App\Category::find($category_id)->parent_id)->slug) }}">

                                                            <i class="las la-angle-left"></i>

                                                            {{ \App\Category::find(\App\Category::find($category_id)->parent_id)->getTranslation('name') }}

                                                        </a>

                                                    </li>

                                                @endif

                                                <li class="mb-2">

                                                    <a class="text-reset fs-14 fw-600" href="{{ route('products.category', \App\Category::find($category_id)->slug) }}">

                                                        <i class="las la-angle-left"></i>

                                                        {{ \App\Category::find($category_id)->getTranslation('name') }}

                                                    </a>

                                                </li>

                                                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category_id) as $key => $id)

                                                    <li class="ml-4 mb-2">

                                                        <a class="text-reset fs-14" href="{{ route('products.category', \App\Category::find($id)->slug) }}">{{ \App\Category::find($id)->getTranslation('name') }}</a>

                                                    </li>

                                                @endforeach

                                            @endif

                                        </ul>
                        </div>
                        <!--<h5 class="fltr-by py-3 m-0">Filter By</h5>
                        <div class="pb-3">
                            <h4 class="filter-name">Size</h4>
                            <label class="checkbox bounce filter-chkbox-100 active">
                                <input type="checkbox" checked="" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>S (05)</span>
                            </label>
                            <label class="checkbox bounce filter-chkbox-100">
                                <input type="checkbox" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>M (15)</span>
                            </label>
                            <label class="checkbox bounce filter-chkbox-100">
                                <input type="checkbox" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>L (09)</span>
                            </label>
                            <label class="checkbox bounce filter-chkbox-100">
                                <input type="checkbox" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>XL (08)</span>
                            </label>
                        </div>-->
                        <!--<div class="pb-3">
                            <h4 class="filter-name">Brand</h4>
                            <label class="checkbox bounce filter-chkbox-100 active">
                                <input type="checkbox" checked="" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>Brand 1</span>
                            </label>
                        </div>
                        <div class="pb-3">
                            <h4 class="filter-name">Price</h4>
                            <label class="checkbox bounce filter-chkbox-100 active">
                                <input type="checkbox" checked="" /> <svg viewBox="0 0 21 21"><polyline points="5 10.75 8.5 14.25 16 6"></polyline></svg> <span>All</span>
                            </label>
                        </div>
                        <div class="pb-3"><a href="#" class="reset-filter">Reset Filter</a></div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 p-0 py-3">
                <div class="row m-0">
                   @foreach ($products as $key => $product)
				   <?php //echo "<pre>"; print_r($product);  ?>
                    <div class="col-12 col-md-6 col-lg-4 p-3">
                        <div class="list-box">
                           @if ($product->discount > 0)<span class="ribbon"> @if($product->discount_type=='percent') {{  round($product->discount, 2)}}% @else ₹ {{ round($product->discount, 2)}} @endif off</span>@endif
                            <div class="pro-img"><img src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fluid" /></div>
                            <p>{{ $product->getTranslation('name') }}</p>
                            <div class="price mb-0">
							@if(home_base_price($product->id) != home_discounted_base_price($product->id))
							<span class="cut-price">₹{{ home_base_price($product->id) }} </span>
							@endif
							₹{{ home_discounted_base_price($product->id) }}</div>
                            <div class="d-flex mt-3 align-items-center justify-content-center">
                                <!-- <div class="cart-icon">
                                    <a href="{{ route('product', $product->slug) }}"><img src="{{asset('assets/images/shopping-cart.png')}}" /> View Details</a>
                                    
                                </div> -->
                                <a href="{{ route('product', $product->slug) }}" class="red-btn px-4 py-2 my-2">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
		</form>
    </section>
</div>
@endsection
@section('script')

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