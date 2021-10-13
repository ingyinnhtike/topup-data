<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestTopUpLog extends Model
{
    protected $table = 'request_top_up_log';

    protected $fillable = [
        'merchant_request_id',
        'request_id',
        'merchant_id',
        'service_id',
        'to',
        'operator',
        'status',
        'description',
        'resultcode',
        'callback_status',
        'userDefined'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchants::class,'merchant_id' , 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id' , 'id');
    }

    public function packages()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}
