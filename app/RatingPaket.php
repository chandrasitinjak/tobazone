<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingPaket extends Model
{
    protected $table="rating_pakets";
    protected $primaryKey = 'id';
    protected $fillable = [
        'paket_id', 'user_id', 'rating'
    ];

}
