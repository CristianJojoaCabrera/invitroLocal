<?php

namespace App\Http\Controllers;

use App\Order;
use App\Evaluation;
use App\EvaluationDetail;
use App\OrderDetail;
use App\Transfer;
use App\TransferDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class TransferController extends Controller
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
    {/*
        $evaluations = Evaluation::where('state', 1)->get();

        foreach ($evaluations as $evaluation) {
            $productionOrders =  optional($evaluation->OrderDetail);
        }
        */

        //dd($evaluations);
        $productionOrders = Order::where('approved', true)->get();
        $route = 'transfer';

        return view('production_order_details')
            //->with('productionOrders', $evaluations->orderDetails)
            ->with('productionOrders', $productionOrders)
            ->with('route', $route);

        return view('transfer');
    }

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);

        if (Transfer::where('order_detail_id', $orderDetailId)->first() == null) {
            $transfer = new Transfer();
            $transfer->order_detail_id = $orderDetailId;
            $transfer->state = 0;
            $transfer->user_id_created= '1';
            $transfer->user_id_updated = '1';
            $transfer->save();
        }

        //dd( $orderDetail->evaluation->detailsSynchronized);

        return view('transfer')
            ->with('orderDetail', $orderDetail);
    }


    public function store($orderDetailId, Request $request) {
        $transfer = Transfer::where('order_detail_id', $orderDetailId)->first();
        $transfer->received_by = $request->input('txtRecibido');
        $transfer->identification_number = $request->input('txtCedula');
        $transfer->comments = $request->input('txtComment');
        $transfer->user_id_updated = '1';
        //$transfer->state = 0;
        $transfer->save();

        return redirect()->route('transfer', $orderDetailId);
    }

    public function storeform($orderDetailId, Request $request)
    {
        if($request->input('txtTransfer_id') == null){
            $transfer = Transfer::where('order_detail_id', $orderDetailId)->first();
            $transfer_details = new TransferDetail();
            $transfer_details->transfer_id = $transfer->id;
        }
        else{
            $transfer_details = TransferDetail::find($request->input('txtTransfer_id'));
        }
        $transfer_details->evaluation_detail_id = $request->input('txtEvaluation_id');
        $transfer_details->embryo = $request->input('txtEmbrion');
        $transfer_details->embryo_class = $request->input('txtClaseEmbrion');
        $transfer_details->corpus_luteum = $request->input('txtCuerpoLuteo');
        $transfer_details->donor = $request->input('txtDonadoraRGD');
        $transfer_details->donor_breed = $request->input('txtRazaDonadora');
        $transfer_details->bull = $request->input('txtToroRGD');
        $transfer_details->bull_breed = $request->input('txtRazaToro');
        $transfer_details->comments = $request->input('txtComments');
        $transfer_details->user_id_created= '1';
        $transfer_details->user_id_updated = '1';
        $transfer_details->save();

        return redirect()->route('transfer', $orderDetailId);
    }


    public function finish($orderDetailId) {
        $transfer = Transfer::where('order_detail_id', $orderDetailId)->first();
        $transfer->state = 1;
        $transfer->save();
        return redirect()->route('transfer', $orderDetailId);
    }
}
