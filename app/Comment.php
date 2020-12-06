<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array(
        'name',
        'comment',
        'user_id',
        'paket_id'
    );


    public function paket(){
        return $this->belongsTo(paketWisata::class,'paket_id','id_paket');
    }

//    public function replies(){
//        return $this->hasMany('App\Reply');
//    }
}
