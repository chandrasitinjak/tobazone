<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten');
    }

}
