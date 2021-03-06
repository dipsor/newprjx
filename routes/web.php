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
Route::impersonate();

Route::get('/', 'LandingPageController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () {
//    Route::get('/', 'DashboardController@index')->name('dashboard.index');
//    Route::group(['prefix' => 'users', 'namespace' => 'Admin\Users'], function () {
//        Route::get('/', 'UsersController@index')->name('admin.users.index');
//    });
//
    Route::group(['prefix' => 'objednavky', 'namespace' => 'Admin\Orders'], function () {
        Route::get('/', 'OrderController@index')->name('admin.orders.index');
        Route::get('/{id}', 'OrderController@show')->name('admin.orders.show');
    });

});

Route::group(['prefix' => 'uzivatel', 'namespace' => 'Users', 'middleware' => ['role:customer', 'auth']], function () {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('zmena-udaju/{id}', 'UsersController@show')->name('users.show');
    Route::get('/objednavka/{orderId}', 'UsersController@showOrder')->name('users.order.show');
});

Route::group(['prefix' => 'thesis', 'namespace' => 'Thesis', 'middleware' => ['role:customer', 'auth']], function () {
    Route::get('/', 'ThesisController@index')->name('thesis.index');
    Route::get('/return', 'ThesisController@returnIt')->name('thesis.return');
    Route::get('/notify', 'ThesisController@notify')->name('thesis.notify');
});

Route::get('login/facebook', 'Auth\FacebookAuthController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\FacebookAuthController@handleProviderCallback')->name('facebook.login.callback');
Route::get('login/google', 'Auth\GoogleAuthController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\GoogleAuthController@handleProviderCallback')->name('google.login.callback');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@customLogout')->name('users.logout');

Auth::routes();
