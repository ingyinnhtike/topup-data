<?php

namespace App\Http\Middleware;

use Closure;

class CheckTokenRequestApiKey
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
        if ($request->headers->has('Authorization')) {
            return $next($request);
        } else {
            $response = [
                'status' => 'unauthorized',
                'result_code' => 'RC002',
                'description' => "Authentication fails!"
            ];

            return response()->json($response, 401);
        }
    }
}
