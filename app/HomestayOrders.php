<?php
/**
 * Created by Sogumontar Hendra Simangunsong on 10-10-2020.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomestayOrders extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_customer',
        'id_homestay',
        'total_price',
        'check_in',
        'duration',
        'payment_method',
        'is_paid',
        'resi',
        'status'
    ];
    protected $dates = ['deleted_at'];
}
