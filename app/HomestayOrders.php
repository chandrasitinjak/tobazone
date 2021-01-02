<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomestayOrders extends Model
{
    protected $fillable = [
        'id_customer',
        'id_homestay',
        'total_price',
        'check_in',
        'duration',
        'payment_method',
        'is_paid',
        'resi',
        'status'
    ];
    protected $dates = ['deleted_at'];

    // homestay gets homestay data by id_homestay.
    public function homestay()
    {
        return $this->belongsTo('App\Homestay', 'id_homestay');
    }
}

