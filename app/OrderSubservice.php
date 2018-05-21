<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSubservice extends Model
{

    public function service() {
        return $this->hasOne('App\Service', 'id', 'service_id');
    }

    public function subservice() {
        return $this->hasOne('App\Subservice', 'id', 'subservice_id');
    }


}
