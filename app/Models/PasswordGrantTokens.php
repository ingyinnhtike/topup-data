<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PasswordGrantTokens
 * @package App\Models
 * @version February 19, 2019, 2:18 pm +0630
 *
 * @property integer merchant_id
 * @property string tokens
 */
class PasswordGrantTokens extends Model
{
    use SoftDeletes;

    public $table = 'password_grant_tokens';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'merchant_id',
        'tokens'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'merchant_id' => 'integer',
        'tokens' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'merchant_id' => 'required',
        'tokens' => 'required'
    ];

    public function merchants()
    {
        return $this->belongsTo(Merchants::class, 'merchant_id');
    }
    
}
