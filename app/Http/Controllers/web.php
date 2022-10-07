<?php



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

//demo

//Route::get('/', 'WebController@index')->name('home');
// Route::get('/product_details/{id}', 'WebController@products');
// Route::get('/products/{id}', 'WebController@categoryProductList')->name('productas.categoryy');
//Route::get('/product/{id}', 'WebController@productDetails')->name('product_details');


Route::get('/index','HomeController@index');

