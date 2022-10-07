<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-block text-left">
                <img class="mw-100" src="https://cilearningschool.com/dwiggydoo/public/assets/images/logo.svg" class="brand-icon" alt="<?php echo e(get_setting('site_name')); ?>">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="<?php echo e(translate('Search in menu')); ?>" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- Product -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions))): ?>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Ecommerce')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="<?php echo e(route('ecom_products.create')); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Add New product')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('ecom_products.all')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('All Products')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('ecom_categories.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['ecom_categories.index', 'ecom_categories.create', 'ecom_categories.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Category')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('ecom_brands.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['ecom_brands.index', 'ecom_brands.create', 'ecom_brands.edit'])); ?>" >
                                <span class="aiz-side-nav-text"><?php echo e(translate('Brand')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- Product -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions))): ?>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dog Details')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('products.all')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('All Dogs')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('categories.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Genes')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('breed.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['breed.index','breed.create','breed.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Breed')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('attributes.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Country')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('state.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['state.index','state.create','state.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('State')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('city.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['city.index','city.create','city.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('City')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Customers')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('customers.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Customer list')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Sliders')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('sliders')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('All Slider')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- marketing -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions))): ?>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-bullhorn aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Marketing')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <?php if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <?php endif; ?>
                        <?php if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions))): ?>
                        <?php endif; ?>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('subscribers.index')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Subscribers')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li> 
                <?php endif; ?>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Professions')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(url('admin/profession')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['profession.edit,profession.create'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('All Profession')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(url('admin/profession_category')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Category')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Blog')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.blogpages')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('All Blogs')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.blogpagesslider')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Blogs Slider')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Advice')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Dog Advice')); ?></span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.dogadvice')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.dogadvice', 'custom-pages.dogadvicecreate' ,'custom-pages.dogadviceedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Advice')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.dogadvicepost')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.dogadvicepost', 'custom-pages.dogadvicepostcreate' ,'custom-pages.dogadvicepostedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Post Advice')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.dogadvicequestionare')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.dogadvicequestionare', 'custom-pages.dogadvicequestionarecreate' ,'custom-pages.dogadvicequestionareedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Questionare Advice')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Human Advice')); ?></span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.humanadvice')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.humanadvice', 'custom-pages.humanadvicecreate' ,'custom-pages.humanadviceedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Advice')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.humanadvicepost')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.humanadvicepost', 'custom-pages.humanadvicepostcreate' ,'custom-pages.humanadvicepostedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Post Advice')); ?></span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="<?php echo e(route('custom-pages.humanadvicequestionare')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['custom-pages.humanadvicequestionare', 'custom-pages.humanadvicequestionarecreate' ,'custom-pages.humanadvicequestionareedit'])); ?>">
                                        <span class="aiz-side-nav-text"><?php echo e(translate('Questionare Advice')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions))): ?>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Website Setup')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.pages')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Pages')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.footer')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Footer')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.user_coupons')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('User Coupons')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.others')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Others')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('website.homepagesslider')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Home Slider')); ?></span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="<?php echo e(route('plan.plans')); ?>" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text"><?php echo e(translate('Subscription')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('home').'/admin/reward_questions'); ?>" class="aiz-side-nav-link">
                    	<i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Daily Question')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
<?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/backend/inc/admin_sidenav.blade.php ENDPATH**/ ?>