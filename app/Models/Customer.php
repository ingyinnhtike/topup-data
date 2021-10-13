<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @version December 27, 2018, 4:39 am UTC
 *
 * @property string name
 * @property string email
 * @property string password
 */
class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'uuid',
        'name',
        'email',
        'mobile',
        'password',
        'status',
        'confirmation_code',
        'confirmed',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid' => 'string',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'status'  => 'tinyInteger',
        'confirmation_code'  => 'string',
        'confirmed'  => 'boolean',
        'remember_token'  => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'email' => 'required|email|max:191',
        'password' => 'required'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
}
