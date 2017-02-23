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

Route::get('step_1/{order_id}', 'ParticipantController@step1');
Route::get('step_2/{order_id}', 'ParticipantController@step2');
Route::get('step_3/{order_id}', 'ParticipantController@step3');
Route::post('store_step_1', 'ParticipantController@storeStep1');
Route::post('store_step_2', 'ParticipantController@storeStep2');

Route::get('participant/{id}/edit', 'ParticipantController@edit');
Route::patch('participant/{id}', 'ParticipantController@update');

Route::post('participant/register', 'ParticipantController@registerWithQR');

Route::post('participant/gain', 'ParticipantController@gainItem');
Route::get('participant/order/{order_id}', 'ParticipantController@orderList');

Route::get('participant/qrcode/{id}', 'ParticipantController@getQrCode');
Route::get('scan', function (){
    return view('scan');
});

Route::get('error/{error_msg}', 'ParticipantController@handleError');

Route::get('admin', 'AdminController@index');
Route::get('admin/show/{order_id}', 'AdminController@show');

Route::get('pdf', function (){
    $fpdf = new Anouar\Fpdf\Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial', 'B', 16);
    $fpdf->Cell(40, 10, 'Hello World');
    $fpdf->Output();
    exit;
});


