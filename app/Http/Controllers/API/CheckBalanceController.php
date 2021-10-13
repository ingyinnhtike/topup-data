<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataPackRequest;
use App\Models\Balance;
use Illuminate\Support\Facades\Validator;
use App\Models\Merchants;

class CheckBalanceController extends Controller
{
    public function index(Request $request)
    {
        $storePostRequest = new DataPackRequest();

        $validator = Validator::make($request->all(), $storePostRequest->checkBalanceRules());

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
        $email = $request->email;

        $uuIdResult = Merchants::where([
            ["uuid", '=', $keyword], ["email", '=', $email]
        ])->first();

        if ($uuIdResult == null) {

            $response = [
                'status' => 'fail',
                'result_code' => 'RC004',
                'description' => "Keyword Or Email authentication fails."
            ];

            return response()->json($response, 422);
        }

        $balance = Balance::select('mpt','ooredoo','telenor','mytel')->where([
            ["merchant_id", '=', $uuIdResult->id]
        ])->first();

        return response()->json($balance, 200);

    }
}
