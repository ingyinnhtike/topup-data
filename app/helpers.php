<?php

use App\Helpers\General\HtmlHelper;
use Illuminate\Support\Str;

/*
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            } else {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('style')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    function style($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->style($url, $attributes, $secure);
    }
}

if (! function_exists('script')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    function script($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->script($url, $attributes, $secure);
    }
}

if (! function_exists('form_cancel')) {

    /**
     * @param        $cancel_to
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_cancel($cancel_to, $title, $classes = 'btn btn-danger btn-sm')
    {
        return resolve(HtmlHelper::class)->formCancel($cancel_to, $title, $classes);
    }
}

if (! function_exists('form_submit')) {

    /**
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_submit($title, $classes = 'btn btn-success btn-sm pull-right')
    {
        return resolve(HtmlHelper::class)->formSubmit($title, $classes);
    }
}

if (! function_exists('get_user_timezone')) {

    /**
     * @return string
     */
    function get_user_timezone()
    {
        if (auth()->user()) {
            return auth()->user()->timezone;
        }

        return 'UTC';
    }
}

if (!function_exists('parse_phone_number')) {

    /**
     * For International Number Parsing
     *
     * @param string $number
     * @return string
     */
    function parse_phone_number($number)
    {
        $prefix = substr($number, 0, 2);

        if ($prefix === '09') {
            return "959" . substr($number, 2, strlen($number));
        } elseif ($prefix === '+9') {
            return substr($number, 1, strlen($number));
        } else {
            return $number;
        }

    }
}

if (!function_exists('parse_phone_number2')) {

    /**
     * For International Number Parsing
     *
     * @param string $number
     * @return string
     */
    function parse_phone_number2($number)
    {
        $prefix = substr($number, 0, 2);

        if ($prefix === '95') {
            return "0" . substr($number, 2, strlen($number));
        } elseif ($prefix === '+9') {
            return "09" . substr($number, 2, strlen($number));
        } else {
            return $number;
        }

    }
}

if (!function_exists('prefix')) {

    /**
     * For International Number Parsing
     *
     * @param string $number
     * @return string
     */
    function prefix($callerid)
    {
        $prefix = substr($callerid, 3, 2);

        if ($prefix >= '74' && $prefix <= '79') {

            $operator = "telenor";

            return $operator;


        } elseif ($prefix >= '90' && $prefix <= '99') {

            if ($prefix == '93') {
                
                $operator = "MEC";

            } else {
                
                $operator = "ooredoo";
            }

            return $operator;

        } elseif ($prefix >= '30' && $prefix <= '39') {
            
            $operator = "MEC";

            return $operator;

        } elseif ($prefix >= '64' && $prefix <= '69') {
            
            $operator = "mytel";
            
            return $operator;

        } else {

            $operator = "MPT";

            return $operator;

        }

    }
}

if (! function_exists('generateOrderNumber')) {

    /**
     * @return string
     */
    function generateOrderNumber($prefix = null , $suffix = null) {
        $characters = config('order.characters');
        $mask = config('order.mask');
        $length = substr_count(config('order.mask'), '*');
        $promocode = '';
        $random = [];

        for ($i = 1; $i <= $length; $i++) {
            $character = $characters[rand(0, strlen($characters) - 1)];
            $random[] = $character;
        }

        shuffle($random);

        $promocode .= getPrefix($prefix);

        for ($i = 0; $i < count($random); $i++) {
            $mask = preg_replace('/\*/', $random[$i], $mask, 1);
        }

        $promocode .= $mask;
        $promocode .= getSuffix($suffix);

        return $promocode;
    }
}

/**
 * Generate prefix with separator for promocode.
 *
 * @param $prefix
 * @return string
 */
function getPrefix($prefix)
{
    return (bool) config('order.prefix') ? $prefix.config('order.separator') : '';
}

/**
 * Generate suffix with separator for promocode.
 *
 * @param $suffix
 * @return string
 */
function getSuffix($suffix)
{
    return (bool) config('order.suffix') ? config('order.separator').$suffix : '';
}

if (! function_exists('compute_hash')) {
    /*
     * hash value
     */
    function compute_hash($data)
    {

        $secret_key = config('laravel-2c2p.secret_key');

        $string = hash_hmac('sha1',$data, $secret_key,false);

        return $string;
    }
}
function amount($amount)
{
    $real_amount = sprintf('%.2f', $amount);
    $amount = str_replace('.', '', $real_amount);

    return str_pad($amount, 12, '0', STR_PAD_LEFT);
}

if (! function_exists('has_special_chars')) {
    /*
     * hash value
     */
    function has_special_chars($string)
    {
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=+]/', $string)){
            return 1;
        }else{
            return 0;
        }
    }
}

