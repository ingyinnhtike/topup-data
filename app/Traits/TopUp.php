<?php

namespace App\Traits;

use App\Models\RequestTopUpLog;
use Carbon\Carbon;
use App\Models\RequestLog;
use GuzzleHttp\Client;

trait TopUp
{
    public function mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult)
    {
        /**MPSS Top Up API**/
        $gClient = new Client();

        $encryptedString = $this->encryptStringForMPSS($requestId, $phoneNumber, $amount, $operator, $serviceResult->mpss_key);

        $data = [
            'id' => $requestId,
            'phNo' => $phoneNumber,
            'amount' => $amount,
            'operator' => '1',
            'encryptedString' => $encryptedString,
            'companyId' => $serviceResult->mpss_company_id
        ];

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache',
        ];

        $response = $gClient->request('POST', 'https://api.myanmarpaymenttopup.com/campaign/xurltopupaction/', [
            'auth' => [$serviceResult->mpss_username, $serviceResult->mpss_password],
            'headers' => $headers,
            'timeout' => 50.0,
            'verify' => false,
            'form_params' => [
                'id' => $requestId,
                'phNo' => $phoneNumber,
                'amount' => $amount,
                'operator' => $operator,
                'encryptedString' => $encryptedString,
                'companyId' => $serviceResult->mpss_company_id
            ]
        ]);

        $responsedBody = $response->getBody();

        $body = json_decode($responsedBody, true);

        return $body;
    }

    public function mpt($requestId, $phoneNumber, $amount, $operator, $serviceResult)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $amount,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'http://18.136.1.127/api/fill-top-up'. '?' . $params;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
        ));

        $response = curl_exec($curl);

        $body = json_decode($response, true);

        return $body;

    }

    public function ooredoo($requestId, $phoneNumber, $amount, $operator, $serviceResult)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $amount,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'http://67.205.182.89/api/fill-main-balance'. '?' . $params;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
        ));

        $response = curl_exec($curl);

        $body = json_decode($response, true);

        return $body;
    }

    public function telenor($requestId, $phoneNumber, $amount, $operator, $serviceResult)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $amount,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'https://telenortopup.blueplanet.com.mm/api/top-up/generate'. '?' . $params;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
        ));

        $response = curl_exec($curl);

        $body = json_decode($response, true);

        return $body;
    }

    public function mytel($requestId, $phoneNumber, $amount, $operator, $serviceResult)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $amount,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'http://139.59.245.194/api/top-up/generate'. '?' . $params;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
        ));

        $response = curl_exec($curl);

        $body = json_decode($response, true);

        return $body;
    }

    public function encryptStringForMPSS($requestId, $phoneNumber, $amount, $operator, $mpss_key)
    {
        $dataToEnc = $requestId . "|" . $phoneNumber . "|" . $amount . "|" . $operator;
        $encryption_key = $mpss_key;
        $iv = array(0, 0, 0, 0, 0, 0, 0, 0);

        $iv = $this->binaryArrayToByte($iv);


        $encryptedstring = openssl_encrypt($dataToEnc, 'des-ede3-cbc', $encryption_key, OPENSSL_RAW_DATA, $iv);

        return utf8_encode(base64_encode($encryptedstring));
    }

    public function binaryArrayToByte($arrData)
    {
        $byteData = "";

        for ($i = 0; $i < count($arrData); $i++) {
            $byteData .= pack('c', $arrData[$i]);
        }

        return $byteData;
    }

    public function saveTopUpLog($merchantRequestId, $requestId, $uuIdResult, $serviceResult, $to, $operator, $userDefined)
    {
        $RequestLog = new RequestTopUpLog();
        $RequestLog->merchant_request_id = $merchantRequestId;
        $RequestLog->request_id = $requestId;
        $RequestLog->merchant_id = $uuIdResult->id;
        $RequestLog->service_id = $serviceResult->id;
        $RequestLog->to = $to;
        $RequestLog->operator = $operator;
        $RequestLog->userDefined = $userDefined;
        $RequestLog->save();

        return $RequestLog;
    }

    public function updateTopUpLog($RequestLog, array $body)
    {
        $resultCode = (array_key_exists('resultcode', (array)$body) ? $body['resultcode'] : $body['result_code']);
        
        $RequestLog->status = $body['status'];
        $RequestLog->description = is_array($body['description']) ? json_encode($body['description']) : $body['description'];
        $RequestLog->resultcode = $resultCode;

        $RequestLog->update();
    }
}
