<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{protected $table = 'paket_wisata';
    protected $primaryKey = 'id_paket';
    protected $fillable =['nama_paket','jenis_paket','status','harga_paket','availability','durasi','deskripsi_paket','rencana_perjalanan','tambahan','gambar','kabupaten_id'];

    public function getIncludedNotIncluded(){
        return $this->hasMany(IncludedNotIncluded::class,'paket_wisata_id','id_paket');
    }
    public function getSesi(){
        return $this->hasMany(Sesi::class,'paket_id','id_paket');
    }
    public function getKabupaten(){
        return $this->belongsTo(Kabupaten::class,'kabupaten_id','id_kabupaten');
    }
    public function getPaketLayanan(){
        return $this->belongsToMany(LayananWisata::class,'paket_layanans','paket_wisata_id','layanan_wisata_id','id_paket','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'paket_id','id_paket');
    }
    public function reviews() {
        return $this->hasMany('App\PaketReview','paket_id','id_paket');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($paket) { // before delete() method call this
            $paket->getIncludedNotIncluded()->delete();
            $paket->getSesi()->delete();
            // do the rest of the cleanup...
        });
    }

    public function defineStatus($status){
        if($status==0){
            return "Tidak Aktif";
        }elseif($status==1){
            return "Aktif";
        }else{
            return "Dihapus";
        }
    }

    public function defineClass($status){
        if($status==0){
            return "danger";
        }elseif($status==1){
            return "success";
        }else{
            return "dark";
        }
    }}
