<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function local() {
        return $this->hasOne('App\Local', 'id', 'local_id');
    }
}
