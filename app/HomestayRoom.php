<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomestayRoom extends Model
{
    protected $table = 'homestay_rooms';

    public function homestay()
    {
        return $this->belongsTo('App\Homestay');
    }

}
