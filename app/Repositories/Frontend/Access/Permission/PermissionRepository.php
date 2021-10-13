<?php

namespace App\Repositories\Frontend\Access\Permission;

use App\Repositories\BaseRepository;
use App\Models\Client\Access\Permission\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;
}
