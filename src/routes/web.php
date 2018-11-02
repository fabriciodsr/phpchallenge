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
Auth::routes();
Route::get('/Manage', 'HomeController@index')->name('Manage');


Route::get('/',    ['uses' => 'UploadController@index']);
Route::post('/',    ['uses' => 'UploadController@upload']);

Route::group(['prefix' => 'api',  'middleware' => 'auth'], function()
{
    Route::get('/', function () {
        return response()->json(['message' => 'API', 'status' => 'Connected']);;
    });

    Route::get('person',                        ['uses' => 'PersonController@GetAll']);
    Route::get('person/{personid}',             ['uses' => 'PersonController@GetById']);

    Route::get('phones',                        ['uses' => 'PhoneController@GetAll']);
    Route::get('phones/{phoneId}',              ['uses' => 'PhoneController@GetById']);
    Route::get('phones/person/{personId}',      ['uses' => 'PhoneController@GetAllByPerson']);

    Route::get('shiporder',                     ['uses' => 'ShipOrderController@GetAll']);
    Route::get('shiporder/{orderId}',           ['uses' => 'ShipOrderController@GetById']);
    Route::get('shiporder/person/{personId}',   ['uses' => 'ShipOrderController@GetAllByPerson']);

    Route::get('shipto',                        ['uses' => 'ShipToController@GetAll']);
    Route::get('shipto/{shiptoId}',             ['uses' => 'ShipToController@GetById']);
    Route::get('shipto/orders/{orderId}',       ['uses' => 'ShipToController@GetAllByShipOrder']);

    Route::get('shipitems',                     ['uses' => 'ShipItemController@GetAll']);
    Route::get('shipitems/{shipitemId}',        ['uses' => 'ShipItemController@GetById']);
    Route::get('shipitems/orders/{orderId}',    ['uses' => 'ShipItemController@GetAllByShipOrder']);
});
