<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class APIToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header(config('sanctum.api_auth_key'));
        if (empty($key))
        {
            throw new UnauthorizedHttpException('Guard', 'The supplied API KEY is missing or an invalid authorization header was sent');
        }

        if(last(request()->segments()) == 'login'){
            $portal = $request->header('X-FROM');
            if (empty($portal))
            {
                throw new UnauthorizedHttpException('Guard', 'The request is invalid!');
            }

            if (isset($portal) AND ($portal != 'DO' AND $portal != 'P' AND $portal != 'SCREENER'))
            {
                throw new UnauthorizedHttpException('Guard', 'The request is invalid!');
            }
        }

        $secret = config('sanctum.api_auth_secret_key');
        JWT::$leeway = 60;

        $decodedData = JWT::decode($key, new Key($secret, 'HS256'));
        if($decodedData->url != $request->url())
        {
            throw new UnauthorizedHttpException('Guard', 'The supplied API KEY is missing or an invalid authorization header was sent');
        }
        return $next($request);
    }
}
