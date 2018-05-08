<?php

namespace App\Http\Controllers;

use App\Order;
use App\Evaluation;
use App\EvaluationDetail;
use App\OrderDetail;
use App\Diagnostic;
use App\DiagnosticDetail;
use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DB;
use Illuminate\Support\Facades\Auth;

class DiagnosticController extends Controller
{

    private $title = 'Planilla de Diagnóstico';
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
        $transfers = Transfer::where('state', 1)->get();
        $route = 'diagnostic';

        return view('diagnostic_index')
            ->with('transfers', $transfers)
            ->with('route', $route);

        return view('diagnostic');
    }

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        $transfer = Transfer::find($orderDetailId);

        if (Diagnostic::where('order_detail_id', $orderDetailId)->first() == null) {
            $diagnostic = new Diagnostic();
            $diagnostic->order_detail_id = $orderDetailId;
            $diagnostic->state = 0;
            $diagnostic->user_id_created = Auth::id();
            $diagnostic->user_id_updated = Auth::id();
            $diagnostic->save();
        }
        return view('diagnostic')
            ->with('transfer', $transfer)
            ->with('orderDetail', $orderDetail);
    }


    public function store($orderDetailId, Request $request) {
        $diagnostic = Diagnostic::where('order_detail_id', $orderDetailId)->first();
        $diagnostic->received_by = $request->input('txtRecibido');
        $diagnostic->identification_number = $request->input('txtCedula');
        $diagnostic->comments = $request->input('txtComment');
        $diagnostic->user_id_updated = Auth::id();
        //$diagnostic->state = 0;
        $diagnostic->save();

        return redirect()->route('diagnostic', $orderDetailId);
    }

    public function storeform($orderDetailId, Request $request)
    {
        //dd($request);
        if($request->input('txtDiagnosticDetail_id') == null){
            $diagnostic = Diagnostic::where('order_detail_id', $orderDetailId)->first();
            $diagnostic_details = new DiagnosticDetail();
            $diagnostic_details->diagnostic_id = $diagnostic->id;
        }
        else{
            $diagnostic_details = DiagnosticDetail::find($request->input('txtDiagnosticDetail_id'));
        }
        $diagnostic_details->transfer_detail_id = $request->input('txtTransferDetail_id');
        $diagnostic_details->dx1 = $request->input('cmbDx1');
        $diagnostic_details->user_id_created= Auth::id();
        $diagnostic_details->user_id_updated = Auth::id();
        $diagnostic_details->save();

        return redirect()->route('diagnostic', $orderDetailId);
    }


    public function finish($orderDetailId) {
        $diagnostic = Diagnostic::where('order_detail_id', $orderDetailId)->first();
        $diagnostic->state = 1;
        $diagnostic->save();
        return redirect()->route('diagnostic', $orderDetailId);
    }
}
