<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferDetail extends Model
{
    public function diagnosticDetail()
    {
        return $this->hasOne('App\DiagnosticDetail', 'transfer_detail_id', 'id');
    }

    public function evaluationDetail()
    {
        return $this->hasOne('App\EvaluationDetail', 'id', 'evaluation_detail_id');
    }
}
