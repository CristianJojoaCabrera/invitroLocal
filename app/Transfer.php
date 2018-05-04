<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function details()
    {
        return $this->hasMany('App\TransferDetail', 'transfer_id', 'id');
    }
}
