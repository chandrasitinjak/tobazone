<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{

    protected $table = 'komunitas';

    protected $primaryKey = 'id';

    protected $fillable = ['nama_komunitas','deskripsi','kabupaten_id','gambar','link'];


    public function getKabupaten(){
        return $this->belongsTo( Kabupaten::class, 'kabupaten_id','id_kabupaten');
    }

    public function getKomunitasMember(){
        return $this->belongsToMany(Member::class,'komunitas_members','komunitas_id','member_id','id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($komunitas) { // before delete() method call this
            $komunitas->getKomunitasMember()->detach();
            // do the rest of the cleanup...
        });
    }
}
