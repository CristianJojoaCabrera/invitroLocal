<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function client() {
        return $this->hasOne('App\Client', 'id', 'client_id');
    }

    public function details() {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }

    public function subservices() {
        return $this->hasMany('App\OrderSubservice', 'order_id', 'id');
    }
}
