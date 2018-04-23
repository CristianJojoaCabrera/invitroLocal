<?php

namespace App\Http\Controllers;

use App\Client;
use App\DocumentType;
use App\Order;
use App\OrderDetail;
use App\OrderSubservice;
use App\Service;
use Illuminate\Http\Request;

class ProductionOrderController extends Controller
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
    public function client()
    {
        $clients = Client::all();
        return view('client_order')
            ->with('clients', $clients);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($clientId)
    {
        $client = Client::find($clientId);
        return view('production_order')
            ->with('client', $client);
    }

    public function store(Request $request)
    {

        $productionOrder = new Order();
        $productionOrder->project = $request->input('txtProjectName');
        $productionOrder->client_id = $request->input('txtClientId');
        $productionOrder->save();

        for ($i = 0; $i < Count($request->input('txtLocalName')); $i++) {
            $poDetail = new OrderDetail();
            $poDetail->order_id = $productionOrder->id;
            $poDetail->local_id = $request->input('txtServiceId')[$i];
            $poDetail->save();
        }

        for ($i = 0; $i < Count($request->input('txtService')); $i++) {
            if ($request->input('txtService')[$i] != null) {
                $poSubservice = new OrderSubservice();
                $poSubservice->order_id = $productionOrder->id;
                $poSubservice->service_id = $request->input('txtServiceId')[$i];
                $poSubservice->subservice_id = $request->input('txtSubServiceId')[$i];
                $poSubservice->value = $request->input('txtService')[$i];
                $poSubservice->save();
            }
        }

        return redirect()->route('production_orders')
            ->with('route', 'edit_po');
    }

    public function approve(Request $request)
    {
        $order = Order::find($request->input('txtOrderId'));
        $order->approved = true;
        $order->save();
        return redirect()->route('production_orders');
    }

}
