<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestTopUpRawLog extends Model
{
    protected $table = 'request_top_up_raw_log';

    protected $fillable = ['request_data'];
}
