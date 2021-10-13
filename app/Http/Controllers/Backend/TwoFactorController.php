<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            '2fa' => 'required',
        ]);

        if(\Carbon\Carbon::parse(Auth::user()->ban_time) != '' && \Carbon\Carbon::parse(Auth::user()->ban_time) > \Carbon\Carbon::now()){

            return view('backend.access.two_factor')->with('message', 'Ban User.');
        }

        if($request->input('2fa') == Auth::user()->token_2fa){
            $user = Auth::user();
            $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(config('session.lifetime'));
            $user->ban_time = null;
            $user->count = 0;
            $user->save();

            return redirect('/admin/0xBd86/home');

        } else {

            $user = Auth::user();

            if($user->count > 5){
                $user->ban_time = \Carbon\Carbon::now()->addHour()->toDateTimeString();
                $user->save();
            }else{

                $user->count++;
                $user->save();
            }

            return view('backend.access.two_factor')->with('message', 'Incorrect code.');
        }
    }

    public function showTwoFactorForm()
    {
        return view('backend.access.two_factor')->with('message', '');
    }
}
