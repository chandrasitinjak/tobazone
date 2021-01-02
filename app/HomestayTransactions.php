<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */


class HomestayTransactions extends Model
{
    protected $table ='homestay_transaction';
    protected $dates = ['deleted_at'];
    public function homestay()
    {
        return $this->belongsTo('App\Homestay', 'homestay_id');
    }
}

