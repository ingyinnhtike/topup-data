<?php

namespace App\Models\Setting\Bank;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['bank_name', 'card_number', 'card_holder_name'];
}
