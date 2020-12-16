<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homestay extends Model
{

    protected $fillable = [
        'name',
        'price',
        'total_room',
        'room_available',
        'description',
        'image',
        'address',
        'status',
        'kabupaten',
        'kecamatan',
        'desa',
        'merchant_id'
    ];
    protected $dates = ['deleted_at'];

    public function rooms(){
        return $this->hasMany('App\HomestayRoom', 'id_homestay');
    }

}
