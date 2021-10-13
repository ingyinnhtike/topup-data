<?php

namespace App\Traits;

use App\Models\RequestTopUpLog;
use Carbon\Carbon;
use App\Models\RequestLog;
use GuzzleHttp\Client;

trait DataPack
{
    public function mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog)
    {
        /**MPSS Top Up API**/
        $gClient = new Client();

        $encryptedString = $this->encryptStringForMPSS($requestId, $phoneNumber, $amount, $operator, $serviceResult->mpss_key);

        $data = [
            'id' => $requestId,
            'phNo' => $phoneNumber,
            'packageName' => $RequestLog->packages->package_name,
            'packageCode' => $RequestLog->packages->package_code,
            'amount' => $RequestLog->packages->price,
            'operator' => '1',
            'encryptedString' => $encryptedString,
            'companyId' => $serviceResult->mpss_company_id
        ];

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        if ($operator == 1) {

            $response = $gClient->request('POST', 'https://package.myanmarpaymenttopup.com/datapack/packagecampaign/jsonaction/', [
                'auth' => [$serviceResult->mpss_username, $serviceResult->mpss_password],
                'headers' => $headers,
                'timeout' => 50.0,
                'verify' => false,
                'body' => json_encode([
                    'id' => $requestId,
                    'phNo' => $phoneNumber,
                    'packageName' => $RequestLog->packages->package_name,
                    'packageCode' => $RequestLog->packages->package_code,
                    'amount' => $RequestLog->packages->price,
                    'operator' => $operator,
                    'encryptedString' => $encryptedString,
                    'companyId' => $serviceResult->mpss_company_id
                ])
            ]);

        } else {

            $response = $gClient->request('POST', 'https://package.myanmarpaymenttopup.com/datapack/packagecampaign/jsonaction/', [
                'auth' => [$serviceResult->mpss_username, $serviceResult->mpss_password],
                'headers' => $headers,
                'timeout' => 50.0,
                'verify' => false,
                'body' => json_encode([
                    'id' => $requestId,
                    'phNo' => $phoneNumber,
                    'packageCode' => $RequestLog->packages->package_code,
                    'amount' => $RequestLog->packages->price,
                    'operator' => $operator,
                    'encryptedString' => $encryptedString,
                    'companyId' => $serviceResult->mpss_company_id
                ])
            ]);

        }

        $responsedBody = $response->getBody();

        $body = json_decode($responsedBody, true);

        return $body;
    }

    public function mpt($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $RequestLog->packages->price,
            'package_code' => $RequestLog->packages->package_name,
            'package_name' => $RequestLog->packages->package_code,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'http://18.136.1.127/api/fill-data-pack'. '?' . $params;

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

    public function ooredoo($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $RequestLog->packages->price,
            'package_code' => $RequestLog->packages->package_name,
            'package_name' => $RequestLog->packages->package_code,
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

    public function telenor($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $RequestLog->packages->price,
            'package_code' => $RequestLog->packages->package_code,
            'package_name' => $RequestLog->packages->package_name,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'https://telenortopup.blueplanet.com.mm/api/data/generate'. '?' . $params;

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

    public function mytel($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog)
    {
        $params = http_build_query([
            'phone' => $phoneNumber,
            'amount' => $RequestLog->packages->price,
            'package_code' => $RequestLog->packages->package_code,
            'package_name' => $RequestLog->packages->package_name,
            'username' => $serviceResult->bp_username,
            'password' => $serviceResult->bp_password,
            'transaction_id' => $requestId
        ]);

        $uri = 'http://139.59.245.194/api/data/generate'. '?' . $params;

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

    public function saveDataPackLog($merchantRequestId, $requestId, $uuIdResult, $serviceResult, $package_id, $to, $operator, $userDefined)
    {
        $RequestLog = new RequestLog();
        $RequestLog->merchant_request_id = $merchantRequestId;
        $RequestLog->request_id = $requestId;
        $RequestLog->merchant_id = $uuIdResult->id;
        $RequestLog->service_id = $serviceResult->id;
        $RequestLog->package_id = $package_id;
        $RequestLog->to = $to;
        $RequestLog->operator = $operator;
        $RequestLog->userDefined = $userDefined;
        $RequestLog->save();

        return $RequestLog;
    }

    public function updateDataPackLog($RequestLog, array $body)
    {
        $resultCode = (array_key_exists('resultcode', (array)$body) ? $body['resultcode'] : $body['result_code']);

        $RequestLog->status = $body['status'];
        $RequestLog->description = $body['description'];
        $RequestLog->resultcode = $resultCode;

        $RequestLog->update();
    }
}
