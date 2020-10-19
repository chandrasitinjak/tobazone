<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homestay extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'price',
        'total_room',
        'room_available', 
        'description',
        'image',
        'address',
        'status',
        'merchant_id'
    ];
    protected $dates = ['deleted_at'];
}
	