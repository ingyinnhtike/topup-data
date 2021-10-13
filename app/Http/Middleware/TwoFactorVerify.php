<?php

namespace App\Http\Middleware;

use App\Helpers\Otp\OtpHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);

        $user = Auth::user();

        if($user != ''){
            if($user->token_2fa_expiry > \Carbon\Carbon::now()){
                return $next($request);
            }
        }else{
            return redirect('admin/0xBd86/login');
        }

        $code = mt_rand(10000,99999);
        $user->token_2fa = $code;
        $user->save();

        $phone_number = $user->phone_number;

        $msg =  "0".$phone_number.", Two Factor Code for OTP: ".$code;
        $message = urlencode($msg);
        $keyword = "sms info";
        $otpHelper = new OtpHelper();
        $res = $otpHelper->sms($keyword,$phone_number,$message);
        $response = json_decode($res, true);
        $status = $response['result_status'];
        $res_callerid = $response['result_callerid'];

        if ($status == 'OK') {

            return redirect('/2fa');
        }

    }
}
