<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexage extends Model
{
    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail', 'order_detail_id');
    }

    public function details()
    {
        return $this->hasMany('App\SexageDetail', 'sexage_id', 'id');
    }
}
