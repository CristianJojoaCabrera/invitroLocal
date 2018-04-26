<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    public function details() {
        return $this->hasMany('App\AspirationDetail', 'aspiration_id', 'id');
    }
}
