<?php

namespace App\Http\Controllers;

use App\Order;
use App\Evaluation;
use Illuminate\Http\Request;


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

    public function find($poId)
    {
        $productionOrder = Order::find($poId);

        return view('evaluation')
            ->with('productionOrder', $productionOrder);

    }

    public function store(Request $request)
    {

        $evaluation = new Evaluation();
        $evaluation->order_id = $request->input('txtOrder_id');
        //dd($request->input('txtOrder_id'));
        //$evaluation->comments = $request->input('txtIdOrden');
        $evaluation->save();

        for ($i = 0; $i < Count($request->input('txtLocalName')); $i++) {

          $evaluation_details = new Evaluation_details();
          $evaluation_details->evaluation_id = $evaluation->id;
          $evaluation_details->animal_id = $request->input('txtAnimal_id')[$i];
          $evaluation_details->chapeta = $request->input('txtChapeta')[$i];
          $evaluation_details->diagnostic = $request->input('txtDiagnostic')[$i];
          $evaluation_details->fit = $request->input('txtFit')[$i];
          $evaluation_details->other_procedures = $request->input('txtOther_procedures')[$i];
          $evaluation_details->comments = $request->input('txtComments')[$i];
          $evaluation_details->save();
        }


        return redirect()->route('evaluation', 1);
        //$productionOrder->id
    }
}
