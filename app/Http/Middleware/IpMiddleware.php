<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
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
    //'127.0.0.1',
    //'139.59.113.99', excel Top-up
    //'18.140.39.130',
    //'103.105.175.238',
    //'157.230.250.231',
    //'185.133.214.226',
    //'206.189.37.44',
    //'43.242.135.210', office IP
    //'43.242.135.218',
    //'157.230.37.85',
    //'167.71.216.40',
    //'49.229.107.242',
    //'110.170.187.242',
    //'52.230.82.155',
    //'40.65.128.76',
    //'13.76.81.11',
    //'178.128.211.62', new excel Top-up IP
    $ipAddresses = [
        '178.128.211.62',
        '43.242.135.210'
    ];

    if (!in_array($request->ip(), $ipAddresses)) {

      \Log::error('IP address is not whitelisted', ['ip address', $request->ip()]);

      return redirect('/');
    }

    return $next($request);
  }
}
