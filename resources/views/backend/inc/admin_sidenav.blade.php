<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                <img class="mw-100" src="https://cilearningschool.com/dwiggydoo/public/assets/images/logo.svg" class="brand-icon" alt="{{ get_setting('site_name') }}">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>
                <!-- Product -->
                @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Ecommerce')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="{{route('ecom_products.create')}}">
                                <span class="aiz-side-nav-text">{{translate('Add New product')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('ecom_products.all')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('All Products') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('ecom_categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['ecom_categories.index', 'ecom_categories.create', 'ecom_categories.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('ecom_brands.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['ecom_brands.index', 'ecom_brands.create', 'ecom_brands.edit'])}}" >
                                <span class="aiz-side-nav-text">{{translate('Brand')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- Product -->
                @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dog Details')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('All Dogs') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Genes')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('breed.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['breed.index','breed.create','breed.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Breed')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('attributes.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Country')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('state.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['state.index','state.create','state.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('State')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('city.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['city.index','city.create','city.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('City')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Customer list') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Sliders') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('sliders') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('All Slider') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- marketing -->
                @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-bullhorn aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Marketing') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        @endif
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                            </a>
                        </li>
                    </ul>
                </li> 
                @endif

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Professions')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ url('admin/profession') }}" class="aiz-side-nav-link {{ areActiveRoutes(['profession.edit,profession.create'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Profession')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ url('admin/profession_category') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Blog')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.blogpages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Blogs')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.blogpagesslider') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Blogs Slider')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Advice')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Dog Advice')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.dogadvice') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.dogadvice', 'custom-pages.dogadvicecreate' ,'custom-pages.dogadviceedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Advice')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.dogadvicepost') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.dogadvicepost', 'custom-pages.dogadvicepostcreate' ,'custom-pages.dogadvicepostedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Post Advice')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.dogadvicequestionare') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.dogadvicequestionare', 'custom-pages.dogadvicequestionarecreate' ,'custom-pages.dogadvicequestionareedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Questionare Advice')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Human Advice')}}</span>
                                <span class="aiz-side-nav-arrow"></span>
                            </a>
                            <ul class="aiz-side-nav-list level-3">
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.humanadvice') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.humanadvice', 'custom-pages.humanadvicecreate' ,'custom-pages.humanadviceedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Advice')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.humanadvicepost') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.humanadvicepost', 'custom-pages.humanadvicepostcreate' ,'custom-pages.humanadvicepostedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Post Advice')}}</span>
                                    </a>
                                </li>
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('custom-pages.humanadvicequestionare') }}" class="aiz-side-nav-link {{ areActiveRoutes(['custom-pages.humanadvicequestionare', 'custom-pages.humanadvicequestionarecreate' ,'custom-pages.humanadvicequestionareedit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Questionare Advice')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.footer') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.user_coupons') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('User Coupons')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.others') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Others')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('website.homepagesslider') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Home Slider')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('plan.plans')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Subscription')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('home').'/admin/reward_questions' }}" class="aiz-side-nav-link">
                    	<i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Daily Question')}}</span>
                    </a>
                </li>
                @endif
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
