<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestRawLog extends Model
{
    protected $table = 'request_raw_log';

    protected $fillable = ['request_data'];
}
