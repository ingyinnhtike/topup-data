<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use App\Models\RequestLog;
use App\Models\RequestRawLog;
use Carbon\Carbon;
use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Settings;
use App\Models\Merchants;
use GuzzleHttp\Client;

class RetryRequestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();

        /***Request Raw Log***/
        RequestRawLog::create([
            'request_data' => json_encode($input, JSON_FORCE_OBJECT)
        ]);

        $keyword = $request->keyword;
        $serviceName = $request->serviceName;
//        $merchantRequestId = $request->id;
//        $to = parse_phone_number($request->to);
        $errorStatus = null;
        $response = null;
        $response['status'] = 200;
        $response['message'] = array();
        $merchantResult = null;
        $uuIdResult = null;
        $serviceResult = null;
        $status = null;

        /***Checking for request parameter***/
        if (empty($_SERVER['QUERY_STRING']) && empty($request->all())) {

            $response = [
                'status' => 1,
                'error-text' => 'Your request is incomplete and missing some mandatory parameters.'
            ];

            return response()->json($response, 400);

        }

        /***checking for empty and null of Keyword for authentication***/
        if (is_null($keyword) || empty($keyword)) {

            $response = [
                'status' => 2,
                'message' => "Keyword is missing."
            ];

            return response()->json($response, 400);
        }

        /***checking merchant Keyword with uuid***/
        $uuIdResult = Merchants::where([
            ["uuid", '=', $keyword]
        ])->first();

        if ($uuIdResult == null) {

            $response = [
                'status' => 3,
                'message' => "Keyword authentication fails."
            ];

            return response()->json($response, 400);

        }

        /***checking for empty and null of serviceName for authentication***/
        if (is_null($serviceName) || empty($serviceName)) {

            $response = [
                'status' => 4,
                'message' => "Service Name is missing."
            ];

            return response()->json($response, 400);
        }

        /***checking user service name***/
        $serviceResult = Service::where([
            ["service_name", '=', $serviceName],
            ["merchant_id", '=', $uuIdResult->id]
        ])->first();

        if ($serviceResult == null) {

            $response = [
                'status' => 5,
                'message' => "Service Name could not be found."
            ];

            return response()->json($response, 400);

        }

        $retries = RequestLog::where([
            ["merchant_id", '=', $uuIdResult->id],
            ["service_id", '=', $serviceResult->id],
            ["resultcode", '=', '1012'],
            ["callback_status", '=', null]
        ])->get();

