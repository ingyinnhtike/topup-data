<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     */
    protected function guard()
    {
        return Auth::guard('client');
    }

    public function broker()
    {
        return Password::broker('clients');
    }


    /**
     * Where to redirect users after resetting password.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('frontend.index');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $token
     *
     * @return \Illuminate\Http\Response
     */
    public function showResetForm($token = null)
    {
        return view('frontend.auth.passwords.reset')
            ->withToken($token)
            ->withEmail($this->user->getEmailForPasswordToken($token));
    }
}
