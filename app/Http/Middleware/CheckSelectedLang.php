<?php

namespace App\Http\Middleware;

use Closure;

class CheckSelectedLang
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
//        dd($_COOKIE);
//        if (isset($_COOKIE['locale']) && $_COOKIE['locale'] != '') {
            return $next($request);
//            return $this->index($request);
//        } else {
//            return (new \App\Http\Controllers\HomeController())->index($request);
//        }

    }
}
