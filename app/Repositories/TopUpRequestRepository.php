<?php

namespace App\Repositories;

use App\Models\RequestLog;
use App\Models\RequestTopUpLog;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

/**
 * Class OTPRequestRepository
 * @package App\Repositories
 * @version January 31, 2019, 9:56 am UTC
 *
 * @method RequestLog findWithoutFail($id, $columns = ['*'])
 * @method RequestLog find($id, $columns = ['*'])
 * @method RequestLog first($columns = ['*'])
 */
class TopUpRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'merchant_request_id',
        'request_id',
        'merchant_id',
        'service_id',
        'to',
        'operator',
        'status',
        'description',
        'resultcode',
        'callback_status',
        'userDefined'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequestTopUpLog::class;
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

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getClientActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->where('merchant_id', Auth::user()->merchants->id)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function clientCount()
    {
        return $this->model
            ->where('merchant_id', Auth::user()->merchants->id)
            ->count();
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function successCount()
    {
        return $this->model
            ->where('status','success')
            ->count();
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function successClientCount()
    {
        return $this->model
            ->where('status','success')
            ->where('merchant_id', Auth::user()->merchants->id)
            ->count();
    }
}
