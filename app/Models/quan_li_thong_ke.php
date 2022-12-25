<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quan_li_thong_ke extends Model
{
    use HasFactory;

    protected $table = 'quan_li_thong_ke';

    protected $fillable = [
        'order_date',
        'sales',
        'profit',
        'quantity',
        'total_order',
    ];
}
