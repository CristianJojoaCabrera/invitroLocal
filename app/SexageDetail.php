<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SexageDetail extends Model
{
    public function deliveryDetail()
    {
        return $this->hasOne('App\DeliveryDetail', 'sexage_detail_id', 'id');
    }
}
