<?php

namespace App\Providers;

use App\Models\Client\Contact\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Request $request
     * @return void
     */
    public function boot(Request $request)
    {
        $this->registerCustomValidations($request);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * @param Request $request
     */
    public function registerCustomValidations(Request $request)
    {
        Validator::extend('contact', function ($attribute, $value, $parameters, $validator) use ($request) {
            $phone = $value;
            $phone += $request->input('blue_planet_phone');
            return $phone > 0;
        });

        Validator::extend('check_contacts', function ($attribute, $value, $parameters, $validator) use ($request) {
            return $value > Contact::company()->count() ? false : true;
        });

        Validator::extend('check_sms', function ($attribute, $value, $parameters, $validator) use ($request) {
            $available = availableSmsCredits();
            $phone = intval($request->input('blue_planet_phone')) + intval($request->input('no_of_contact')) ;
            return $value * $phone > $available ? false : true;
        });

        Validator::extend('check_sms_schedule', function ($attribute, $value, $parameters, $validator) use ($request) {
            $available = availableSmsCredits();
            return $value  > $available ? false : true;
        });
    }
}
