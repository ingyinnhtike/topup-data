<?php

namespace App\Http\Middleware;

use App\Models\Setting\Language\Language;
use Closure;
use Carbon\Carbon;

/**
 * Class LocaleMiddleware.
 */
class LocaleMiddleware
{
    /**
     * @var \App\Models\Setting\Language\Language
     */
    private $language = null;

    /**
     * LocaleMiddleware constructor.
     * @param \App\Models\Setting\Language\Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language->where('locale_code' , session()->get('locale'))->first();
        //var_dump($this->language->count());        
        //exit();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Locale is enabled and allowed to be changed
         */
        if (config('locale.status')) {
//            if (session()->has('locale') && ( count($this->language) > 0 ) && in_array(session()->get('locale'), array_keys(config('locale.languages')))) {
            if (session()->has('locale') && ( $this->language->count() > 0 ) ) {

                /*
                 * Set the Laravel locale
                 */
                app()->setLocale(session()->get('locale'));

                /*
                 * setLocale for php. Enables ->formatLocalized() with localized values for dates
                 */
//                setlocale(LC_TIME, config('locale.languages')[session()->get('locale')][1]);
                setlocale(LC_TIME, $this->language->php_locale_code );
                /*
                 * setLocale to use Carbon source locales. Enables diffForHumans() localized
                 */
//                Carbon::setLocale(config('locale.languages')[session()->get('locale')][0]);
                Carbon::setLocale($this->language->locale_code);
                /*
                 * Set the session variable for whether or not the app is using RTL support
                 * for the current language being selected
                 * For use in the blade directive in BladeServiceProvider
                 */
//                if (config('locale.languages')[session()->get('locale')][2]) {
//                    session(['lang-rtl' => true]);
//                } else {
//                    session()->forget('lang-rtl');
//                }

                if ($this->language->rtl) {
                    session(['lang-rtl' => true]);
                } else {
                    session()->forget('lang-rtl');
                }
            }
        }

        return $next($request);
    }
}
