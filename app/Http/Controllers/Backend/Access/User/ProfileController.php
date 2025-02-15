<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\UpdateProfileRequest;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->user->updateProfile(access()->id(), $request->only('name', 'email'));

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();

            return redirect()->route('admin.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('admin.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }
}
