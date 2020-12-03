<?php
/**
 * Created by Sogumontar Hendra Simangunsong on $DATA.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomestayCarousel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'description',
        'link'
    ];
    protected $dates = ['deleted_at'];
}
