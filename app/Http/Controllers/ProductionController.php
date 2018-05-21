<?php

namespace App\Http\Controllers;

use App\Aspiration;
use App\AspirationDetail;
use App\Order;
use App\OrderDetail;
use App\Production;
use App\ProductionDetail;
use Illuminate\Http\Request;

class ProductionController extends Controller
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

    public function find($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        if (Production::where('order_detail_id', $orderDetailId)->first() == null) {
            $production = new Production();
            $production->order_detail_id = $orderDetailId;
            $production->save();
        }
        return view('production')
            ->with('orderDetail', $orderDetail);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function storeForm($orderDetailId, Request $request)
    {
        $productionDetails = ProductionDetail::where('aspiration_detail_id', $request->input('txtAspirationDetailId'))->get();
        if($productionDetails->count() == 0) {
            $production = Production::where('order_detail_id', $orderDetailId)->first();
            $productionDetail = new ProductionDetail();
            $productionDetail->production_id = $production->id;
        } else {
            $productionDetail = ProductionDetail::where('aspiration_detail_id', $request->input('txtAspirationDetailId'))->first();
        }
        $productionDetail->aspiration_detail_id = $request->input('txtAspirationDetailId');
        $productionDetail->bull = $request->input('txtToro');
        $productionDetail->bull_breed = $request->input('txtRaza');
        $productionDetail->civ = $request->input('txtCIV');
        $productionDetail->medium_cultivation = $request->input('txtMedioCultivo');
        $productionDetail->lot_medium = $request->input('txtLoteMedio');
        $productionDetail->cleavage = $request->input('txtCliv');
        $productionDetail->feeding1 = $request->input('txt1F');
        $productionDetail->feeding2 = $request->input('txt2F');
        $productionDetail->c5 = $request->input('txtC5');
        $productionDetail->prevision = $request->input('txtPrev');
        $productionDetail->bi = $request->input('txtBi');
        $productionDetail->bl = $request->input('txtBl');
        $productionDetail->bx = $request->input('txtBx');
        $productionDetail->bn = $request->input('txtBn');
        $productionDetail->be = $request->input('txtBe');
        $productionDetail->vitrified = $request->input('txtVitri');
        $productionDetail->frozen = $request->input('txtCong');
        $productionDetail->lost = $request->input('txtPerda');
        $productionDetail->transferred_embryos = $request->input('txtTE');
        $productionDetail->discarded = $request->input('txtDesc');
        $productionDetail->save();

        return redirect()->route('production', $orderDetailId);
    }
}
