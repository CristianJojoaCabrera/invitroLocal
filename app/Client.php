<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function documentType() {
        return $this->hasOne('App\DocumentType', 'id', 'identification_type_id');
    }

    public function locals() {
        return $this->hasMany('App\Local', 'client_id', 'id');
    }

    public function services() {
        return $this->hasMany('App\ClientService');
    }
}
