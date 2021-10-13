<?php

namespace App\Repositories;

use App\Models\Merchants;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class MerchantsRepository
 * @package App\Repositories
 * @version January 31, 2019, 9:56 am UTC
 *
 * @method Merchants findWithoutFail($id, $columns = ['*'])
 * @method Merchants find($id, $columns = ['*'])
 * @method Merchants first($columns = ['*'])
*/
class MerchantsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'uuid',
        'name',
        'address',
        'phone',
        'email',
        'CallBackUrl',
        'confirmation_code',
        'confirmed'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Merchants::class;
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
