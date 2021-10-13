<?php

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */


/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {

    include_route_files(__DIR__ . '/frontend/');

});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin/0xBd86', 'as' => 'admin.', 'middleware' => 'ipcheck'], function () {

    // Auth::routes();
    Auth::routes([
        'register' => false
    ]);

    Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

   Route::group(['middleware' => 'two_factor'], function () {
       include_route_files(__DIR__ . '/backend');
   });

    // include_route_files(__DIR__ . '/backend');

    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        /*
         * These routes require no user to be logged in
         */
        Route::group(['middleware' => 'auth'], function () {
            Route::get('logout', 'LoginController@logout')->name('logout');

            //For when admin is logged in as user from backend
            Route::get('logout-as', 'LoginController@logoutAs')->name('logout-as');
        });

        Route::group(['middleware' => 'guest'], function () {


            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');

        });
    });

    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */

});

Route::get('/create-table', 'TableController@operate');

Route::get('email', function () {
    $objDemo = new \stdClass();
    $objDemo->demo_one = 'Demo One Value';
    $objDemo->demo_two = 'Demo Two Value';
    $objDemo->sender = 'Blue Planet Team';
    $objDemo->receiver = 'Peter';
    $objDemo->message = 'Peter';

    dump(Mail::to("mon.wms@blueplanet.com.mm")->send(new \App\Mail\SendMail($objDemo)));

});

Route::any('redirectjson', function (Request $request) {

    // $input = file_get_contents("php://input");
    $input = $request->all();
    \Illuminate\Support\Facades\Log::debug($input);

});

Route::group(['middleware' => 'ipcheck'], function () {

Route::get('2fa', 'Backend\TwoFactorController@showTwoFactorForm')->name('2fa');

Route::post('2fa', 'Backend\TwoFactorController@verifyTwoFactor')->name('2fa');

});
