<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{

    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail', 'order_detail_id');
    }

    public function details()
    {
        return $this->hasMany('App\TransferDetail', 'transfer_id', 'id');
    }

/*
    public function detailsSynchronized()
    {
        return $this->hasMany('App\TransferDetail', 'transfer_id', 'id')
            ->leftJoin('diagnostic_details as td', 'transfer_details.id', '=', 'td.transfer_detail_id')
            ->where ( 'state' ,   1 )
            ->select( "td.*", "transfer_details.id  as transfer_detail_id");
    }
    */
}
