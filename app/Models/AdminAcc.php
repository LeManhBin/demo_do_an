<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminAcc extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin_accs';

    protected $fillable = [
        'account',
        'password',
    ];
}
