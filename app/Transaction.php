<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'address', 'additional_info', 'status'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function payment() {
        return $this->hasOne('App\Payment');
    }
}
