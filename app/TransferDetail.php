<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{

    public function transfer()
    {
        return $this->belongsTo('App\transfer', 'transfer_id');
    }

    public function evaluationDetail()
    {
        return $this->hasOne('App\EvaluationDetail', 'id', 'evaluation_detail_id');
    }

    public function diagnosticDetail()
    {
        return $this->hasOne('App\DiagnosticDetail', 'transfer_detail_id', 'id');
    }

}
