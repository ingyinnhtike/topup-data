<?php

namespace App\Repositories;

use App\Models\PasswordGrantTokens;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PasswordGrantTokensRepository
 * @package App\Repositories
 * @version January 31, 2019, 9:56 am UTC
 *
 * @method PasswordGrantTokens findWithoutFail($id, $columns = ['*'])
 * @method PasswordGrantTokens find($id, $columns = ['*'])
 * @method PasswordGrantTokens first($columns = ['*'])
 */
class PasswordGrantTokensRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'merchant_id',
        'tokens'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PasswordGrantTokens::class;
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
