<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function local() {
        return $this->hasOne('App\Local', 'id', 'local_id');
    }

    public function aspiration() {
        return $this->belongsTo('App\Aspiration', 'order_detail_id');
    }

}
