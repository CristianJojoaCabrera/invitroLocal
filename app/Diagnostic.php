<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail', 'order_detail_id');
    }

    public function details()
    {
        return $this->hasMany('App\DiagnosticDetail', 'diagnostic_id', 'id');
    }
}
