<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceHasSubservice extends Model
{
    public function locals() {
        return $this->hasMany('App\Local', 'client_id', 'id');
    }
}
