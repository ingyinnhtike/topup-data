<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallbackRawLog extends Model
{
    protected $table = 'callback_raw_log';

    protected $fillable = ['request_data'];
}
