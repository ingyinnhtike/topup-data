<?php

namespace App\Repositories\Frontend\Access\User;

use App\Models\Client\Access\User\User;
use App\Exceptions\GeneralException;

/**
 * Class UserSessionRepository.
 */
class UserSessionRepository
{
    /**
     * @param User $user
     *
     * @return mixed
     * @throws GeneralException
     */
    public function clearSession(User $user)
    {
        if ($user->id === auth()->guard('client')->user()->id) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_own_session'));
        }
        if (config('session.driver') != 'database') {
            throw new GeneralException(trans('exceptions.backend.access.users.session_wrong_driver'));
        }

        return $user->sessions()->delete();
    }
}
