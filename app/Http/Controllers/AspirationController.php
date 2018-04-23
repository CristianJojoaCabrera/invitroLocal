<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductionOrder;
use Illuminate\Http\Request;

class AspirationController extends Controller
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
        $productionOrders = Order::where('approved', true)->get();
        $route = 'aspiration';
        return view('production_order_details')
            ->with('productionOrders', $productionOrders)
            ->with('route', $route);
    }

    public function find($poId)
    {
        $productionOrder = Order::find($poId);

        return view('aspiration')
            ->with('productionOrder', $productionOrder);
    }
}
