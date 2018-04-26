<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function details()
    {
        return $this->hasMany('App\EvaluationDetail', 'evaluation_id', 'id');
    }
}
