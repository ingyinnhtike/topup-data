<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    protected $table = 'deposits';

    protected $fillable = [
        'sale_person',
        'sale_date',
        'mpt',
        'ooredoo',
        'telenor',
        'mytel',
        'invoice_id',
        'merchant_id',
        'data',
        'bill',
        'payment_type',
        'description'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchants::class, 'merchant_id', 'id');
    }
}
