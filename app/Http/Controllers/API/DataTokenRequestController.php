<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\DataPackRequest;
use App\Models\Access\User\User;
use App\Models\Balance;
use App\Models\CallbackLog;
use App\Models\CallbackRawLog;
use App\Models\Service;
use App\Models\RequestLog;
use App\Models\RequestRawLog;
use App\Traits\DataPack;
use Carbon\Carbon;
use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Settings;
use App\Models\Merchants;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DataTokenRequestController extends Controller
{
    use DataPack;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();

        /**Request Raw Log**/
        RequestRawLog::create([
            'request_data' => json_encode($input, JSON_FORCE_OBJECT)
        ]);

        $storePostRequest = new DataPackRequest();

        $validator = Validator::make($request->all(), $storePostRequest->rules());

        if ($validator->fails()) {

            $response['status'] = 'fail';
            $response['result_code'] = 'RC003';
            $response['description'] = 'Invalid input parameter(s)!';
            $response['error'] = '';
            $error = array();
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $error[$key] = $value[0];
            }
            $response['error'] = $error;
            return response()->json($response, 400);
        }

        $keyword = $request->keyword;
        $serviceName = $request->service_name;
        $merchantRequestId = $request->id;
        $to = parse_phone_number($request->to);
        $errorStatus = null;
        $response = null;
        $response['status'] = 200;
        $response['message'] = array();
        $merchantResult = null;
        $uuIdResult = null;
        $serviceResult = null;
        $status = null;

        /**checking merchant Keyword with uuid**/
        $uuIdResult = Merchants::where([
            ["uuid", '=', $keyword]
        ])->first();

        if ($uuIdResult == null) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC004',
                'description' => "Keyword authentication fails."
            ];

            return response()->json($response, 422);
        }

        /**checking user service name**/
        $serviceResult = Service::where([
            ["service_name", '=', $serviceName],
            ["merchant_id", '=', $uuIdResult->id]
        ])->first();

        if ($serviceResult == null) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC005',
                'description' => "Service Name could not be found."
            ];

            return response()->json($response, 422);
        }

        /**checking integer for phone**/
        if (filter_var($to, FILTER_VALIDATE_INT)) {
        } else {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC006',
                'description' => "Phone number is not an integer."
            ];

            return response()->json($response, 422);
        }

        $requestLog = RequestLog::where([
            ['merchant_request_id', '=', $merchantRequestId]
        ])->first();

        if ($requestLog != null) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC007',
                'description' => "'id' is already exit."
            ];

            return response()->json($response, 422);
        }

        if (has_special_chars($merchantRequestId)) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC008',
                'description' => "'id' cannot contain special character"
            ];

            return response()->json($response, 422);
        }

        if ($serviceResult->status == 1) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC011',
                'description' => "No Available Service."
            ];

            return response()->json($response, 422);
        }

        $todaySumAmount = RequestLog::leftJoin('services', 'services.id', '=', 'request_log.service_id')
            ->leftJoin('packages', 'packages.id', '=', 'request_log.package_id')
            ->where([
                ['service_id', '=', $serviceResult->id],
                ['request_log.merchant_id', '=', $uuIdResult->id],
                ['request_log.status', '=', 'success']
            ])
            ->whereDate('request_log.created_at', Carbon::today())
            ->sum('packages.price');

        if ($todaySumAmount >= $serviceResult->max_amount_today) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC013',
                'description' => "Your service top up amount is limited for today."
            ];

            return response()->json($response, 422);
        }

        $todaySumAmountPhone = RequestLog::leftJoin('services', 'services.id', '=', 'request_log.service_id')
            ->leftJoin('packages', 'packages.id', '=', 'request_log.package_id')
            ->where([
                ['service_id', '=', $serviceResult->id],
                ['request_log.merchant_id', '=', $uuIdResult->id],
                ['request_log.status', '=', 'success'],
                ['request_log.to', '=', $to]
            ])
            ->whereDate('request_log.created_at', Carbon::today())
            ->sum('packages.price');

        if ($todaySumAmountPhone >= $serviceResult->max_amount_phone) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC012',
                'description' => "Your top up amount is limited for today."
            ];

            return response()->json($response, 422);
        }

        $operator = prefix($to);

        if ($operator == 'MPT') {
            $package_id = $serviceResult->mpt_package_id;
            $requestId = generateOrderNumber('TMPT-');
        } elseif ($operator == 'ooredoo') {
            $package_id = $serviceResult->ooredoo_package_id;
            $requestId = generateOrderNumber('TOOR-');
        } elseif ($operator == 'telenor') {
            $package_id = $serviceResult->telenor_package_id;
            $requestId = generateOrderNumber('TTEL-');
        } else {
            $package_id = $serviceResult->myTel_package_id;
            $requestId = generateOrderNumber('TMYT-');
        }

        /**Inset to Request Log**/
        $RequestLog = $this->saveDataPackLog($merchantRequestId, $requestId, $uuIdResult, $serviceResult, $package_id, $to, $operator, $request->userDefined);

        $phoneNumber = parse_phone_number2($to);
        $amount = $RequestLog->packages->price;

        switch ($operator) {

            case "MPT":

                $operator = '1';

                try {

                    /**Check Balance**/
                    $balance = Balance::where([
                        ["merchant_id", '=', $uuIdResult->id]
                    ])->first();

                    $balanceAmount = $balance->mpt;

                    if ($amount > $balanceAmount) {

                        $response = [
                            'status' => 'fail',
                            'result_code' => 'RC014',
                            'description' => "Balance is not enough!"
                        ];

                        return response()->json($response, 422);
                    }

                    // $body = $this->mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    $body = $this->mpt($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    /**Reduce Balance**/
                    if ($body['status'] == "success") {

                        $finalBalanceAmount = $balanceAmount - $amount;

                        Balance::where([
                            ["merchant_id", '=', $uuIdResult->id]
                        ])->update(['mpt' => $finalBalanceAmount]);
                    }
                } catch (\Exception $ex){
                    Log::error('#error_msg:' . $ex->getMessage());
                    $status = "failed";
                }

//                catch (\GuzzleHttp\Exception\ConnectException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\ClientException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (PDOException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                }

                break;

            case "ooredoo":

                $operator = '2';

                try {

                    /**Check Balance**/
                    $balance = Balance::where([
                        ["merchant_id", '=', $uuIdResult->id]
                    ])->first();

                    $balanceAmount = $balance->ooredoo;

                    if ($amount > $balanceAmount) {

                        $response = [
                            'status' => 'fail',
                            'result_code' => 'RC014',
                            'description' => "Balance is not enough!"
                        ];

                        return response()->json($response, 422);
                    }

                    // $body = $this->mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    $body = $this->ooredoo($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    /**Reduce Balance**/
                    if ($body['status'] == "success") {

                        $finalBalanceAmount = $balanceAmount - $amount;

                        Balance::where([
                            ["merchant_id", '=', $uuIdResult->id]
                        ])->update(['ooredoo' => $finalBalanceAmount]);
                    }
                } catch (\Exception $ex){
                    Log::error('#error_msg:' . $ex->getMessage());
                    $status = "failed";
                }

//                catch (\GuzzleHttp\Exception\ConnectException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\ClientException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (PDOException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                }


                break;

            case "telenor":

                $operator = '3';

                try {

                    /**Check Balance**/
                    $balance = Balance::where([
                        ["merchant_id", '=', $uuIdResult->id]
                    ])->first();

                    $balanceAmount = $balance->telenor;

                    if ($amount > $balanceAmount) {

                        $response = [
                            'status' => 'fail',
                            'result_code' => 'RC014',
                            'description' => "Balance is not enough!"
                        ];

                        return response()->json($response, 422);
                    }

                    /**MPSS Top Up API**/
                    // $body = $this->mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    /**Telenor Top Up API**/
                    $body = $this->telenor($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    /**Reduce Balance**/
                    if ($body['status'] == "success") {

                        $finalBalanceAmount = $balanceAmount - $amount;

                        Balance::where([
                            ["merchant_id", '=', $uuIdResult->id]
                        ])->update(['telenor' => $finalBalanceAmount]);
                    }
                } catch (\Exception $ex){
                    Log::error('#error_msg:' . $ex->getMessage());
                    $status = "failed";
                }

//                catch (\GuzzleHttp\Exception\ConnectException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\ClientException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (PDOException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                }

                break;

            default:

                $operator = '5';

                try {

                    /**Check Balance**/
                    $balance = Balance::where([
                        ["merchant_id", '=', $uuIdResult->id]
                    ])->first();

                    $balanceAmount = $balance->mytel;

                    if ($amount > $balanceAmount) {

                        $response = [
                            'status' => 'fail',
                            'result_code' => 'RC014',
                            'description' => "Balance is not enough!"
                        ];

                        return response()->json($response, 422);
                    }

                    $body = $this->mpss($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    //                    $phoneNumber = parse_phone_number($to);
                    //
                    $body = $this->mytel($requestId, $phoneNumber, $amount, $operator, $serviceResult, $RequestLog);

                    /**Reduce Balance**/
                    if ($body['status'] == "success") {

                        $finalBalanceAmount = $balanceAmount - $amount;

                        Balance::where([
                            ["merchant_id", '=', $uuIdResult->id]
                        ])->update(['mytel' => $finalBalanceAmount]);
                    }
                } catch (\Exception $ex){
                    Log::error('#error_msg:' . $ex->getMessage());
                    $status = "failed";
                }

//                catch (\GuzzleHttp\Exception\ConnectException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (\GuzzleHttp\Exception\ClientException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                } catch (PDOException $ex) {
//                    Log::error('#error_msg:' . $ex->getMessage());
//                    $status = "failed";
//                }

                break;
        }

        if ($status == 'failed') {
            /**Return Error Json**/
            return response()->json([
                'status' => 'fail',
                'to' => $to,
                'result_code' => 'RC009',
                'error' => 'Operator response error',
                'description' => 'There was an error processing in the Platform.',
                'id' => $RequestLog->merchant_request_id,
                'userDefined' => $RequestLog->userDefined
            ], 402);
        }

        /**Update to Request Log**/

        $this->updateDataPackLog($RequestLog, $body);

        /**Return Success Json**/

        if ($body['status'] == "success") {

            return response()->json([
                'status' => 'success',
                'to' => $to,
                'result_code' => 'RC001',
                'description' => $body['description'],
                'id' => $RequestLog->merchant_request_id,
                'userDefined' => $RequestLog->userDefined
            ], 200);
        } else {

            return response()->json([
                'status' => 'fail',
                'to' => $to,
                'result_code' => 'RC010',
                'error' => 'Operator response error',
                'description' => $body['description'],
                'id' => $RequestLog->merchant_request_id,
                'userDefined' => $RequestLog->userDefined
            ], 402);
        }
    }
}
