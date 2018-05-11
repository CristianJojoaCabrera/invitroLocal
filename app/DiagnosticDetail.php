<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosticDetail extends Model
{
    public function sexageDetail()
    {
        return $this->hasOne('App\SexageDetail', 'diagnostic_detail_id', 'id');
    }
}
