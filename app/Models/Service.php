<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 * @version February 13, 2019, 3:44 am UTC
 *
 * @property integer merchant_id
 * @property string service_name
 */
class Service extends Model
{
    use SoftDeletes;

    public $table = 'services';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'merchant_id',
        'service_name',
        'CallBackUrl',
        'mpt_package_id',
        'ooredoo_package_id',
        'telenor_package_id',
        'myTel_package_id',
        'mpss_username',
        'mpss_password',
        'mpss_company_id',
        'mpss_key',
        'service_type',
        'amount',
        'status',
        'bp_username',
        'bp_password',
        'max_amount_today',
        'max_amount_phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'merchant_id' => 'integer',
        'service_name' => 'string',
        'CallBackUrl' => 'string',
        'mpt_package_id' => 'string',
        'ooredoo_package_id' => 'string',
        'telenor_package_id' => 'string',
        'myTel_package_id' => 'string',
        'mpss_username' => 'string',
        'mpss_password' => 'string',
        'mpss_company_id' => 'string',
        'mpss_key' => 'string',
        'service_type' => 'string',
        'amount' => 'string',
        'status' => 'integer',
        'bp_username' => 'string',
        'bp_password' => 'string',
        'max_amount_today' => 'string',
        'max_amount_phone' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'merchant_id' => 'required',
        'service_name' => 'required',
        'service_type' => 'required'
    ];

    public function merchants()
    {
        return $this->belongsTo(Merchants::class, 'merchant_id');
    }

    public function packagesMPT()
    {
        return $this->belongsTo(Packages::class, 'mpt_package_id');
    }

    public function packagesOoredoo()
    {
        return $this->belongsTo(Packages::class, 'ooredoo_package_id');
    }

    public function packagesTelenor()
    {
        return $this->belongsTo(Packages::class, 'telenor_package_id');
    }

    public function packagesMytel()
    {
        return $this->belongsTo(Packages::class, 'myTel_package_id');
    }

}
