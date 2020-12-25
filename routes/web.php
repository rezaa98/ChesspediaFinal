<?php
/**
 * Web Routes
 *
 * Here is where you can register web routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * contains the "web" middleware group. Now create something great!
 *
 * @category WebRoutes
 * @package  WebRoutes
 * @author   Sugiarto <sugiarto.dlingo@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

Route::get('/', 'HomeController@index');
Route::get('/products', 'ProductController@index');
Route::get('/product/{slug}', 'ProductController@show');
Route::get('/products/quick-view/{slug}', 'ProductController@quickView');

Route::get('/carts', 'CartController@index');
Route::get('/carts/remove/{cartID}', 'CartController@destroy');
Route::post('/carts', 'CartController@store');
Route::post('/carts/update', 'CartController@update');

Route::get('orders/checkout', 'OrderController@checkout');
Route::post('orders/checkout', 'OrderController@doCheckout');
Route::post('orders/shipping-cost', 'OrderController@shippingCost');
Route::post('orders/set-shipping', 'OrderController@setShipping');
Route::get('orders/received/{orderID}', 'OrderController@received');
Route::get('orders/cities', 'OrderController@cities');
Route::get('orders', 'OrderController@index');
Route::get('orders/{orderID}', 'OrderController@show');

Route::post('payments/notification', 'PaymentController@notification');
Route::get('payments/completed', 'PaymentController@completed');
Route::get('payments/failed', 'PaymentController@failed');
Route::get('payments/unfinish', 'PaymentController@unfinish');

Route::resource('favorites', 'FavoriteController');

Route::get('profile', 'Auth\ProfileController@index');
Route::post('profile', 'Auth\ProfileController@update');

Route::group(
	['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
	function () {
		Route::get('dashboard', 'DashboardController@index');
		Route::resource('categories', 'CategoryController');

		
		Route::resource('products', 'ProductController');
		Route::get('products/{productID}/images', 'ProductController@images')->name('products.images');
		Route::get('products/{productID}/add-image', 'ProductController@addImage')->name('products.add_image');
		Route::post('products/images/{productID}', 'ProductController@uploadImage')->name('products.upload_image');
		Route::delete('products/images/{imageID}', 'ProductController@removeImage')->name('products.remove_image');

		Route::resource('attributes', 'AttributeController');
		Route::get('attributes/{attributeID}/options', 'AttributeController@options')->name('attributes.options');
		Route::get('attributes/{attributeID}/add-option', 'AttributeController@add_option')->name('attributes.add_option');
		Route::post('attributes/options/{attributeID}', 'AttributeController@store_option')->name('attributes.store_option');
		Route::delete('attributes/options/{optionID}', 'AttributeController@remove_option')->name('attributes.remove_option');
		Route::get('attributes/options/{optionID}/edit', 'AttributeController@edit_option')->name('attributes.edit_option');
		Route::put('attributes/options/{optionID}', 'AttributeController@update_option')->name('attributes.update_option');
	
		Route::resource('roles', 'RoleController');
		Route::resource('users', 'UserController');

		Route::get('orders/trashed', 'OrderController@trashed');
		Route::get('orders/restore/{orderID}', 'OrderController@restore');
		Route::resource('orders', 'OrderController');
		Route::get('orders/{orderID}/cancel', 'OrderController@cancel');
		Route::put('orders/cancel/{orderID}', 'OrderController@doCancel');
		Route::post('orders/complete/{orderID}', 'OrderController@doComplete');

		Route::resource('shipments', 'ShipmentController');

		Route::resource('slides', 'SlideController');
		Route::get('slides/{slideID}/up', 'SlideController@moveUp');
		Route::get('slides/{slideID}/down', 'SlideController@moveDown');

		Route::get('reports/revenue', 'ReportController@revenue');
		Route::get('reports/product', 'ReportController@product');
		Route::get('reports/inventory', 'ReportController@inventory');
		Route::get('reports/payment', 'ReportController@payment');
	}
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
