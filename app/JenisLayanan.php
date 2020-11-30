<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    protected $table = 'jenis_layanan';

    public function getLayananWisata()
    {
        return $this->hasMany(LayananWisata::class, 'jenisLayanan_id', 'id');
    }
}
