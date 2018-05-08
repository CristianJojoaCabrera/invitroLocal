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

Route::get('/evaluation/{poId}/notApply', 'EvaluationController@notApply')
    -> where('poId', '[0-9]+')
    ->name('evaluation_notApply');

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

Route::get('/production/production_orders', 'OrderDetailController@index')
    ->name('production_po');

Route::get('/production/{orderDetailId}', 'ProductionController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('production');

Route::post('/production/{orderDetailId}/store', 'ProductionController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('production_store');

Route::post('/production/{orderDetailId}/save', 'ProductionController@storeForm')
    ->where('orderDetailId', '[0-9]+')
    ->name('production_save');

Route::post('/production/{orderDetailId}/finish', 'ProductionController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('production_finish');

Route::get('/transfer', 'TransferController@index')
    ->name('transfer_po');

Route::get('/transfer/{orderDetailId}', 'TransferController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer');

Route::post('/transfer/{orderDetailId}/store', 'TransferController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer_store');

Route::post('/transfer/{orderDetailId}/save', 'TransferController@storeform')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer_save');

Route::post('/transfer/{orderDetailId}/finish', 'TransferController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('transfer_finish');

Route::get('/diagnostic', 'DiagnosticController@index')
    ->name('diagnostic_po');

Route::get('/diagnostic/{orderDetailId}', 'DiagnosticController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('diagnostic');

Route::post('/diagnostic/{orderDetailId}/store', 'DiagnosticController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('diagnostic_store');

Route::post('/diagnostic/{orderDetailId}/save', 'DiagnosticController@storeform')
    ->where('orderDetailId', '[0-9]+')
    ->name('diagnostic_save');

Route::post('/diagnostic/{orderDetailId}/finish', 'DiagnosticController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('diagnostic_finish');

Route::get('/sexage', 'SexageController@index')
    ->name('sexage_po');

Route::get('/sexage/{orderDetailId}', 'SexageController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('sexage');

Route::post('/sexage/{orderDetailId}/store', 'SexageController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('sexage_store');

Route::post('/sexage/{orderDetailId}/save', 'SexageController@storeform')
    ->where('orderDetailId', '[0-9]+')
    ->name('sexage_save');

Route::post('/sexage/{orderDetailId}/finish', 'SexageController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('sexage_finish');

Route::get('/delivery', 'DeliveryController@index')
    ->name('delivery_po');

Route::get('/delivery/{orderDetailId}', 'DeliveryController@find')
    ->where('orderDetailId', '[0-9]+')
    ->name('delivery');

Route::post('/delivery/{orderDetailId}/store', 'DeliveryController@store')
    ->where('orderDetailId', '[0-9]+')
    ->name('delivery_store');

Route::post('/delivery/{orderDetailId}/save', 'DeliveryController@storeform')
    ->where('orderDetailId', '[0-9]+')
    ->name('delivery_save');

Route::post('/delivery/{orderDetailId}/finish', 'DeliveryController@finish')
    ->where('orderDetailId', '[0-9]+')
    ->name('delivery_finish');

Route::get('/vitrification', 'VitrificationController@index')
    ->name('vitrification');

Route::get('/congelation', 'CongelationController@index')
    ->name('congelation');

Auth::routes();