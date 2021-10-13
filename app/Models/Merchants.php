<?php

namespace App\Models;

use App\Models\Order\order;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Merchants
 * @package App\Models
 * @version January 31, 2019, 9:56 am UTC
 *
 * @property string name
 * @property string address
 * @property string phone
 * @property string email
 * @property string confirmation_code
 * @property boolean confirmed
 */
class Merchants extends Model
{
    use SoftDeletes;

    public $table = 'merchants';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'address',
        'phone',
        'email',
        'logo',
        'confirmation_code',
        'confirmed'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid' => 'string',
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'confirmation_code' => 'string',
        'confirmed' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function requestLog()
    {
        return $this->hasMany(RequestLog::class);
    }

    public function deposit()
    {
        return $this->hasMany(Deposits::class);
    }
}
