<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananWisata extends Model
{
    protected $table = 'layanan_wisata';

    protected $fillable = ['nama_layanan','jenisLayanan_id','member_id','kabupaten_id','deskripsi_layanan'];

    public function getJenisLayanan(){
        return $this->belongsTo(JenisLayanan::class, 'jenisLayanan_id','id');
    }
    public function getKabupaten(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id','id_kabupaten');
    }
    public function getMember(){
        return $this->belongsTo(Member::class, 'member_id','id');
    }
    public function getPaketLayanan(){
        return $this->belongsToMany(LayananWisata::class,'paket_layanans','layanan_wisata_id','paket_wisata_id','id_paket','id');
    }
}
