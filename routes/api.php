<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('storeCartData', 'Api\CartController@storeCartData');
    Route::get('getCartData', 'Api\CartController@getCartData');
    Route::post('updateCart/{id}', 'Api\CartController@updateCart');
    Route::post('addCart', 'Api\CartController@addCart');
    Route::get('getUserDetail', 'Api\Users\RegisterController@getUserDetail');
    Route::post('updateQuantity/{id}', 'Api\CartController@updateQuantity');
    Route::post('updateGiftOption/{id}', 'Api\CartController@updateGiftOption');
    Route::post('removeCartItem/{id}', 'Api\CartController@removeCartItem');
    Route::get('getShippingAddress', 'Api\ShippingAddressController@getShippingAddress');
    Route::post('storeShippingAddress', 'Api\ShippingAddressController@storeShippingAddress');
    Route::post('updateShippingAddress/{id}', 'Api\ShippingAddressController@updateShippingAddress');
    Route::post('deleteShippingAddress/{id}', 'Api\ShippingAddressController@deleteShippingAddress');
    Route::post('userCheckout', 'Api\OrdersController@placeOrder');
    Route::post('updateUser', 'Api\Users\UsersController@updateUser');
    Route::get('getOrder', 'Api\OrdersController@getOrder');
    Route::get('getOrderDetails/{id}', 'Api\OrdersController@getOrderDetails');
    Route::post('sendIssue', 'Api\IssueController@sendIssue');
    Route::get('getIssues/{id}', 'Api\IssueController@getIssues');
});

Route::post('imageUpload', 'Api\ImageUploadController@imageUpload');
Route::post('merchantData', 'Api\ImageUploadController@merchantData');

Route::post('cancelResponse', 'Api\ImageUploadController@cancelResponse');
Route::post('registerCustomer', 'Api\Users\RegisterController@registerCustomer');
Route::post('signIn', 'Api\Users\LoginController@signIn');
Route::post('placeOrder', 'Api\OrdersController@placeOrder');
Route::post('checkPromocode', 'Api\OrdersController@checkPromocode');
Route::post('subscribe', 'Api\Users\UsersController@subscribe');
