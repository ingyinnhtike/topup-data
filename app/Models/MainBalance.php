<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainBalance extends Model
{
    protected $table = 'main_balance';

    protected $fillable = [
        'mpt',
        'ooredoo',
        'telenor',
        'mytel'
    ];
}
