<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackLog extends Model
{
    protected $table = 'callback_log';

    protected $fillable = [
        'code',
        'request_id',
        'merchant_id',
        'uuid',
        'service_id',
        'service_name',
        'status'
    ];
}
