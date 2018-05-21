<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspirationDetail extends Model
{

    public function productionDetail() {
        return $this->hasOne('App\ProductionDetail');
    }

}
