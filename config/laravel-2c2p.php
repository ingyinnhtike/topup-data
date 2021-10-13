<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 8/1/17
 * Time: 3:21 PM
 */

return [
    'merchant_id' => env('merchant_id'),
    'secret_key' => env('secret_key'),

    'private_key_pass' => 'C9p5au8naa',
    'private_key_path' => storage_path('cert/private.pem'),
    'public_key_path' => storage_path('cert/public.crt'),

    'redirect_access_url' => env('redirect_access_url'),

    'access_url' => 'https://s.2c2p.com/SecurePayment/PaymentAuth.aspx',
    'secure_pay_script' => 'https://t.2c2p.com/SecurePayment/api/my2c2p.1.6.9.min.js',

    'currency_code' => 104, // Ref: http://en.wikipedia.org/wiki/ISO_4217
    'country_code' => 'MMR',

    '123_merchant_id' => '104104000000139',
    '123_api_secret_key' => 'Q6CN9OYMX33LTC71BS95W96V0ZAAHXE6',
    '123_public_key_path' => storage_path('cert/123_p.cer'), // 123' Certificate file
    '123_currency_code' => 'MMK',
    '123_country_code' => 'MMR',
    '123_agent_code' => 'ABC',
    '123_channel_code' => 'OVERTHECOUNTER',
    '123_merchant_url' => env('123_merchant_url'),
    '123_api_call_url' => env('123_api_call_url'),
    '123_access_url' => 'https://123mm.2c2p.com/Payment/Pay/Slip',

    'direct_api' => 'https://t.2c2p.com/QuickPay/DirectAPI',
    'delivery_api' => 'https://t.2c2p.com/QuickPay/DeliveryAPI'
];
