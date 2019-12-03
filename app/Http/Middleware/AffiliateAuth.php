<?php

namespace App\Http\Middleware;

use Closure;

class AffiliateAuth
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
        $url = $request->url();

        if (strstr($request->url(), 'affiliates')) {
            if ($this->checkAffiliatesCredentials($request)) {
                return $next($request);
            } else {
                return response()->json(['status' => '0', 'message' => 'invalid credentials'], 401);
            }
        } else {
            return $next($request);
        }

    }

    public function checkAffiliatesCredentials($request) {

        if (!$request->has('login') || !$request->has('password')) {
            return false;
        }

        if ($request->input('login') != env('AFFILIATES_API_LOGIN')) {
            return false;
        }

        if (md5($request->input('password')) != env('AFFILIATES_API_PASSWORD')) {
            return false;
        }

        return true;
    }
}
