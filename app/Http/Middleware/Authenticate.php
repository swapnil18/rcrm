<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
        try {
            $authorization = $request->header('authorization');
            $removedBererArr = explode(' ', $authorization);
            $token = '';
            if(count($removedBererArr) > 1) {
                $token = $removedBererArr[1];
            } else {
                $token = $removedBererArr[0];
            }
            if(empty($token)) {
                throw new Exception("Please provide token!", 1);               
            }

            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'Provided token is expired.'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }

        $user = \App\Models\Users::where('is_active', '=', 1 )->where('user_token', '=', $token )->find($credentials->sub);

        if (!$user) {
            return response([
                'error' => 'You are not authorized user'
            ], 401);
        }

        return $next($request);
    }
}
