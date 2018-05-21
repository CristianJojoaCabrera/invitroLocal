<?php

namespace App\Http\Controllers;

use App\Client;
use App\DocumentType;
use App\Local;
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
        $productionOrder->observation = $request->input('txtObservation');
        $productionOrder->save();

        foreach ($request->input('chkLocal') as $key => $local) {
            if ($key < 0) {
                $newLocal = new Local();
                $newLocal->name = $request->input('txtLocalName')[$key];
                $newLocal->city = $request->input('txtLocalCity')[$key];
                $newLocal->department = $request->input('txtLocalDepartment')[$key];
                $newLocal->phone = $request->input('txtLocalPhone')[$key];
                $newLocal->email = $request->input('txtLocalEmail')[$key];
                $newLocal->contact = $request->input('txtLocalContact')[$key];
                $newLocal->client_id = $request->input('txtClientId');
                $newLocal->save();
                $poDetail = new OrderDetail();
                $poDetail->order_id = $productionOrder->id;
                $poDetail->local_id = $newLocal->id;
                $poDetail->save();
            } else {
                $poDetail = new OrderDetail();
                $poDetail->order_id = $productionOrder->id;
                $poDetail->local_id = $key;
                $poDetail->save();
            }

        }

        foreach ($request->input('chkSubservice') as $key => $service) {
            foreach ($service as $key2 => $subservice) {
                $poSubservice = new OrderSubservice();
                $poSubservice->order_id = $productionOrder->id;
                $poSubservice->service_id = $key;
                $poSubservice->subservice_id = $key2;
                $poSubservice->value = $request->input('txtService')[$key][$key2];
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
