<?php


use App\Http\Controllers\HomeController;
/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

// use App\Mail\SupportMailManager;

Route::get('/refresh-csrf', function(){

    return csrf_token();

});
Route::get('/sitemap.xml', function(){

	return base_path('sitemap.xml');

});




//Home Page

Route::get('/', 'HomeController@index')->name('home');
Route::get('/registers', 'HomeController@registers')->name('registers');
Route::get('/profiles', 'HomeController@profiles')->name('profiles');
Route::get('/login','HomeController@login')->name('login');
Route::get('/about-us','HomeController@aboutus')->name('aboutus');
Route::get('/term','HomeController@term')->name('term');
Route::get('/privacy','HomeController@privacy')->name('privacy');
Route::get('/contact','HomeController@contact')->name('contact-us');
Route::get('/social','HomeController@social')->name('social');
Route::get('/human_advice','HomeController@human_advice')->name('human_advice');
Route::get('/dog_advice','HomeController@dog_advice')->name('dog_advice');

Route::get('/blogs','HomeController@blogs')->name('blogs');
Route::get('/blogsdetails/{id}','HomeController@blogsdetails')->name('blogsdetails');

Route::post('/sendotptomobile','HomeController@sendotptomobile')->name('sendotptomobile');
Route::post('/sendotptomobiler','HomeController@sendotptomobiler')->name('sendotptomobiler');
Route::post('/sendotptoemail','HomeController@sendotptoemail')->name('sendotptoemail');

Route::get('/regotp/{id}','HomeController@regotp')->name('regotp');
Route::post('/verifyotpregister','HomeController@verifyotpregister')->name('verifyotpregister');
Route::get('/sendotptomobiletest','HomeController@sendotptomobiletest')->name('sendotptomobiletest');
Route::post('/verifyotplogin','HomeController@verifyotplogin')->name('verifyotplogin');

Route::get('/all-connections', 'HomeController@all_connections')->name('all_connections');
Route::get('/all-connections-breed', 'HomeController@all_connections_breed')->name('connections.breed');


Route::get('/connections', 'HomeController@connections')->name('connections');
Route::post('/connections/dog_wishlists', 'HomeController@connections_dog_wishlists')->name('connections_dog_wishlists');
Route::get('/all-request', 'HomeController@all_request')->name('all_request');



