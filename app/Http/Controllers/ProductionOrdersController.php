<?php

namespace App\Http\Controllers;

use App\DocumentType;
use App\Order;
use App\Service;

class ProductionOrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionOrders = Order::get();
        return view('production_orders')
            ->with('route', 'po_edit')
            ->with('productionOrders', $productionOrders);
    }

    public function edit($poId)
    {
        $documentTypes = DocumentType::all();
        $services = Service::all();
        $order = Order::find($poId);
        //$client = $order->client;
        return view('edit_po')
          //  ->with('client', $client)
            ->with('documentTypes', $documentTypes)
            ->with('services', $services)
            ->with('order', $order);
    }

}
