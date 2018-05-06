<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail','order_detail_id');
    }

    public function details()
    {
        return $this->hasMany('App\EvaluationDetail', 'evaluation_id', 'id');
    }

    public function detailsSynchronized()
    {
        return $this->hasMany('App\EvaluationDetail', 'evaluation_id', 'id')
            ->leftJoin('transfer_details as td', 'evaluation_details.id', '=', 'td.evaluation_detail_id')
            ->where ( 'synchronized' ,   1 )
            ->select( "td.*", "evaluation_details.id  as evaluation_detail_id", "chapeta");
    }

}