Route::group(['middleware' => ['user', 'verified','unbanned']], function(){

	Route::get('/user/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::get('/user/notification', 'UserDashboardController@notification')->name('notification');
	Route::get('/user/redeem', 'UserDashboardController@redeem')->name('redeem');
	Route::get('/user/user_coupons', 'UserDashboardController@user_coupons')->name('user_coupons');
	Route::get('/user/profile', 'HomeController@profile')->name('profile');
	Route::get('/user/account', 'HomeController@account')->name('account');
	Route::get('/user/user-plan', 'PlansController@user_plan')->name('user_plan');
	Route::get('/user/connections-list', 'UserDashboardController@user_connections_list')->name('user.connections_list');

	Route::get('/user/privacy-policy', 'UserDashboardController@user_privacy_policy')->name('user.privacy_policy');
	Route::get('/user/terms-of-uses', 'UserDashboardController@user_terms_of_uses')->name('user.terms_of_uses');
	Route::get('/user/help-support', 'UserDashboardController@user_help_support')->name('user.help_support');
	Route::get('/user/address', 'UserDashboardController@user_address')->name('user.address');
	Route::get('/user/order', 'EcomOrderController@user_order')->name('user.order');
	Route::get('/orders/user-details/{id}', 'EcomOrderController@user_order_details')->name('user.orders_details');
	Route::get('/user/setting', 'UserDashboardController@user_setting')->name('user.setting');
	Route::post('/user/setting/update', 'UserDashboardController@user_setting_update')->name('user.setting_update');
	Route::get('/dog/account', 'UserDashboardController@dog_account')->name('dog.account');
	Route::post('/customer/update-profile', 'HomeController@customer_update_profile')->name('customer.profile.update');
	Route::post('/plan_packages/purchase', 'PlansController@plan_package')->name('plan.purchase');
    Route::post('customer_update_social', 'HomeController@customer_update_social')->name('customer.customer_update_social');
});


Route::get('/confirm-request/{id}', 'HomeController@confirm_request')->name('confirm_request');
Route::get('/remove-request/{id}', 'HomeController@remove_request')->name('remove_request');


Route::get('/connections/unfriend/{id}', 'HomeController@unfriend')->name('connections_unfriend');
Route::get('/connections/report/{id}', 'HomeController@connections_report')->name('connections_report');
Route::get('/connections/block/{id}', 'HomeController@connections_block')->name('connections_block');

Route::get('/plan-lists', 'PlansController@plan_lists')->name('plans.plan_lists');


Route::get('/connect_both_happy', 'HomeController@connect_both_happy')->name('connect_both_happy');


Route::get('/send_request/{id}', 'HomeController@send_request')->name('send_request');
Route::get('/send_requests/{id}', 'HomeController@send_requests')->name('send_requests');


Route::post('/submitques', 'HomeController@submitques')->name('submitques');
Route::post('/submitcomm', 'HomeController@submitcomm')->name('submitcomm');
Route::post('/submitlike', 'HomeController@submitlike')->name('submitlike');

Route::post('/hsubmitquesdaily', 'HomeController@hsubmitquesdaily')->name('hsubmitquesdaily');
Route::post('/submit_question_daily', 'HomeController@submit_question_daily')->name('submit_question_daily');

Route::post('/sliderdynamicuser', 'HomeController@sliderdynamicuser')->name('sliderdynamicuser');
Route::post('/sliderdynamicuserc', 'HomeController@sliderdynamicuserc')->name('sliderdynamicuserc');


Route::post('/submitunlike', 'HomeController@submitunlike')->name('submitunlike');
Route::post('/hsubmitques', 'HomeController@hsubmitques')->name('hsubmitques');
Route::post('/hsubmitcomm', 'HomeController@hsubmitcomm')->name('hsubmitcomm');
Route::get('/hsubmitlike/{id}', 'HomeController@hsubmitlike')->name('hsubmitlike');
Route::get('/hsubmitunlike/{id}', 'HomeController@hsubmitunlike')->name('hsubmitunlike');


Route::post('/hsubmitsugg', 'HomeController@hsubmitsugg')->name('hsubmitsugg');
Route::post('/hsubmitconcern', 'HomeController@hsubmitconcern')->name('hsubmitconcern');
Route::post('/rewardblog', 'HomeController@rewardblog');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search?q={search}', 'HomeController@search')->name('suggestion.search');
Route::post('/ajax-search', 'HomeController@ajax_search')->name('search.ajax');


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/brands', 'HomeController@all_brands')->name('brands.all');

Route::get('/all-products/', 'EcomProductController@product_listing')->name('product.listing');
Route::get('/profession-setup', 'ProfessionController@profession_setup')->name('profession.setup');
Route::post('/profession-save', 'ProfessionController@profession_save')->name('profession.save');


Route::get('/socially-reliable', 'HomeController@socially_reliable')->name('socially_reliable');
Route::get('/social-campaign', 'HomeController@social_campaign')->name('social_campaign');
Route::get('/your-solution', 'HomeController@your_solution')->name('your_solution');
Route::get('/redeem', 'HomeController@redeem')->name('redeem');











Route::get('/product/{slug}', 'HomeController@product')->name('product');

Route::post('/order/shipping', 'EcomOrderController@order_shipping')->name('products.order_shipping');
Route::get('/order/confirmed', 'EcomOrderController@order_confirmed')->name('products.order_confirmed');

Route::get('/category/{category_slug}', 'HomeController@listingByCategory')->name('products.category');
Route::get('/products-category/{category_slug}', 'EcomProductController@product_listingByCategory')->name('products.listing_category');
Route::get('/products-details/{slug}', 'EcomProductController@product_details')->name('products.details');
Route::get('/brand/{brand_slug}', 'HomeController@listingByBrand')->name('products.brand');
Route::post('/product/variant_price', 'HomeController@variant_price')->name('products.variant_price');
Route::get('/shop/{slug}', 'HomeController@shop')->name('shop.visit');
Route::get('/shop/{slug}/{type}', 'HomeController@filter_shop')->name('shop.visit.type');





Route::get('/track_your_order', 'HomeController@trackOrder')->name('orders.track');
Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');
Route::resource('addresses','AddressController');
Route::get('/addresses/destroy/{id}', 'AddressController@destroy')->name('addresses.destroy');
Route::get('/addresses/set_default/{id}', 'AddressController@set_default')->name('addresses.set_default');
Route::post('/addresses/update/', 'AddressController@update')->name('addresses.update');

//Custom page
Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');
Route::get('/show-profession/{id}', 'ProfessionController@show_profession')->name('profession.show');




//Route::get('/', 'WebController@index')->name('home');
Route::get('/product_details/{id}', 'WebController@products');
Route::get('/products/{id}', 'WebController@categoryProductList')->name('productas.categoryy');
//Route::get('/product/{id}', 'WebController@productDetails')->name('product_details');







//Static Pages


Route::post('/aiz-uploader', 'AizUploadController@show_uploader');
Route::post('/aiz-uploader/upload', 'AizUploadController@upload');
Route::get('/aiz-uploader/get_uploaded_files', 'AizUploadController@get_uploaded_files');
Route::delete('/aiz-uploader/destroy/{id}', 'AizUploadController@destroy');
Route::post('/aiz-uploader/get_file_by_ids', 'AizUploadController@get_preview_files');
Route::get('/aiz-uploader/download/{id}', 'AizUploadController@attachment_download')->name('download_attachment');


Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/verification-confirmation/{code}', 'Auth\VerificationController@verification_confirmation')->name('email.verification.confirmation');
Route::get('/email_change/callback', 'HomeController@email_change_callback')->name('email_change.callback');



Route::get('/subcription-plan', 'HomeController@subcription_plan')->name('subcription_plan');


Route::post('/store', 'HomeController@store')->name('home.store');
Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');



Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');

Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('login/instagram',
 'Auth\LoginController@redirectToInstagramProvider')->name('instagram.login');

Route::get('login/instagram/callback', 'Auth\LoginController@instagramProviderCallback')->name('instagram.login.callback');

Route::get('/users/login', 'HomeController@login')->name('user.login');

Route::get('/users/registration', 'HomeController@registration')->name('user.registration');

//Route::post('/users/login', 'HomeController@user_login')->name('user.login.submit');

Route::post('/users/login/cart', 'HomeController@cart_login')->name('cart.login.submit');


//Checkout Routes

Route::group(['middleware' => ['checkout']], function(){

	Route::get('/checkout', 'CheckoutController@get_shipping_info')->name('checkout.shipping_info');

	Route::any('/checkout/delivery_info', 'CheckoutController@store_shipping_info')->name('checkout.store_shipping_infostore');

	Route::post('/checkout/payment_select', 'CheckoutController@store_delivery_info')->name('checkout.store_delivery_info');

});



Route::get('/checkout/order-confirmed', 'CheckoutController@order_confirmed')->name('order_confirmed');
Route::post('/checkout/payment', 'CheckoutController@checkout')->name('payment.checkout');
Route::post('/get_pick_ip_points', 'HomeController@get_pick_ip_points')->name('shipping_info.get_pick_ip_points');
Route::get('/checkout/payment_select', 'CheckoutController@get_payment_info')->name('checkout.payment_info');
Route::post('/checkout/apply_coupon_code', 'CheckoutController@apply_coupon_code')->name('checkout.apply_coupon_code');
Route::post('/checkout/remove_coupon_code', 'CheckoutController@remove_coupon_code')->name('checkout.remove_coupon_code');


Route::resource('subscribers','SubscriberController');
Route::post('/subscribe', 'SubscriberController@saveScribrer')->name('subscribe');





