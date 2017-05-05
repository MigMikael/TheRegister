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

Route::get('/', function (){
    return redirect()->action('ParticipantController@welcome');
});

Route::get('welcome', 'ParticipantController@welcome');
Route::post('welcome/check_order_id', 'ParticipantController@checkOrderId');

Route::get('step_1/{order_id}/{couple_token}', 'ParticipantController@step1');
Route::get('step_2/{order_id}/{couple_token}', 'ParticipantController@step2');
Route::get('finish/{order_id}/{couple_token}', 'ParticipantController@finish');

Route::post('store_step_1', 'ParticipantController@storeStep1');
Route::post('store_step_2', 'ParticipantController@storeStep2');

Route::get('participant/{token}/edit', 'ParticipantController@edit');
Route::patch('participant/{id}', 'ParticipantController@update');

Route::get('participant/qrcode/{token}', 'ParticipantController@getQrCode');
Route::get('participant/qrcode/download/{token}', 'ParticipantController@downloadQrCode');
Route::get('participant/pdf/{couple_token}','ParticipantController@getPdf');
Route::get('error/{error_msg}', 'ParticipantController@handleError');

#-----------------------------------------------------------------------------------------------------------------------

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function (){
        return view('admin.home');
    });

    Route::get('register/scan', function (){
        return view('scan');
    });

    Route::get('register/entry', function (){
        return view('entry');
    });

    Route::get('gain/scan', function (){
        return view('scan');
    });

    Route::get('gain/entry', function (){
        return view('entry');
    });

    Route::post('participant/register/qrcode', 'ParticipantController@registerWithQR');
    Route::post('participant/register/order_id', 'ParticipantController@registerWithOrderID');

    Route::post('participant/gain/qrcode', 'ParticipantController@gainWithQR');
    Route::post('participant/gain/order_id', 'ParticipantController@gainWithOrderID');

    Route::get('participant/order/{order_id}', 'ParticipantController@orderList');

    Route::get('participant/gain_order/{order_id}', 'ParticipantController@record');

    Route::get('participant/list', 'AdminController@index');
    Route::get('participant/search', 'AdminController@search');
    Route::post('participant/search', 'AdminController@query');
    Route::get('participant/show/{order_id}', 'AdminController@show');

    Route::get('view/{order_id}', 'ParticipantController@viewOrder');
    Route::get('complete', function (){
        return view('complete');
    });

    //Route::get('complete', 'ParticipantController@complete')

    Route::get('summary', 'ParticipantController@summary');
});
#-----------------------------------------------------------------------------------------------------------------------




