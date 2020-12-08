<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    public function kabupaten(){
        	return $this->belongsTo('App\Kabupaten');
    }
}
