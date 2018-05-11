<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail', 'order_detail_id');
    }

    public function details()
    {
        return $this->hasMany('App\DeliveryDetail', 'delivery_id', 'id');
    }
}
