<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('frontend.user.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     */
    protected function guard()
    {
        return Auth::guard('client');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login')
            ->withSocialiteLinks((new Socialite())->getSocialLinks());
    }

    /**
     * @param Request $request
     * @param $user
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        /*
         * Check to see if the users account is confirmed and active
         */
        if (! $user->isConfirmed()) {
            auth()->guard('client')->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id]));
        } elseif (! $user->isActive()) {
            auth()->guard('client')->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
        }

        event(new UserLoggedIn($user));

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        /*
         * Boilerplate needed logic
         */

        /*
         * Remove the socialite session variable if exists
         */
        if (app('session')->has(config('client-access.socialite_session_name'))) {
            app('session')->forget(config('client-access.socialite_session_name'));
        }

        /*
         * Remove any session data from backend
         */
//        app()->make(Auth::class)->flushTempSession();

        /*
         * Fire event, Log out user, Redirect
         */
        event(new UserLoggedOut($this->guard()->user()));

        /*
         * Laravel specific logic
         */
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {
        //If for some reason route is getting hit without someone already logged in
        if (! auth()->guard('client')->user()) {
            return redirect()->route('frontend.auth.login');
        }

        //If admin id is set, relogin
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            //Save admin id
            $admin_id = session()->get('admin_user_id');

//            app()->make(Auth::class)->flushTempSession();

            //Re-login admin
            auth()->guard('client')->loginUsingId((int) $admin_id);

            //Redirect to backend user page
            return redirect()->route('admin.access.user.index');
        } else {
//            app()->make(Auth::class)->flushTempSession();

            //Otherwise logout and redirect to login
            auth()->guard('client')->logout();

            return redirect()->route('frontend.auth.login');
        }
    }

}
