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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/canvas', 'HomeController@canvas')->name('canvas');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('users', 'Admin\UserController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('subscribers', 'Admin\SubscribersController');
    Route::get('ordersDetails/{id}', 'Admin\OrderController@ordersDetails');
    Route::get('download_image/{name}/{id}', 'Admin\OrderController@download_image');

});
Route::post('ccavenueResponse', 'Admin\PaymentController@ccavenueResponse');
Route::post('cancelResponse', 'Admin\PaymentController@cancelResponse');

Route::get('/cache_clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    // \Artisan::call('config:cache');
    dd(env('WORKING_KEY'), env('ACCESS_CODE'), env('MERCHANT_ID'));
    echo 'clear';
});

Route::get('/logout', function () {
    \Auth::logout();
    return redirect()->to('/login');
});

Route::view('/drag', 'drag');
Route::get('{any}', function () {
    return view('main');
})->where('any', '.*');
