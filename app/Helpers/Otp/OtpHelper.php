<?php
/**
 * Created by PhpStorm.
 * User: naymin
 * Date: 1/3/18
 * Time: 10:48 AM
 */
namespace App\Helpers\Otp;


class OtpHelper
{
    public function sms($keyword,$callerid,$message)
    {
        $title = urlencode($keyword);
        /*
         * SMS API FOR MPT ONLY
         */
//        $topost = "http://ooredoo.blueplanet.com.mm/mptsdpb2b/coke/mt.php?callerid=$callerid&m=$message&source=$title";
        /**
         * SMS API FOR MPT,OOREDOO,TELENOR
         */
        $topost = "http://apiv2.blueplanet.com.mm/mptsdp/bizsendsmsapi.php?callerid=95".parse_phone_number($callerid)."&k=BPpayment&u=payment&p=9a3eee8c4d065acf0a60fbfa80cb26a3&m=$message&t=$title";
//        http://apiv2.blueplanet.com.mm/mptsdp/bizsendsmsapi.php?callerid=95943023813&k=musicapp&u=musicapp&p=f489fc4034609c51143ccb7874dfcae7&m=test00001&t=musicapp
        $ch = curl_init($topost);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;

    }
}
