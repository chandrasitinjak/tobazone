<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomestayRoomFacilities extends Model
{
    protected $table = 'homestay_room_facilities';
    protected $fillable = ['facilities_name', 'facilities_deskripsi', 'status'];
    protected $primaryKey = 'id';

}
