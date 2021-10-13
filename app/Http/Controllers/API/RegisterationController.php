<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUserAndServiceRequest;
use Webpatser\Uuid\Uuid;
use App\Models\Merchants;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\PasswordGrantTokensRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Helpers\EncryptDecrypt;

class RegisterationController extends Controller
{
    protected $passwordGrantTokensRepository;

    public function __construct(PasswordGrantTokensRepository $passwordGrantTokensRepository)
    {
        $this->passwordGrantTokensRepository = $passwordGrantTokensRepository;
    }

    public function store(Request $request)
    {
        $toValidate = [];

        foreach ($request->all() as $key => $value) {
            $decrypted_value = EncryptDecrypt::myDecrypt($value);
            $toValidate[$key] = $decrypted_value;
        }

        $storeUserAndServiceRequest = new StoreUserAndServiceRequest();

        $validator = Validator::make($toValidate, $storeUserAndServiceRequest->rules());
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


        // create merchant

        $uuid = Uuid::generate()->string;

        $merchant = new Merchants();
        $merchant->uuid = $uuid;
        $merchant->name = $toValidate['name'];
        $merchant->phone = $toValidate['merchant_phone'];
        $merchant->address = $toValidate['merchant_address'];
        $merchant->email = $toValidate['email'];
        $merchant->logo = "";
        $merchant->save();

        // create user
        $user = new User();
        $user->name = $toValidate['user_name'];
        $user->email = $toValidate['email'];
        $user->password = Hash::make($toValidate['password']);
        $user->merchant_id = $merchant->id;
        $user->phone_number = $toValidate['merchant_phone'];
        $user->status = 1;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->confirmed = 1;

        $user->save();
        $user->roles()->attach(3);


        // create token

        $http = new Client();

        $tokenresponse = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => env('token_client_id'),
                'client_secret' => env('token_client_secret'),
                'username' => $toValidate['email'],
                'password' => $toValidate['password'],
                'scope' => '',
            ],
        ]);

        $item['merchant_id'] = $merchant->id;

        $item['tokens'] = (string) $tokenresponse->getBody();

        $this->passwordGrantTokensRepository->create($item);

        // create service

        // Data
        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "Data",
            'service_type' => "Data",
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        // Bill
        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "1000",
            'service_type' => "Top Up",
            'amount' => 1000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "2000",
            'service_type' => "Top Up",
            'amount' => 2000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "3000",
            'service_type' => "Top Up",
            'amount' => 3000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "4000",
            'service_type' => "Top Up",
            'amount' => 4000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "5000",
            'service_type' => "Top Up",
            'amount' => 5000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "10000",
            'service_type' => "Top Up",
            'amount' => 10000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "20000",
            'service_type' => "Top Up",
            'amount' => 20000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        DB::table('services')->insert([
            'merchant_id' => $merchant->id,
            'service_name' => "30000",
            'service_type' => "Top Up",
            'amount' => 30000,
            'status' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);

        // response

        $encrypted_uuid = EncryptDecrypt::myEncrypt($uuid);
        $encrypted_token = EncryptDecrypt::myEncrypt($tokenresponse->getBody());

        $response['status'] = 'success';
        $response['description'] = 'User created successfully!';
        $response['uuid'] = $encrypted_uuid;
        $response['token'] = $encrypted_token;

        return response()->json($response, 201);
    }

    public function update(Request $request)
    {

        $validate = validator($request->all(), [
            'username' => 'required|max:191|min:6',
            'email' => 'required|email',
            'phone' => 'required|digits_between:9,12',
            'address' => 'required',
        ]);

        if ($validate->fails()) {

            $response['status'] = 'fail';
            $response['result_code'] = 'RC003';
            $response['description'] = 'Invalid input parameter(s)!';
            $response['error'] = '';
            $error = array();
            foreach ($validate->errors()->getMessages() as $key => $value) {
                $error[$key] = $value[0];
            }
            $response['error'] = $error;
            return response()->json($response, 400);
        }

        $email = $request->email;
        $checkEmail = User::where('email', $email)->get();


        if (count($checkEmail) > 0) {
            $username = $request->username;
            $address = $request->address;
            $phone = $request->phone;

            DB::table('users')
                ->where('email', $email)
                ->update(['name' => $username, 'updated_at' => date("Y-m-d h:i:s")]);

            DB::table('merchants')
                ->where('email', $email)
                ->update(['address' => $address, 'phone' => $phone, 'updated_at' => date("Y-m-d h:i:s")]);

            $response['status'] = 'success';
            $response['description'] = 'Successfully!';
            return response()->json($response, 200);
        } else {
            $response['status'] = 'fail';
            $response['description'] = 'Bad Request!';
            return response()->json($response, 400);
        }
    }
}
