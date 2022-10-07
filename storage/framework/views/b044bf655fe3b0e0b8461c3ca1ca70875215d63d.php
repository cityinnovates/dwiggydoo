

<?php if(isset($category_id)): ?>
    <?php
        $meta_title = \App\Category::find($category_id)->meta_title;
        $meta_description = \App\Category::find($category_id)->meta_description;
    ?>
<?php elseif(isset($brand_id)): ?>
    <?php
        $meta_title = \App\Brand::find($brand_id)->meta_title;
        $meta_description = \App\Brand::find($brand_id)->meta_description;
    ?>
<?php else: ?>
    <?php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    ?>
<?php endif; ?>

<?php $__env->startSection('meta_title'); ?><?php echo e($meta_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($meta_description); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="<?php echo e($meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($meta_description); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($meta_title); ?>" />
    <meta property="og:description" content="<?php echo e($meta_description); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="mb-4 pt-3">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">
                    <div class="col-xl-3 side-filter d-xl-block">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6 mb-0 fw-600"><?php echo e(translate('Filters')); ?></h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" type="button">
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>
                                <div class="bg-white shadow-sm rounded mb-3 text-left">
                                    <div class="fs-15 fw-600 p-3 border-bottom">
                                        <?php echo e(translate('Categories')); ?>

                                    </div>
                                    <div class="p-3">
                                        <ul class="list-unstyled">
                                            <?php if(!isset($category_id)): ?>
                                                <?php $__currentLoopData = \App\Category::where('level', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="mb-2 ml-2">
                                                        <a class="text-reset fs-14" href="<?php echo e(route('customer_products.category', $category->slug)); ?>"><?php echo e($category->getTranslation('name')); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14 fw-600" href="<?php echo e(route('customer.products')); ?>">
                                                        <i class="las la-angle-left"></i>
                                                        <?php echo e(translate('All Categories')); ?>

                                                    </a>
                                                </li>
                                                <?php if(\App\Category::find($category_id)->parent_id != 0): ?>
                                                    <li class="mb-2">
                                                        <a class="text-reset fs-14 fw-600" href="<?php echo e(route('customer_products.category', \App\Category::find(\App\Category::find($category_id)->parent_id)->slug)); ?>">
                                                            <i class="las la-angle-left"></i>
                                                            <?php echo e(\App\Category::find(\App\Category::find($category_id)->parent_id)->getTranslation('name')); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="mb-2">
                                                    <a class="text-reset fs-14 fw-600" href="<?php echo e(route('customer_products.category', \App\Category::find($category_id)->slug)); ?>">
                                                        <i class="las la-angle-left"></i>
                                                        <?php echo e(\App\Category::find($category_id)->getTranslation('name')); ?>

                                                    </a>
                                                </li>
                                                <?php $__currentLoopData = \App\Utility\CategoryUtility::get_immediate_children_ids($category_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="ml-4 mb-2">
                                                        <a class="text-reset fs-14" href="<?php echo e(route('customer_products.category', \App\Category::find($id)->slug)); ?>"><?php echo e(\App\Category::find($id)->getTranslation('name')); ?></a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">

                        <ul class="breadcrumb bg-transparent p-0">
                            <li class="breadcrumb-item opacity-50">
                                <a class="text-reset" href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>
                            </li>
                            <?php if(!isset($category_id)): ?>
                                <li class="breadcrumb-item fw-600  text-dark">
                                    <a class="text-reset" href="<?php echo e(route('customer.products')); ?>">"<?php echo e(translate('All Categories')); ?>"</a>
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item opacity-50">
                                    <a class="text-reset" href="<?php echo e(route('customer.products')); ?>"><?php echo e(translate('All Categories')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($category_id)): ?>
                                <li class="text-dark fw-600 breadcrumb-item">
                                    <a class="text-reset" href="<?php echo e(route('customer_products.category', \App\Category::find($category_id)->slug)); ?>">"<?php echo e(\App\Category::find($category_id)->getTranslation('name')); ?>"</a>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <?php if(isset($category_id)): ?>
                            <input type="hidden" name="category" value="<?php echo e(\App\Category::find($category_id)->slug); ?>">
                        <?php endif; ?>
                        <div class="text-left">
                            <div class="d-flex">
                                <div class="form-group w-200px">
                                    <label class="mb-0 opacity-50"><?php echo e(translate('Sort by')); ?></label>
                                    <select class="form-control form-control-sm aiz-selectpicker" name="sort_by" onchange="filter()">
                                        <option value="1" <?php if(isset($sort_by)): ?> <?php if($sort_by == '1'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>
                                        <option value="2" <?php if(isset($sort_by)): ?> <?php if($sort_by == '2'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>
                                        <option value="3" <?php if(isset($sort_by)): ?> <?php if($sort_by == '3'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price low to high')); ?></option>
                                        <option value="4" <?php if(isset($sort_by)): ?> <?php if($sort_by == '4'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price high to low')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group ml-auto mr-0 w-200px d-none d-md-block">
                                    <label class="mb-0 opacity-50"><?php echo e(translate('Condition')); ?></label>
                                    <select class="form-control form-control-sm aiz-selectpicker" name="condition" onchange="filter()">
                                        <option value=""><?php echo e(translate('All Type')); ?></option>
                                        <option value="new" <?php if(isset($condition)): ?> <?php if($condition == 'new'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('New')); ?></option>
                                        <option value="used" <?php if(isset($condition)): ?> <?php if($condition == 'used'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Used')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group ml-2 mr-0 w-200px d-none d-md-block">
                                    <label class="mb-0 opacity-50"><?php echo e(translate('Brands')); ?></label>
                                    <select class="form-control form-control-sm aiz-selectpicker" data-live-search="true" name="brand" onchange="filter()">
                                        <option value=""><?php echo e(translate('All Brands')); ?></option>
                                        <?php $__currentLoopData = \App\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($brand->slug); ?>" <?php if(isset($brand_id)): ?> <?php if($brand_id == $brand->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($brand->getTranslation('name')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="d-xl-none ml-auto ml-md-3 mr-0 form-group align-self-end">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-5 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2">
                            <?php $__currentLoopData = $customer_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col mb-2">
                                    <div class="aiz-card-box border border-light rounded shadow-sm hov-shadow-md h-100 has-transition bg-white">
                                        <div class="position-relative">
                                            <a href="<?php echo e(route('customer.product', $product->slug)); ?>" class="d-block">
                                                <img
                                                    class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                    data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                    alt="<?php echo e($product->getTranslation('name')); ?>"
                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                                >
                                            </a>
                                            <div class="absolute-top-left pt-2 pl-2">
                                                <?php if($product->conditon == 'new'): ?>
                                                   <span class="badge badge-inline badge-success"><?php echo e(translate('new')); ?></span>
                                               <?php elseif($product->conditon == 'used'): ?>
                                                   <span class="badge badge-inline badge-danger"><?php echo e(translate('Used')); ?></span>
                                               <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="p-md-3 p-2 text-left">
                                            <div class="fs-15">
                                                <span class="fw-700 text-primary"><?php echo e(single_price($product->unit_price)); ?></span>
                                            </div>
                                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0">
                                                <a href="<?php echo e(route('customer.product', $product->slug)); ?>" class="d-block text-reset"><?php echo e($product->getTranslation('name')); ?></a>
                                            </h3>
                                        </div>
                                   </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="aiz-pagination aiz-pagination-center mt-4">
                            <?php echo e($customer_products->links()); ?>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/customer_product_listing.blade.php ENDPATH**/ ?>