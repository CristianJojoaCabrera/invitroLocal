<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class ProductionController extends Controller
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
        $route = 'production';
        return view('production_order_details')
            ->with('productionOrders', $productionOrders)
            ->with('route', $route);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        /*if (Aspiration::where('order_detail_id', $orderDetailId)->first() == null) {
            $aspiration = new Aspiration();
            $aspiration->order_detail_id = $orderDetailId;
            $aspiration->save();
        }*/
        return view('production')
            ->with('orderDetail', $orderDetail);
    }
}
