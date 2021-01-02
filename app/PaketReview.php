<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketReview extends Model
{
    protected $fillable = ['pemesanan_id', 'user_id', 'paket_id', 'body'];

    public function paket() {
        return $this->belongsTo(PaketWisata::class, 'paket_id','id_paket');
    }

    public function customer() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
