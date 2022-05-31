<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietYeuThich extends Model
{
    use HasFactory;

    protected $table = 'danh_sach_yeu_thich';

    protected $fillable = [
        'san_pham_id',
        'ten_san_pham',
        'so_luong',
        'don_gia',
        // 'yeu_thich_id',
        'agent_id',
    ];
}
