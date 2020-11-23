<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketLayanan extends Model
{
    protected $table = 'paket_layanans';
    protected $fillable = ['paket_wisata_id','layanan_wisata_id'];
}
