<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class api_token extends Model
{
    protected $table = 'api_tokens';

    protected $fillable = [
        'operator',
        'token'
    ];

}
