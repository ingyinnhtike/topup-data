<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance';

    protected $fillable = [
        'merchant_id',
        'amount'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchants::class,'merchant_id' , 'id');
    }
}
