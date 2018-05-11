<?php

namespace App\Http\Controllers;

use App\Order;
use App\Diagnostic;
use App\DiagnosticDetail;
use App\OrderDetail;
use App\Sexage;
use App\SexageDetail;
use App\Transfer;
use App\TransferDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use DB;
use Illuminate\Support\Facades\Auth;

class SexageController extends Controller
{
    private $title = 'Planilla de Sexaje';
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
        $diagnostic = Diagnostic::where('state', 1)->get();
        $route = 'sexage';

        return view('sexage_index')
            ->with('diagnostics', $diagnostic)
            ->with('route', $route);

        return view('sexage');
    }

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);

        if ( Sexage::where('order_detail_id', $orderDetailId)->first() == null) {
            $sexage = new Sexage();
            $sexage->order_detail_id = $orderDetailId;
            $sexage->state = 0;
            $sexage->user_id_created = Auth::id();
            $sexage->user_id_updated = Auth::id();
            $sexage->save();
        }
        return view('sexage')
            ->with('orderDetail', $orderDetail)
            ->with('title', $this->title);
    }


    public function store($orderDetailId, Request $request) {
        $Sexage = Sexage::where('order_detail_id', $orderDetailId)->first();
        $Sexage->received_by = $request->input('txtRecibido');
        $Sexage->identification_number = $request->input('txtCedula');
        $Sexage->comments = $request->input('txtComment');
        $Sexage->user_id_updated = Auth::id();
        $Sexage->save();

        return redirect()->route('sexage', $orderDetailId);
    }

    public function storeform($orderDetailId, Request $request)
    {
        //dd($request);
        if($request->input('txtSexageDetail_id') == null){
            $sexage = Sexage::where('order_detail_id', $orderDetailId)->first();
            $sexage_details = new SexageDetail();
            $sexage_details->sexage_id = $sexage->id;
        }
        else {
            $sexage_details = SexageDetail::find($request->input('txtSexageDetail_id'));
        }
        $sexage_details->diagnostic_detail_id = $request->input('txtDiagnosticDetail_id');
        $sexage_details->sex = $request->input('cmbSex');
        $sexage_details->user_id_created= Auth::id();
        $sexage_details->user_id_updated = Auth::id();
        $sexage_details->save();

        return redirect()->route('sexage', $orderDetailId);
    }


    public function finish($orderDetailId) {
        $sexage = Sexage::where('order_detail_id', $orderDetailId)->first();
        $sexage->state = 1;
        $sexage->save();
        return redirect()->route('sexage', $orderDetailId);
    }
}
