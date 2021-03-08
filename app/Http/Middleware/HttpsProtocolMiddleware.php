<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocolMiddleware
{
    public function handle($request, Closure $next)
    {
    	
        $is_secure = $request->secure();

        if (!($is_secure) && app()->environment() === 'prod') {        		
        	return response([
                'error' => 'You are not authorized user, only https url is allowed!'
            ], 401);
        }

        return $next($request);
    }
}