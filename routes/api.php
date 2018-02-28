<?php

use Illuminate\Http\Request;

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
Route::group(['namespace' => 'Api', 'prefix' => '/v1'], function () {
    Route::group(['prefix' => '/users'], function() {
        Route::get('/', 'UsersController@index')->name('users.api.index');
        Route::post('/', 'UsersController@store')->name('users.api.store');
        Route::delete('/{id}', 'UsersController@destroy')->name('users.api.destroy');
        Route::get('/{id}', 'UsersController@show')->name('users.api.show');
        Route::put('/{id}', 'UsersController@update')->name('users.api.update');
        Route::put('/profile-update/{id}', 'UsersController@updateGeneralInfo')->name('users.api.update.general.info');
        Route::put('/user-password-update/{id}', 'UsersController@updatePassword')->name('users.api.update.password');
        Route::put('/user-billing-update/{id}', 'UsersController@updateBillingDetails')->name('users.api.update.billing');
    });

    Route::group(['prefix' => '/roles'], function() {
        Route::get('/', 'RolesController@index')->name('roles.api.index');
    });

    Route::group(['prefix' => '/teams'], function() {
        Route::get('/', 'TeamsController@index')->name('teams.api.index');
    });

    Route::group(['prefix' => '/thesis'], function() {
        Route::post('/', 'ThesisController@store')->name('thesis.api.store');
        Route::get('/{id}', 'ThesisController@show')->name('thesis.api.show');
        Route::put('/{id}', 'ThesisController@update')->name('thesis.api.update');

        Route::post('/upload', 'UploadController@upload')->name('thesis.api.upload');
    });

    Route::group(['prefix' => '/order'], function() {
        Route::get('/', 'OrdersController@index')->name('orders.api.index');
        Route::post('/', 'OrdersController@store')->name('orders.api.store');
        Route::get('/{id}', 'OrdersController@show')->name('orders.api.show');

    });

    Route::group(['prefix' => '/gopay'], function() {
        Route::post('/', 'GopayController@payment')->name('gopay.api.create.payment');
        Route::get('/', 'GopayController@getStatus')->name('gopay.api.status');
    });
});