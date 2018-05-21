<?php

namespace App\Http\Controllers;

use App\Aspiration;
use App\AspirationDetail;
use App\Order;
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
        if (Aspiration::where('order_detail_id', $orderDetailId)->first() == null) {
            $aspiration = new Aspiration();
            $aspiration->order_detail_id = $orderDetailId;
            $aspiration->save();
        }
        return view('aspiration')
            ->with('orderDetail', $orderDetail);
    }

    public function finish($orderDetailId) {
        $aspiration = Aspiration::where('order_detail_id', $orderDetailId)->first();
        $aspiration->state = true;
        $aspiration->save();
        return redirect()->route('aspiration', $orderDetailId);
    }

    public function store($orderDetailId, Request $request) {
        $aspiration = Aspiration::where('order_detail_id', $orderDetailId)->first();
        $aspiration->synchronized_receivers = $request->input('txtSynchronizedReceivers');
        $aspiration->medium_lot_miv = $request->input('txtMediumLotMIV');
        $aspiration->medium_opu = $request->input('txtMediumOpu');
        $aspiration->medium_lot_opu = $request->input('txtMediumLotOpu');
        $aspiration->aspirator = $request->input('txtAspirator');
        $aspiration->searcher = $request->input('txtSearcher');
        $aspiration->arrived_time = $request->input('txtArrivedTime');
        $aspiration->arrived_temperature = $request->input('txtArrivedTemperature');
        $aspiration->receiver_name = $request->input('txtReceiverName');
        $aspiration->transport_type = $request->input('txtTransportType');
        $aspiration->save();
        return redirect()->route('aspiration', $orderDetailId);
    }


    public function storeform($orderDetailId, Request $request)
    {
        if ($request->input('btnEliminar') == "1"){
            $aspirationDetail = AspirationDetail::find($request->input('txtAspirationId'));
            $aspirationDetail->delete();
        }else{
            if($request->input('txtAspirationId') == null) {
                $aspiration = Aspiration::where('order_detail_id', $orderDetailId)->first();
                $aspirationDetail = new AspirationDetail();
                $aspirationDetail->aspiration_id = $aspiration->id;
            } else {
                $aspirationDetail = AspirationDetail::find($request->input('txtAspirationId'));
            }
            $aspirationDetail->donor = $request->input('txtDonadora');
            $aspirationDetail->donor_breed = $request->input('txtRazaD');
            $aspirationDetail->bull = $request->input('txtToro');
            $aspirationDetail->bull_breed = $request->input('txtRazaT');
            $aspirationDetail->type = $request->input('txtTipo');
            $aspirationDetail->gi = $request->input('txtGI');
            $aspirationDetail->gii = $request->input('txtGII');
            $aspirationDetail->giii = $request->input('txtGIII');
            $aspirationDetail->others = $request->input('txtOtros');
            $aspirationDetail->save();

        }
        return redirect()->route('aspiration', $orderDetailId);
    }
}