//        dump($retries);exit;

        foreach ($retries as $retry) {


            $req_time = date("YmdHis");
            $requestId = $req_time . $retry->to;

            $operator = prefix($retry->to);

            if ($operator == 'MPT') {
                $package_id = $serviceResult->mpt_package_id;
            } elseif ($operator == 'ooredoo') {
                $package_id = $serviceResult->ooredoo_package_id;
            } elseif ($operator == 'telenor') {
                $package_id = $serviceResult->telenor_package_id;
            } else {
                $package_id = $serviceResult->myTel_package_id;
            }

            /***Inset to Request Log***/
            $RequestLog = new RequestLog();
            $RequestLog->merchant_request_id = generateOrderNumber('R-');
            $RequestLog->request_id = $requestId;
            $RequestLog->merchant_id = $uuIdResult->id;
            $RequestLog->service_id = $serviceResult->id;
            $RequestLog->package_id = $package_id;
            $RequestLog->to = $retry->to;
            $RequestLog->operator = $operator;
            $RequestLog->save();


            /***MPSS Topup API***/
            $gClient = new Client();

            $refId = $requestId;
            $phoneNumber = parse_phone_number2($retry->to);
            $amount = $RequestLog->packages->price;

            // dump($encryptedString);

            // $data = [
            //     'id' => $refId,
            //     'phNo' => $phoneNumber,
            //     'packageName' => $RequestLog->packages->package_name,
            //     'packageCode' => $RequestLog->packages->package_code,
            //     'amount' => $RequestLog->packages->price,
            //     'operator' => '2',
            //     'encryptedString' => $encryptedString,
            //     'companyId' => '10002027'
            // ];

            switch ($operator) {

                case "MPT":

                    $operator = '1';

                    // dump($operator);

                    $encryptedString = $this->encryptStringForMPSS($refId, $phoneNumber, $amount, $operator);

                    // dump($encryptedString);

                    $data = [
                        'id' => $refId,
                        'phNo' => $phoneNumber,
                        'packageName' => $RequestLog->packages->package_name,
                        'packageCode' => $RequestLog->packages->package_code,
                        'amount' => $RequestLog->packages->price,
                        'operator' => '5',
                        'encryptedString' => $encryptedString,
                        'companyId' => '10002027'
                    ];

                    // dump($data);

                    $headers = [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ];

                    try {

                        $response = $gClient->request('POST', 'http://package.myanmarpaymenttopup.com/datapack/packagesecure/jsonaction/', [
                            'auth' => ['BluePlanet', 'bp@202&%'],
                            'headers' => $headers,
                            'timeout' => 50.0,
                            'verify' => false,
                            'body' => json_encode([
                                'id' => $refId,
                                'phNo' => $phoneNumber,
                                'packageName' => $RequestLog->packages->package_name,
                                'packageCode' => $RequestLog->packages->package_code,
                                'amount' => $RequestLog->packages->price,
                                'operator' => '1',
                                'encryptedString' => $encryptedString,
                                'companyId' => '10002027'
                            ])
                        ]);
                        $responsedBody = $response->getBody();
                        $body = json_decode($responsedBody, true);

                    } catch (\GuzzleHttp\Exception\ConnectException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\ClientException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (PDOException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    }

                    break;

                case "ooredoo":

                    $operator = '2';

                    // dump($operator);

                    $encryptedString = $this->encryptStringForMPSS($refId, $phoneNumber, $amount, $operator);

                    // dump($encryptedString);

                    $data = [
                        'id' => $refId,
                        'phNo' => $phoneNumber,
                        'packageName' => $RequestLog->packages->package_name,
                        'packageCode' => $RequestLog->packages->package_code,
                        'amount' => $RequestLog->packages->price,
                        'operator' => '2',
                        'encryptedString' => $encryptedString,
                        'companyId' => '10002027'
                    ];

                    // dump($data);

                    $headers = [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ];

                    try {

                        $response = $gClient->request('POST', 'http://package.myanmarpaymenttopup.com/datapack/packagesecure/jsonaction/', [
                            'auth' => ['BluePlanet', 'bp@202&%'],
                            'headers' => $headers,
                            'timeout' => 50.0,
                            'verify' => false,
                            'body' => json_encode([
                                'id' => $refId,
                                'phNo' => $phoneNumber,
                                // 'packageName' => $RequestLog->packages->package_name,
                                'packageCode' => $RequestLog->packages->package_code,
                                'amount' => $RequestLog->packages->price,
                                'operator' => '2',
                                'encryptedString' => $encryptedString,
                                'companyId' => '10002027'
                            ])
                        ]);
                        $responsedBody = $response->getBody();
                        $body = json_decode($responsedBody, true);

                    } catch (\GuzzleHttp\Exception\ConnectException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\ClientException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (PDOException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    }


                    break;

                case "telenor":

                    $operator = '3';

                    // dump($operator);

                    $encryptedString = $this->encryptStringForMPSS($refId, $phoneNumber, $amount, $operator);

                    // dump($encryptedString);

                    $data = [
                        'id' => $refId,
                        'phNo' => $phoneNumber,
                        'packageName' => $RequestLog->packages->package_name,
                        'packageCode' => $RequestLog->packages->package_code,
                        'amount' => $RequestLog->packages->price,
                        'operator' => '3',
                        'encryptedString' => $encryptedString,
                        'companyId' => '10002027'
                    ];

                    // dump($data);

                    $headers = [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ];

                    try {

                        $response = $gClient->request('POST', 'http://package.myanmarpaymenttopup.com/datapack/packagesecure/jsonaction/', [
                            'auth' => ['BluePlanet', 'bp@202&%'],
                            'headers' => $headers,
                            'timeout' => 50.0,
                            'verify' => false,
                            'body' => json_encode([
                                'id' => $refId,
                                'phNo' => $phoneNumber,
                                // 'packageName' => $RequestLog->packages->package_name,
                                'packageCode' => $RequestLog->packages->package_code,
                                'amount' => $RequestLog->packages->price,
                                'operator' => '3',
                                'encryptedString' => $encryptedString,
                                'companyId' => '10002027'
                            ])
                        ]);
                        $responsedBody = $response->getBody();
                        $body = json_decode($responsedBody, true);

                    } catch (\GuzzleHttp\Exception\ConnectException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\ClientException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (PDOException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    }

                    break;

                default:

                    $operator = '5';

                    // dump($operator);

                    $encryptedString = $this->encryptStringForMPSS($refId, $phoneNumber, $amount, $operator);

                    // dump($encryptedString);

                    $data = [
                        'id' => $refId,
                        'phNo' => $phoneNumber,
                        'packageName' => $RequestLog->packages->package_name,
                        'packageCode' => $RequestLog->packages->package_code,
                        'amount' => $RequestLog->packages->price,
                        'operator' => '5',
                        'encryptedString' => $encryptedString,
                        'companyId' => '10002027'
                    ];

                    // dump($data);

                    $headers = [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ];

                    try {

                        $response = $gClient->request('POST', 'http://package.myanmarpaymenttopup.com/datapack/packagesecure/jsonaction/', [
                            'auth' => ['BluePlanet', 'bp@202&%'],
                            'headers' => $headers,
                            'timeout' => 50.0,
                            'verify' => false,
                            'body' => json_encode([
                                'id' => $refId,
                                'phNo' => $phoneNumber,
                                // 'packageName' => $RequestLog->packages->package_name,
                                'packageCode' => $RequestLog->packages->package_code,
                                'amount' => $RequestLog->packages->price,
                                'operator' => '5',
                                'encryptedString' => $encryptedString,
                                'companyId' => '10002027'
                            ])
                        ]);
                        $responsedBody = $response->getBody();
                        $body = json_decode($responsedBody, true);

                    } catch (\GuzzleHttp\Exception\ConnectException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (\GuzzleHttp\Exception\ClientException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    } catch (PDOException $ex) {
                        Log::error('#error_msg:' . $ex->getMessage());
                        $status = "failed";
                    }

                    break;
            }

            if ($status == 'failed') {
                /***Return Error Json***/
                echo $status;

            }

            /***Update to Request Log***/
            $RequestLog->status = $body['status'];
            $RequestLog->description = $body['description'];
            $RequestLog->resultcode = $body['resultcode'];

            $RequestLog->update();

            RequestLog::where([
                ["merchant_id", '=', $uuIdResult->id],
                ["service_id", '=', $serviceResult->id],
                ["merchant_request_id", '=', $retry->merchant_request_id],
                ["to", '=', $retry->to]
            ])->update(['callback_status' => 'Retry']);

            /***Return Success Json***/
            echo $body['status'];
        }

    }

    public function encryptStringForMPSS($refId, $phoneNumber, $amount, $operator)
    {
        $dataToEnc = $refId . "|" . $phoneNumber . "|" . $amount . "|" . $operator;
        $encryption_key = 'J9YUGOEc7bowJ8xK192QL79M';
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
}