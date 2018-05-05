<?php

namespace App\Http\Controllers;

use App\Order;
use App\Evaluation;
use App\EvaluationDetail;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;


class EvaluationController extends Controller
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
        $route = 'evaluation';
        return view('production_order_details')
            ->with('productionOrders', $productionOrders)
            ->with('route', $route);
    }

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        if (Evaluation::where('order_detail_id', $orderDetailId)->first() == null) {
            $evaluation = new Evaluation();
            $evaluation->order_detail_id = $orderDetailId;
            $evaluation->state = 0;
            $evaluation->save();
        }
        return view('evaluation')
            ->with('orderDetail', $orderDetail);
    }

    public function close($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        $orderDetail->apply_evaluation = 0;
        $orderDetail->save();
        return redirect()->route('evaluation_po');
    }

    public function store($orderDetailId, Request $request)
    {

        if ($request->input('btnEliminar') == "1"){
            $evaluation_details = EvaluationDetail::find($request->input('txtEvaluation_id'));
            $evaluation_details->delete();
        }else{
            $data = request()->validate([
                'txtAnimal_id' => 'required',
                'txtChapeta' => 'required',
                'txtDiagnostic' => 'required',
                'cmbFit' => 'required'
            ], [
                'txtAnimal_id.required' => 'El campo Id. Animal es obligatorio',
                'txtChapeta.required' => 'El campo Chapeta es obligatorio',
                'txtDiagnostic.required' => 'El campo Diagnóstico es obligatorio',
                'cmbFit.required' => 'El campo Apta es obligatorio'
            ]);

            if($request->input('txtEvaluation_id') == null){
                $evaluation = Evaluation::where('order_detail_id', $orderDetailId)->first();
                $evaluation_details = new EvaluationDetail();
                $evaluation_details->evaluation_id = $evaluation->id;
            }
            else{
                $evaluation_details = EvaluationDetail::find($request->input('txtEvaluation_id'));
            }
            $evaluation_details->animal_id = $request->input('txtAnimal_id');
            $evaluation_details->chapeta = $request->input('txtChapeta');
            $evaluation_details->diagnostic = $request->input('txtDiagnostic');
            $evaluation_details->fit = $request->input('cmbFit');
            $evaluation_details->synchronized = $request->input('cmbSynchronized');
            $evaluation_details->synchronized = $request->input('cmbSynchronized');
            $evaluation_details->other_procedures = $request->input('txtOther_procedures');
            $evaluation_details->comments = $request->input('txtComments');
            $evaluation_details->save();
        }

        return redirect()->route('evaluation', $orderDetailId);
    }

    public function finish($orderDetailId) {
        $evaluation = Evaluation::where('order_detail_id', $orderDetailId)->first();
        $evaluation->state = 1;
        $evaluation->save();
        return redirect()->route('evaluation', $orderDetailId);
    }
}
