<?php

namespace App\Http\Controllers;

use App\OrderDetail;
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

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        return view('aspiration')
            ->with('orderDetail', $orderDetail);
    }

    public function storeform($orderDetailId, Request $request)
    {
        dd($request);
        $request->input('txtDonadora');
        $request->input('txtRazaD');
        $request->input('txtToro');
        $request->input('txtRazaT');
        $request->input('txtTipo');
        $request->input('txtGI');
        $request->input('txtGII');
        $request->input('txtGIII');
        $request->input('txtOtros');
        $request->input('txtToro2');
        $request->input('txtRaza2');
    }
}
