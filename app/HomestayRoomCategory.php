<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomestayRoomCategory extends Model
{
    protected $table = 'homestay_room_categories';
    protected $fillable = ['category_name', 'category_deskripsi', 'status'];
    protected $primaryKey = 'id';

}
