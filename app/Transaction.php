<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'merchant_id', 'address', 'status'];

    public function merchant() {
        return $this->belongsTo('App\User', 'merchant_id');
    }

    public function customer() {
        return $this->belongsTo('App\User', 'customer_id');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function payment() {
        return $this->hasOne('App\Payment');
    }
}
