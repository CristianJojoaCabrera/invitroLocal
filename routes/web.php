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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/master/client', 'MasterClientController@index')
    ->name('master_client');

Route::post('/master/client/create', 'MasterClientController@store')
    ->name('create_master_client');

Route::get('/inventory/materials', 'InventoryMaterialController@index')
    ->name('inventory_materials');

Route::get('/inventory/semen', 'InventorySemenController@index')
    ->name('inventory_semen');

Route::get('/inventory/vitrified', 'InventoryVitrifiedController@index')
    ->name('inventory_vitrified');

Route::get('/inventory/frozen', 'InventoryFrozenController@index')
    ->name('inventory_frozen');

Route::get('/production_order', 'ProductionOrderController@client')
    ->name('production_order');

Route::get('/production_order/create/{client}', 'ProductionOrderController@create')
    ->name('create_production_order');

Route::post('/production_order/save', 'ProductionOrderController@store')
    ->name('save_production_order');

Route::post('/production_order/approve', 'ProductionOrderController@approve')
    ->name('approve_production_order');

Route::get('/production_orders', 'ProductionOrdersController@index')
    ->name('production_orders');

Route::get('/production_orders/{poId}', 'ProductionOrdersController@edit')
    ->name('po_edit');

Route::get('/evaluation/', 'EvaluationController@index')
    ->name('evaluation_po');

Route::get('/evaluation/{poId}', 'EvaluationController@find')
    -> where('poId', '[0-9]+')
    ->name('evaluation');

Route::post('/evaluation/{orderDetailId}/save', 'EvaluationController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('evaluation_save');

Route::post('/evaluation/{orderDetailId}/finish', 'EvaluationController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('evaluation_finish');

Route::get('/aspiration/production_orders', 'AspirationController@index')
    ->name('aspiration_po');

Route::get('/aspiration/{orderDetailId}', 'AspirationController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('aspiration');

Route::post('/aspiration/{orderDetailId}/store', 'AspirationController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('aspiration_store');

Route::post('/aspiration/{orderDetailId}/finish', 'AspirationController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('aspiration_finish');

Route::post('/aspiration/{orderDetailId}/save', 'AspirationController@storeform')
    ->where('orderDetailId', '[0-9]+')
    ->name('aspiration_save');

Route::get('/production', 'ProductionController@index')
    ->name('production');

Route::get('/transfer', 'TransferController@index')
    ->name('transfer_po');

Route::get('/transfer/{orderDetailId}', 'TransferController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer');

Route::post('/transfer/{orderDetailId}/save', 'TransferController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer_save');

Route::post('/transfer/{orderDetailId}/finish', 'TransferController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer_finish');

Route::get('/diagnostic', 'DiagnosticController@index')
    ->name('diagnostic');

Route::get('/sexage', 'SexageController@index')
    ->name('sexage');

Route::get('/delivery', 'DeliveryController@index')
    ->name('delivery');

Route::get('/vitrification', 'VitrificationController@index')
    ->name('vitrification');

Route::get('/congelation', 'CongelationController@index')
    ->name('congelation');

Auth::routes();