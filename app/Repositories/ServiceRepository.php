<?php

namespace App\Repositories;

use App\Models\Service;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ServiceRepository
 * @package App\Repositories
 * @version February 13, 2019, 3:44 am UTC
 *
 * @method Service findWithoutFail($id, $columns = ['*'])
 * @method Service find($id, $columns = ['*'])
 * @method Service first($columns = ['*'])
*/
class ServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'bp_password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Service::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }
}
