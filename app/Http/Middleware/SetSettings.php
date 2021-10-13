<?php

namespace App\Http\Middleware;

use Closure;
use Settings;

class SetSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $theme = '';

        if (!session()->get('locale')){
            session()->put('locale', Settings::get('app_locale'));
        }

        if (is_array(Settings::get('backend_layout'))){
            foreach (Settings::get('backend_layout') as $value){
                $theme .= ' '.$value;
            }
        }else{
            $theme = Settings::get('backend_layout');
        }

        /**
         *  General Setting
         */
        config(['app.name' => Settings::get('app_name')]);
        config(['app.timezone' => Settings::get('app_timezone') ]);
        config(['backend.theme' => Settings::get('backend_theme')]);
        config(['backend.layout' => $theme ]);
        config(['analytics.google-analytics' => Settings::get('google_analytics')]);

        /**
         *  Mail Setting
         */
        config(['mail.driver' => Settings::get('mail_driver')]);
        config(['mail.host' => Settings::get('mail_host')]);
        config(['mail.port' => Settings::get('mail_port')]);
        config(['mail.username' => Settings::get('mail_username')]);
        config(['mail.password' => Settings::get('mail_password')]);
        config(['mail.encryption' => Settings::get('mail_encryption')]);

        config(['mail.from.name' => Settings::get('mail_from_name')]);
        config(['mail.from.address' => Settings::get('mail_from_address')]);

        config(['services.mailgun.domain' => Settings::get('services_mailgun_domain')]);
        config(['services.mailgun.secret' => Settings::get('services_mailgun_secret')]);
        config(['services.mandrill.secret' => Settings::get('services_mandrill_secret')]);

        /**
         *  User Setting
         */
        config(['client-access.users.registration' => Settings::get('access_users_registration') === 'true' ? true : false ]);
        config(['client-access.users.confirm_email' => Settings::get('access_users_confirm_email') === 'true' ? true : false ]);
        config(['client-access.users.change_email' => Settings::get('access_users_change_email') === 'true' ? true : false ]);
        config(['client-access.captcha.registration' => Settings::get('access_captcha_registration') === 'true' ? true : false ]);

        /**
         *  Broadcasting Setting
         */
        config(['broadcasting.default' => Settings::get('broadcasting_default')]);
        config(['broadcasting.connections.pusher.key' => Settings::get('broadcasting_connections_pusher_key')]);
        config(['broadcasting.connections.pusher.secret' => Settings::get('broadcasting_connections_pusher_secret')]);
        config(['broadcasting.connections.pusher.app_id' => Settings::get('broadcasting_connections_pusher_app_id')]);
        config(['broadcasting.connections.pusher.options.cluster' => Settings::get('broadcasting_connections_pusher_cluster')]);
        config(['broadcasting.connections.pusher.options.encrypted' => Settings::get('broadcasting_connections_pusher_encrypted') === 'true' ? true : false]);

        /**
         *  Cache Setting
         */
        config(['cache.default' => Settings::get('cache_default' , 'file')]);
        config(['cache.stores.memcached.persistent_id' => Settings::get('cache_stores_memcached_persistent_id')]);
        config(['cache.stores.memcached.sasl' => [
            Settings::get('cache_stores_memcached_sasl_username'),
            Settings::get('cache_stores_memcached_sasl_password')
        ]]);
        config(['cache.stores.memcached.servers.host' => Settings::get('cache_stores_memcached_servers_host' , '127.0.0.1')]);
        config(['cache.stores.memcached.servers.port' => Settings::get('cache_stores_memcached_servers_port' , 11211)]);

        /**
         *  No-Captcha Setting
         */
        config(['no-captcha.secret' => Settings::get('no-captcha_secret' , 'no-captcha-secret')]);
        config(['no-captcha.sitekey' => Settings::get('no-captcha_sitekey' , 'no-captcha-sitekey')]);

        return $next($request);
    }
}
