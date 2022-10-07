<?php $__env->startSection('content'); ?>
<div class="container pt-4">
    <!--<section>		<img src="images/list-banner.png" class="w-100">  </section>-->
    <section>
	 <form class="" id="search-form" action="" method="GET">
        <div class="row">
            <div class="col-lg-3 col-12"></div>
            <div class="col-lg-9 col-12">
                 <ul class="breadcrumb bg-transparent p-0">

                            <li class="breadcrumb-item opacity-50">

                                <a class="text-reset" href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>

                            </li>

                            <?php if(!isset($category_id)): ?>

                                <li class="breadcrumb-item fw-600  text-dark">

                                    <a class="text-reset" href="<?php echo e(route('search')); ?>">"<?php echo e(translate('All Categories')); ?>"</a>

                                </li>

                            <?php else: ?>

                                <li class="breadcrumb-item opacity-50">

                                    <a class="text-reset" href="<?php echo e(route('search')); ?>"><?php echo e(translate('All Categories')); ?></a>

                                </li>

                            <?php endif; ?>

                            <?php if(isset($category_id)): ?>

                                <li class="text-dark fw-600 breadcrumb-item">

                                    <a class="text-reset" href="<?php echo e(route('products.category', \App\Category::find($category_id)->slug)); ?>"><?php echo e(\App\Category::find($category_id)->getTranslation('name')); ?></a>

                                </li>

                            <?php endif; ?>

                        </ul>
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="result"></div>
                    <div class="shortby form-inline">
                        <label class="mr-3"> Sort By</label>
						<select class="form-control shortby" name="sort_by" onchange="filter()">

                                        <option value="newest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>

                                        <option value="oldest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>

                                        <option value="price-asc" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'price-asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price low to high')); ?></option>

                                        <option value="price-desc" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'price-desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price high to low')); ?></option>

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

                                            <?php if(!isset($category_id)): ?>

                                                <?php $__currentLoopData = \App\Category::where('level', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <li class="mb-2 ml-2">

                                                        <a class="text-reset fs-14" href="<?php echo e(route('products.category', $category->slug)); ?>"><?php echo e($category->getTranslation('name')); ?></a>

                                                    </li>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php else: ?>

                                                <li class="mb-2">

                                                    <a class="text-reset fs-14 fw-600" href="<?php echo e(route('search')); ?>">

                                                        <i class="las la-angle-left"></i>

                                                        <?php echo e(translate('All Categories')); ?>


                                                    </a>

                                                </li>

                                                <?php if(\App\Category::find($category_id)->parent_id != 0): ?>

                                                    <li class="mb-2">

                                                        <a class="text-reset fs-14 fw-600" href="<?php echo e(route('products.category', \App\Category::find(\App\Category::find($category_id)->parent_id)->slug)); ?>">

                                                            <i class="las la-angle-left"></i>

                                                            <?php echo e(\App\Category::find(\App\Category::find($category_id)->parent_id)->getTranslation('name')); ?>


                                                        </a>

                                                    </li>

                                                <?php endif; ?>

                                                <li class="mb-2">

                                                    <a class="text-reset fs-14 fw-600" href="<?php echo e(route('products.category', \App\Category::find($category_id)->slug)); ?>">

                                                        <i class="las la-angle-left"></i>

                                                        <?php echo e(\App\Category::find($category_id)->getTranslation('name')); ?>


                                                    </a>

                                                </li>

                                                <?php $__currentLoopData = \App\Utility\CategoryUtility::get_immediate_children_ids($category_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <li class="ml-4 mb-2">

                                                        <a class="text-reset fs-14" href="<?php echo e(route('products.category', \App\Category::find($id)->slug)); ?>"><?php echo e(\App\Category::find($id)->getTranslation('name')); ?></a>

                                                    </li>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>

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
                   <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <?php //echo "<pre>"; print_r($product);  ?>
                    <div class="col-12 col-md-6 col-lg-4 p-3">
                        <div class="list-box">
                           <?php if($product->discount > 0): ?><span class="ribbon"> <?php if($product->discount_type=='percent'): ?> <?php echo e(round($product->discount, 2)); ?>% <?php else: ?> ₹ <?php echo e(round($product->discount, 2)); ?> <?php endif; ?> off</span><?php endif; ?>
                            <div class="pro-img"><img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>" class="img-fluid" /></div>
                            <p><?php echo e($product->getTranslation('name')); ?></p>
                            <div class="price mb-0">
							<?php if(home_base_price($product->id) != home_discounted_base_price($product->id)): ?>
							<span class="cut-price">₹<?php echo e(home_base_price($product->id)); ?> </span>
							<?php endif; ?>
							₹<?php echo e(home_discounted_base_price($product->id)); ?></div>
                            <div class="d-flex mt-3 align-items-center justify-content-center">
                                <!-- <div class="cart-icon">
                                    <a href="<?php echo e(route('product', $product->slug)); ?>"><img src="<?php echo e(asset('assets/images/shopping-cart.png')); ?>" /> View Details</a>
                                    
                                </div> -->
                                <a href="<?php echo e(route('product', $product->slug)); ?>" class="red-btn px-4 py-2 my-2">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mt-4">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
		</form>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/product_listing.blade.php ENDPATH**/ ?>