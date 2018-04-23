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

Route::get('/evaluation', 'EvaluationController@index')
    ->name('evaluation');

Route::get('/aspiration/production_orders', 'AspirationController@index')
    ->name('aspiration_po');

Route::get('/aspiration/{poId}', 'AspirationController@find')
    ->name('aspiration');

Route::get('/production', 'ProductionController@index')
    ->name('production');

Route::get('/transfer', 'TransferController@index')
    ->name('transfer');

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