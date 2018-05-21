<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function Subservices() {
        return $this->belongsToMany('App\Subservice', 'service_subservices');
    }
}
