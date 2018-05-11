<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\DeliveryDetail;
use App\Order;
use App\OrderDetail;
use App\Sexage;
use App\SexageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DB;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    private $title = 'Planilla de Entrega';
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
        $sexage = Sexage::where('state', 1)->get();
        $route = 'delivery';

        return view('delivery_index')
            ->with('sexages', $sexage)
            ->with('route', $route);

        return view('delivery');
    }

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);

        if ( Delivery::where('order_detail_id', $orderDetailId)->first() == null) {
            $delivery = new Delivery();
            $delivery->order_detail_id = $orderDetailId;
            $delivery->state = 0;
            $delivery->user_id_created = Auth::id();
            $delivery->user_id_updated = Auth::id();
            $delivery->save();
        }
        return view('delivery')
            ->with('orderDetail', $orderDetail)
            ->with('title', $this->title);
    }


    public function store($orderDetailId, Request $request) {
        $delivery = Delivery::where('order_detail_id', $orderDetailId)->first();
        $delivery->received_by = $request->input('txtRecibido');
        $delivery->identification_number = $request->input('txtCedula');
        $delivery->comments = $request->input('txtComment');
        $delivery->user_id_updated = Auth::id();
        $delivery->save();

        return redirect()->route('delivery', $orderDetailId);
    }

    public function storeform($orderDetailId, Request $request)
    {
        //dd($request);
        if($request->input('txtDeliveryDetail_id') == null){
            $delivery = Delivery::where('order_detail_id', $orderDetailId)->first();
            $delivery_details = new DeliveryDetail();
            $delivery_details->delivery_id = $delivery->id;
        }
        else {
            $delivery_details = DeliveryDetail::find($request->input('txtDeliveryDetail_id'));
        }
        $delivery_details->sexage_detail_id = $request->input('txtSexageDetail_id');
        $delivery_details->sex = $request->input('cmbSex');
        $delivery_details->dx2 = $request->input('cmbDx2');
        $delivery_details->user_id_created= Auth::id();
        $delivery_details->user_id_updated = Auth::id();
        $delivery_details->save();

        return redirect()->route('delivery', $orderDetailId);
    }

    public function finish($orderDetailId) {
        $delivery = Delivery::where('order_detail_id', $orderDetailId)->first();
        $delivery->state = 1;
        $delivery->save();
        return redirect()->route('delivery', $orderDetailId);
    }
}
