<?php

Route::post('/update', 'UpdateController@step0')->name('update');

Route::get('/update/step1', 'UpdateController@step1')->name('update.step1');

Route::get('/update/step2', 'UpdateController@step2')->name('update.step2');



Route::get('/admin', 'HomeController@admin_dashboard')->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::group(['prefix' =>'admin', 'middleware' => ['auth', 'admin']], function(){



	Route::resource('categories','CategoryController');

	Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');

	Route::get('/categories/destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');

	Route::post('/categories/featured', 'CategoryController@updateFeatured')->name('categories.featured');


	Route::resource('reward_questions','RewardQuestionController');

	Route::get('/reward_questions/edit/{id}', 'RewardQuestionController@edit')->name('reward_questions.edit');
	Route::post('/reward_questions/store', 'RewardQuestionController@stores')->name('reward_questions.store');
	Route::post('/reward_questions_type', 'RewardQuestionController@reward_questions_type')->name('reward_questions.type');

	Route::get('/reward_questions/destroy/{id}', 'RewardQuestionController@destroy')->name('reward_questions.destroy');



	Route::resource('ecom_categories','EcomCategoryController');

	Route::get('/ecom_categories/edit/{id}', 'EcomCategoryController@edit')->name('ecom_categories.edit');

	Route::get('/ecom_categories/destroy/{id}', 'EcomCategoryController@destroy')->name('ecom_categories.destroy');

	Route::post('/ecom_categories/featured', 'EcomCategoryController@updateFeatured')->name('ecom_categories.featured');



	Route::resource('subcategories','SubCategoryController');

	Route::get('/subcategories/edit/{id}', 'SubCategoryController@edit')->name('subcategories.edit');

	Route::get('/subcategories/destroy/{id}', 'SubCategoryController@destroy')->name('subcategories.destroy');



	Route::resource('subsubcategories','SubSubCategoryController');

	Route::get('/subsubcategories/edit/{id}', 'SubSubCategoryController@edit')->name('subsubcategories.edit');

	Route::get('/subsubcategories/destroy/{id}', 'SubSubCategoryController@destroy')->name('subsubcategories.destroy');



	Route::resource('brands','BrandController');

	Route::get('/brands/edit/{id}', 'BrandController@edit')->name('brands.edit');

	Route::get('/brands/destroy/{id}', 'BrandController@destroy')->name('brands.destroy');



	Route::resource('profession','ProfessionController');
	Route::get('/profession/edit/{id}', 'ProfessionController@edit')->name('profession.edit');
	Route::post('/profession/store', 'ProfessionController@store')->name('profession.store');
	Route::post('/profession/update', 'ProfessionController@update')->name('profession.update');
	Route::get('/profession/destroy/{id}', 'ProfessionController@destroy')->name('profession.destroy');


	Route::resource('profession_category','ProfessionCategoryController');
	Route::get('/profession_category/edit/{id}', 'ProfessionCategoryController@edit')->name('profession_category.edit');
	Route::post('/profession_category/store', 'ProfessionCategoryController@store')->name('profession_category.store');
	Route::post('/profession_category/update', 'ProfessionCategoryController@update')->name('profession_category.update');
	Route::get('/profession_category/destroy/{id}', 'ProfessionCategoryController@destroy')->name('profession_category.destroy');



	Route::resource('ecom_brands','EcomBrandController');

	Route::get('/ecom_brands/edit/{id}', 'EcomBrandController@edit')->name('ecom_brands.edit');

	Route::get('/ecom_brands/destroy/{id}', 'EcomBrandController@destroy')->name('ecom_brands.destroy');



	Route::get('/products/admin','ProductController@admin_products')->name('products.admin');

	Route::get('/products/seller','ProductController@seller_products')->name('products.seller');

	Route::get('/products/all','ProductController@all_products')->name('products.all');

	Route::get('/products/create','ProductController@create')->name('products.create');

	Route::get('/products/admin/{id}/edit','ProductController@admin_product_edit')->name('products.admin.edit');

	Route::get('/products/seller/{id}/edit','ProductController@seller_product_edit')->name('products.seller.edit');

	Route::post('/products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');

	Route::post('/products/get_products_by_subcategory', 'ProductController@get_products_by_subcategory')->name('products.get_products_by_subcategory');




	Route::get('/ecom_products/admin','EcomProductController@admin_products')->name('ecom_products.admin');
	Route::get('/ecom_products/all','EcomProductController@all_products')->name('ecom_products.all');
	Route::get('/ecom_products/create','EcomProductController@create')->name('ecom_products.create');
	Route::get('/ecom_products/duplicate/{id}','EcomProductController@duplicate')->name('ecom_products.duplicate');
	Route::get('/ecom_products/destroy/{id}','EcomProductController@destroy')->name('ecom_products.destroy');
	Route::post('/ecom_products/store','EcomProductController@store')->name('ecom_products.store');
	Route::post('/ecom_products/update','EcomProductController@update')->name('ecom_products.update');
	Route::get('/ecom_products/admin/{id}/edit','EcomProductController@admin_product_edit')->name('ecom_products.admin.edit');
	Route::post('/ecom_products/todays_deal', 'EcomProductController@updateTodaysDeal')->name('ecom_products.todays_deal');
	Route::post('/ecom_products/published', 'EcomProductController@updatePublished')->name('ecom_products.published');
	Route::post('/ecom_products/featured', 'EcomProductController@updateFeatured')->name('ecom_products.featured');




	Route::resource('sellers','SellerController');

	Route::get('sellers_ban/{id}','SellerController@ban')->name('sellers.ban');

	Route::get('/sellers/destroy/{id}', 'SellerController@destroy')->name('sellers.destroy');

	Route::get('/sellers/view/{id}/verification', 'SellerController@show_verification_request')->name('sellers.show_verification_request');

	Route::get('/sellers/approve/{id}', 'SellerController@approve_seller')->name('sellers.approve');

	Route::get('/sellers/reject/{id}', 'SellerController@reject_seller')->name('sellers.reject');

	Route::get('/sellers/login/{id}', 'SellerController@login')->name('sellers.login');

	Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');

	Route::get('/seller/payments', 'PaymentController@payment_histories')->name('sellers.payment_histories');

	Route::get('/seller/payments/show/{id}', 'PaymentController@show')->name('sellers.payment_history');



	Route::resource('customers','CustomerController');

	Route::get('customers_ban/{customer}','CustomerController@ban')->name('customers.ban');

	Route::get('/customers/login/{id}', 'CustomerController@login')->name('customers.login');

	Route::get('/customers/destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');



	Route::get('/newsletter', 'NewsletterController@index')->name('newsletters.index');

	Route::post('/newsletter/send', 'NewsletterController@send')->name('newsletters.send');

	Route::post('/newsletter/test/smtp', 'NewsletterController@testEmail')->name('test.smtp');



	Route::resource('profile','ProfileController');



	Route::post('/business-settings/update', 'BusinessSettingsController@update')->name('business_settings.update');

	Route::post('/business-settings/update/activation', 'BusinessSettingsController@updateActivationSettings')->name('business_settings.update.activation');

	Route::get('/general-setting', 'BusinessSettingsController@general_setting')->name('general_setting.index');

	Route::get('/activation', 'BusinessSettingsController@activation')->name('activation.index');

	Route::get('/payment-method', 'BusinessSettingsController@payment_method')->name('payment_method.index');

	Route::get('/file_system', 'BusinessSettingsController@file_system')->name('file_system.index');

	Route::get('/social-login', 'BusinessSettingsController@social_login')->name('social_login.index');

	Route::get('/smtp-settings', 'BusinessSettingsController@smtp_settings')->name('smtp_settings.index');

	Route::get('/google-analytics', 'BusinessSettingsController@google_analytics')->name('google_analytics.index');

	Route::get('/google-recaptcha', 'BusinessSettingsController@google_recaptcha')->name('google_recaptcha.index');

	Route::get('/facebook-chat', 'BusinessSettingsController@facebook_chat')->name('facebook_chat.index');

	Route::post('/env_key_update', 'BusinessSettingsController@env_key_update')->name('env_key_update.update');

	Route::post('/payment_method_update', 'BusinessSettingsController@payment_method_update')->name('payment_method.update');

	Route::post('/google_analytics', 'BusinessSettingsController@google_analytics_update')->name('google_analytics.update');

	Route::post('/google_recaptcha', 'BusinessSettingsController@google_recaptcha_update')->name('google_recaptcha.update');

	Route::post('/facebook_chat', 'BusinessSettingsController@facebook_chat_update')->name('facebook_chat.update');

	Route::post('/facebook_pixel', 'BusinessSettingsController@facebook_pixel_update')->name('facebook_pixel.update');

	Route::get('/currency', 'CurrencyController@currency')->name('currency.index');

    Route::post('/currency/update', 'CurrencyController@updateCurrency')->name('currency.update');

    Route::post('/your-currency/update', 'CurrencyController@updateYourCurrency')->name('your_currency.update');

	Route::get('/currency/create', 'CurrencyController@create')->name('currency.create');

	Route::post('/currency/store', 'CurrencyController@store')->name('currency.store');

	Route::post('/currency/currency_edit', 'CurrencyController@edit')->name('currency.edit');

	Route::post('/currency/update_status', 'CurrencyController@update_status')->name('currency.update_status');

	Route::get('/verification/form', 'BusinessSettingsController@seller_verification_form')->name('seller_verification_form.index');

	Route::post('/verification/form', 'BusinessSettingsController@seller_verification_form_update')->name('seller_verification_form.update');

	Route::get('/vendor_commission', 'BusinessSettingsController@vendor_commission')->name('business_settings.vendor_commission');

	Route::post('/vendor_commission_update', 'BusinessSettingsController@vendor_commission_update')->name('business_settings.vendor_commission.update');



	Route::resource('/languages', 'LanguageController');

	Route::post('/languages/{id}/update', 'LanguageController@update')->name('languages.update');

	Route::get('/languages/destroy/{id}', 'LanguageController@destroy')->name('languages.destroy');

	Route::post('/languages/update_rtl_status', 'LanguageController@update_rtl_status')->name('languages.update_rtl_status');

	Route::post('/languages/key_value_store', 'LanguageController@key_value_store')->name('languages.key_value_store');



	Route::get('/frontend_settings/home', 'HomeController@home_settings')->name('home_settings.index');

	Route::post('/frontend_settings/home/top_10', 'HomeController@top_10_settings')->name('top_10_settings.store');

	Route::get('/sellerpolicy/{type}', 'PolicyController@index')->name('sellerpolicy.index');

	Route::get('/returnpolicy/{type}', 'PolicyController@index')->name('returnpolicy.index');

	Route::get('/supportpolicy/{type}', 'PolicyController@index')->name('supportpolicy.index');

	Route::get('/terms/{type}', 'PolicyController@index')->name('terms.index');

	Route::get('/privacypolicy/{type}', 'PolicyController@index')->name('privacypolicy.index');



	//Policy Controller

	Route::post('/policies/store', 'PolicyController@store')->name('policies.store');



	Route::group(['prefix' => 'frontend_settings'], function(){

		Route::get('sliders','SliderController@index')->name('sliders');
		Route::get('sliders/create','SliderController@create')->name('sliders.create');
		Route::post('sliders/store','SliderController@store')->name('sliders.store');
		Route::get('sliders/edit/{id}','SliderController@edit')->name('sliders.edit');
		Route::post('sliders/update','SliderController@update')->name('sliders.update');

	    Route::get('/sliders/destroy/{id}', 'SliderController@destroy')->name('sliders.destroy');



		Route::resource('home_banners','BannerController');

		Route::get('/home_banners/create/{position}', 'BannerController@create')->name('home_banners.create');

		Route::post('/home_banners/update_status', 'BannerController@update_status')->name('home_banners.update_status');

	    Route::get('/home_banners/destroy/{id}', 'BannerController@destroy')->name('home_banners.destroy');



		Route::resource('home_categories','HomeCategoryController');

	    Route::get('/home_categories/destroy/{id}', 'HomeCategoryController@destroy')->name('home_categories.destroy');

		Route::post('/home_categories/update_status', 'HomeCategoryController@update_status')->name('home_categories.update_status');

		Route::post('/home_categories/get_subsubcategories_by_category', 'HomeCategoryController@getSubSubCategories')->name('home_categories.get_subsubcategories_by_category');

	});





		// website setting

	Route::group(['prefix' => 'website'], function(){

		Route::view('/header', 'backend.website_settings.header')->name('website.header');

		Route::view('/footer', 'backend.website_settings.footer')->name('website.footer');
		Route::view('/user_coupons', 'backend.website_settings.user_coupons')->name('website.user_coupons');
		Route::view('/others', 'backend.website_settings.others')->name('website.others');

		Route::view('/pages', 'backend.website_settings.pages.index')->name('website.pages');

		Route::view('/appearance', 'backend.website_settings.appearance')->name('website.appearance');
		
		
		

		Route::resource('custom-pages', 'PageController');
		Route::get('/custom-pages/edit/{id}', 'PageController@edit')->name('custom-pages.edit');
		Route::get('/custom-pages/destroy/{id}', 'PageController@destroy')->name('custom-pages.destroy');
		
		
			Route::get('/custom-pages/dogadvicedestroy/{id}', 'PageController@dogadvicedestroy')->name('custom-pages.dogadvicedestroy');
		
		Route::view('/dogadvice', 'backend.website_settings.pages.dogadviceindex')->name('custom-pages.dogadvice');
		Route::get('/dogadvicecreate', 'PageController@dogadvicecreate')->name('custom-pages.dogadvicecreate');
		Route::post('/dogadvicestore', 'PageController@dogadvicestore')->name('custom-pages.dogadvicestore');
		Route::get('/dogadviceedit/{id}', 'PageController@dogadviceedit')->name('custom-pages.dogadviceedit');
		Route::any('/dogadviceupdate/{id}', 'PageController@dogadviceupdate')->name('custom-pages.dogadviceupdate');
		
		
		Route::view('/dogadvicepost', 'backend.website_settings.pages.dogadvicepostindex')->name('custom-pages.dogadvicepost');
		Route::get('/dogadvicepostcreate', 'PageController@dogadvicepostcreate')->name('custom-pages.dogadvicepostcreate');
		Route::post('/dogadvicepoststore', 'PageController@dogadvicepoststore')->name('custom-pages.dogadvicepoststore');
		Route::get('/dogadvicepostedit/{id}', 'PageController@dogadvicepostedit')->name('custom-pages.dogadvicepostedit');
		Route::any('/dogadvicepostupdate/{id}', 'PageController@dogadvicepostupdate')->name('custom-pages.dogadvicepostupdate');
			Route::get('/custom-pages/dogadvicepostdestroy/{id}', 'PageController@dogadvicepostdestroy')->name('custom-pages.dogadvicepostdestroy');
		
	
		
	
    	Route::view('/dogadvicequestionare', 'backend.website_settings.pages.dogadvicequestionareindex')->name('custom-pages.dogadvicequestionare');
		Route::get('/dogadvicequestionarecreate', 'PageController@dogadvicequestionarecreate')->name('custom-pages.dogadvicequestionarecreate');
		Route::post('/dogadvicequestionarestore', 'PageController@dogadvicequestionarestore')->name('custom-pages.dogadvicequestionarestore');
		Route::get('/dogadvicequestionareedit/{id}', 'PageController@dogadvicequestionareedit')->name('custom-pages.dogadvicequestionareedit');
		Route::any('/dogadvicequestionareupdate/{id}', 'PageController@dogadvicequestionareupdate')->name('custom-pages.dogadvicequestionareupdate');
// 			Route::get('/custom-pages/dogadvicequestionaredestroy/{id}', 'PageController@dogadvicequestionaredestroy')->name('custom-pages.dogadvicequestionaredestroy');
		

	Route::get('/custom-pages/humanadvicedestroy/{id}', 'PageController@humanadvicedestroy')->name('custom-pages.humanadvicedestroy');
		
		Route::view('/humanadvice', 'backend.website_settings.pages.humanadviceindex')->name('custom-pages.humanadvice');
		Route::get('/humanadvicecreate', 'PageController@humanadvicecreate')->name('custom-pages.humanadvicecreate');
		Route::post('/humanadvicestore', 'PageController@humanadvicestore')->name('custom-pages.humanadvicestore');
		Route::get('/humanadviceedit/{id}', 'PageController@humanadviceedit')->name('custom-pages.humanadviceedit');
		Route::any('/humanadviceupdate/{id}', 'PageController@humanadviceupdate')->name('custom-pages.humanadviceupdate');
		
		
		Route::view('/humanadvicepost', 'backend.website_settings.pages.humanadvicepostindex')->name('custom-pages.humanadvicepost');
		Route::get('/humanadvicepostcreate', 'PageController@humanadvicepostcreate')->name('custom-pages.humanadvicepostcreate');
		Route::post('/humanadvicepoststore', 'PageController@humanadvicepoststore')->name('custom-pages.humanadvicepoststore');
		Route::get('/humanadvicepostedit/{id}', 'PageController@humanadvicepostedit')->name('custom-pages.humanadvicepostedit');
		Route::any('/humanadvicepostupdate/{id}', 'PageController@humanadvicepostupdate')->name('custom-pages.humanadvicepostupdate');
			Route::get('/custom-pages/humanadvicepostdestroy/{id}', 'PageController@humanadvicepostdestroy')->name('custom-pages.humanadvicepostdestroy');
		
	
		
	
    	Route::view('/humanadvicequestionare', 'backend.website_settings.pages.humanadvicequestionareindex')->name('custom-pages.humanadvicequestionare');
		Route::get('/humanadvicequestionarecreate', 'PageController@humanadvicequestionarecreate')->name('custom-pages.humanadvicequestionarecreate');
		Route::post('/humanadvicequestionarestore', 'PageController@humanadvicequestionarestore')->name('custom-pages.humanadvicequestionarestore');
		Route::get('/humanadvicequestionareedit/{id}', 'PageController@humanadvicequestionareedit')->name('custom-pages.humanadvicequestionareedit');
		Route::any('/humanadvicequestionareupdate/{id}', 'PageController@humanadvicequestionareupdate')->name('custom-pages.humanadvicequestionareupdate');





////////

	
		Route::get('/custom-pages/blogdestroy/{id}', 'PageController@blogdestroy')->name('custom-pages.blogdestroy');

		Route::view('/blogpages', 'backend.website_settings.pages.blogindex')->name('website.blogpages');


	    Route::post('/blogstore', 'PageController@blogstore')->name('custom-pages.blogstore');	
        Route::get('/show_custom_blogpage', 'PageController@show_custom_blogpage')->name('custom-pages.show_custom_blogpage');
        Route::get('/blogcreate', 'PageController@blogcreate')->name('custom-pages.blogcreate');
        Route::get('/blogedit/{id}', 'PageController@blogedit')->name('custom-pages.blogedit');
        Route::any('/blogupdate/{id}', 'PageController@blogupdate')->name('custom-pages.blogupdate');




        	Route::get('/custom-pages/blogdestroyslider/{id}', 'PageController@blogdestroyslider')->name('custom-pages.blogdestroyslider');

		Route::view('/blogpagesslider', 'backend.website_settings.pages.blogindexslider')->name('website.blogpagesslider');


	    Route::post('/blogstoreslider', 'PageController@blogstoreslider')->name('custom-pages.blogstoreslider');	
        Route::get('/show_custom_blogpageslider', 'PageController@show_custom_blogpageslider')->name('custom-pages.show_custom_blogpageslider');
        Route::get('/blogcreateslider', 'PageController@blogcreateslider')->name('custom-pages.blogcreateslider');
        Route::get('/blogeditslider/{id}', 'PageController@blogeditslider')->name('custom-pages.blogeditslider');
        Route::any('/blogupdateslider/{id}', 'PageController@blogupdateslider')->name('custom-pages.blogupdateslider');
	});



        
            Route::get('manage-plans', 'PlansController@index')->name('plan.plans');
            Route::get('manage-plans/destory/{id}', 'PlansController@destory')->name('plan.plans_destory');
            Route::post('manage-plans/cstatus', 'PlansController@cstatus')->name('plan.plans_cstatus');
            Route::post('manage-plans/add-ajax', 'PlansController@add_plans_ajax')->name('plan.plans_add_ajax');
            Route::get('manage-plans/edit/{id}', 'PlansController@edit')->name('plan.plans_edit');
            Route::post('manage-plans/update', 'PlansController@update')->name('plan.plans_update');
            
            
            
        Route::view('/homepagesslider', 'backend.website_settings.pages.homeindexslider')->name('website.homepagesslider');
	    Route::post('/homestoreslider', 'PageController@homestoreslider')->name('custom-pages.homestoreslider');	
        Route::get('/show_custom_homepageslider', 'PageController@show_custom_homepageslider')->name('custom-pages.show_custom_homepageslider');
        Route::get('/homecreateslider', 'PageController@homecreateslider')->name('custom-pages.homecreateslider');
        Route::get('/homeeditslider/{id}', 'PageController@homeeditslider')->name('custom-pages.homeeditslider');
        Route::any('/homeupdateslider/{id}', 'PageController@homeupdateslider')->name('custom-pages.homeupdateslider');
    	Route::get('/custom-pages/homedestroy/{id}', 'PageController@homedestroy')->name('custom-pages.homedestroyslider');





	Route::resource('roles','RoleController');

	Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');

    Route::get('/roles/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');



    Route::resource('staffs','StaffController');

    Route::get('/staffs/destroy/{id}', 'StaffController@destroy')->name('staffs.destroy');



	Route::resource('flash_deals','FlashDealController');
	
	Route::get('/flash_deals/edit/{id}', 'FlashDealController@edit')->name('flash_deals.edit');

  	Route::get('/flash_deals/destroy/{id}', 'FlashDealController@destroy')->name('flash_deals.destroy');

	Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');

	Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');

	Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');

	Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');


	Route::get('/testp', 'TestController@pardeep');
	Route::get('/coupon', 'TestController@index')->name('coupon.index');
	Route::get('/coupon/create', 'TestController@create')->name('coupon.create');
	Route::post('/coupon/store', 'TestController@store')->name('coupon.store');
	Route::get('/coupon/edit/{id}', 'TestController@edit')->name('coupon.edit');
	Route::post('/coupon/update/{id}', 'TestController@update')->name('coupon.update');
	Route::post('/coupon/get_form', 'TestController@get_coupon_form')->name('coupon.get_coupon_form');
	Route::post('/coupon/get_form_edit', 'TestController@get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
	Route::get('/coupon/destroy/{id}', 'TestController@destroy')->name('coupon.destroy');
	//Subscribers

	Route::get('/subscribers', 'SubscriberController@index')->name('subscribers.index');





	// All Orders

	Route::get('/all_orders', 'OrderController@all_orders')->name('all_orders.index');
	Route::get('/user_orders', 'EcomOrderController@user_orders')->name('user.orders');

	Route::get('/all_orders/{id}/show', 'OrderController@all_orders_show')->name('all_orders.show');
	Route::get('/user_orders/{id}/show', 'EcomOrderController@user_orders_show')->name('user_orders.show');

	// All Orders

	Route::get('/ecom_all_orders', 'EcomOrderController@all_orders')->name('ecom_all_orders.index');

	Route::get('/ecom_all_orders/{id}/show', 'EcomOrderController@all_orders_show')->name('ecom_all_orders.show');



	// Inhouse Orders

	Route::get('/inhouse-orders', 'OrderController@admin_orders')->name('inhouse_orders.index');

	Route::get('/inhouse-orders/{id}/show', 'OrderController@show')->name('inhouse_orders.show');



	// Seller Orders

	Route::get('/seller_orders', 'OrderController@seller_orders')->name('seller_orders.index');

	Route::get('/seller_orders/{id}/show', 'OrderController@seller_orders_show')->name('seller_orders.show');



	// Pickup point orders

	Route::get('orders_by_pickup_point','OrderController@pickup_point_order_index')->name('pick_up_point.order_index');

	Route::get('/orders_by_pickup_point/{id}/show', 'OrderController@pickup_point_order_sales_show')->name('pick_up_point.order_show');



	Route::get('/orders/destroy/{id}', 'OrderController@destroy')->name('orders.destroy');


	Route::get('/ecom_orders/destroy/{id}', 'EcomOrderController@destroy')->name('ecom_orders.destroy');

	Route::get('invoice/admin/{order_id}', 'InvoiceController@admin_invoice_download')->name('admin.invoice.download');



	Route::resource('links','LinkController');

	Route::get('/links/destroy/{id}', 'LinkController@destroy')->name('links.destroy');



	Route::resource('seosetting','SEOController');



	Route::post('/pay_to_seller', 'CommissionController@pay_to_seller')->name('commissions.pay_to_seller');



	//Reports

	Route::get('/stock_report', 'ReportController@stock_report')->name('stock_report.index');

	Route::get('/in_house_sale_report', 'ReportController@in_house_sale_report')->name('in_house_sale_report.index');

	Route::get('/seller_sale_report', 'ReportController@seller_sale_report')->name('seller_sale_report.index');

	Route::get('/wish_report', 'ReportController@wish_report')->name('wish_report.index');

	Route::get('/user_search_report', 'ReportController@user_search_report')->name('user_search_report.index');




	//Reviews

	Route::get('/reviews', 'ReviewController@index')->name('reviews.index');

	Route::post('/reviews/published', 'ReviewController@updatePublished')->name('reviews.published');

	//Reviews

	Route::get('/ecom_reviews', 'EcomReviewController@index')->name('ecom_reviews.index');

	Route::post('/ecom_reviews/published', 'EcomReviewController@updatePublished')->name('ecom_reviews.published');



	//Support_Ticket

	Route::get('support_ticket/','SupportTicketController@admin_index')->name('support_ticket.admin_index');

	Route::get('support_ticket/{id}/show','SupportTicketController@admin_show')->name('support_ticket.admin_show');

	Route::post('support_ticket/reply','SupportTicketController@admin_store')->name('support_ticket.admin_store');



	//Pickup_Points

	Route::resource('pick_up_points','PickupPointController');

	Route::get('/pick_up_points/edit/{id}', 'PickupPointController@edit')->name('pick_up_points.edit');

	Route::get('/pick_up_points/destroy/{id}', 'PickupPointController@destroy')->name('pick_up_points.destroy');



	//conversation of seller customer

	Route::get('conversations','ConversationController@admin_index')->name('conversations.admin_index');

	Route::get('conversations/{id}/show','ConversationController@admin_show')->name('conversations.admin_show');



    Route::post('/sellers/profile_modal', 'SellerController@profile_modal')->name('sellers.profile_modal');

    Route::post('/sellers/approved', 'SellerController@updateApproved')->name('sellers.approved');



	Route::resource('attributes','AttributeController');

	Route::get('/attributes/edit/{id}', 'AttributeController@edit')->name('attributes.edit');

	Route::get('/attributes/destroy/{id}', 'AttributeController@destroy')->name('attributes.destroy');



	Route::resource('city','CityController');

	Route::get('/city/edit/{id}', 'CityController@edit')->name('city.edit');

	Route::get('/city/destroy/{id}', 'CityController@destroy')->name('city.destroy');

	

	Route::resource('state','StateController');

	Route::get('/state/edit/{id}', 'StateController@edit')->name('state.edit');

	Route::get('/state/destroy/{id}', 'StateController@destroy')->name('state.destroy');


  



	Route::resource('breed','BreedController');

	Route::get('/breed/edit/{id}', 'BreedController@edit')->name('breed.edit');

	Route::get('/breed/destroy/{id}', 'BreedController@destroy')->name('breed.destroy');


	Route::resource('addons','AddonController');

	Route::post('/addons/activation', 'AddonController@activation')->name('addons.activation');



	Route::get('/customer-bulk-upload/index', 'CustomerBulkUploadController@index')->name('customer_bulk_upload.index');

	Route::post('/bulk-user-upload', 'CustomerBulkUploadController@user_bulk_upload')->name('bulk_user_upload');

	Route::post('/bulk-customer-upload', 'CustomerBulkUploadController@customer_bulk_file')->name('bulk_customer_upload');

	Route::get('/user', 'CustomerBulkUploadController@pdf_download_user')->name('pdf.download_user');

	//Customer Package



	Route::resource('customer_packages','CustomerPackageController');

	Route::get('/customer_packages/edit/{id}', 'CustomerPackageController@edit')->name('customer_packages.edit');

	Route::get('/customer_packages/destroy/{id}', 'CustomerPackageController@destroy')->name('customer_packages.destroy');



	//Classified Products

	Route::get('/classified_products', 'CustomerProductController@customer_product_index')->name('classified_products');

	Route::post('/classified_products/published', 'CustomerProductController@updatePublished')->name('classified_products.published');



	//Shipping Configuration

	Route::get('/shipping_configuration', 'BusinessSettingsController@shipping_configuration')->name('shipping_configuration.index');

	Route::post('/shipping_configuration/update', 'BusinessSettingsController@shipping_configuration_update')->name('shipping_configuration.update');






	Route::resource('countries','CountryController');

	Route::post('/countries/status', 'CountryController@updateStatus')->name('countries.status');



	Route::view('/system/update', 'backend.system.update')->name('system_update');

	Route::view('/system/server-status', 'backend.system.server_status')->name('system_server');

});

