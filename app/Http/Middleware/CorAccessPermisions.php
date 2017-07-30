<?php

namespace App\Http\Middleware;

use Closure;

class CorAccessPermisions
{
    /**
     * Cor Access Permissions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        } else {
            $response = $next($request);
        }

        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Authorization, Content-Type');
        $response->header('Access-Control-Allow-Origin', '*');

        return $response;
    }
}
