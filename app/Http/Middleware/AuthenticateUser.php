<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Helper\ResponseHelper;

class AuthenticateUser
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

        $payload = ResponseHelper::prepareResponsePayload(401,
           'You are not authorised to use this resource');

        $header = $request->header('Authorization');

        if(!$header || !$user = User::where('access_token', $header)->first()){
            return response()->json($payload);
        }

        $request->request->add(['user_id' => $user->id]);

        return $next($request);
    }
}
