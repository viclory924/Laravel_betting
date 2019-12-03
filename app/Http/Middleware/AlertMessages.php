<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AlertMessages
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
//		$request_uri = $request->getRequestUri();
//		$request_uri = parse_url($request_uri);
//		if (isset($request_uri['query'])) {
//			parse_str($request_uri['query'], $params);
//			if (isset($params['type']) && isset($params['message'])) {
//				$request->session()->put($params['type'], $params['message']);
////			dd($request->session()->get($params['type']));
//			}
//		} else {
//			dd($request->session()->has($params['type']));
//			if ($request->session()->has($params['type'])) {
//				$request->session()->remove($params['type']);
//			}
//		}



		return $next($request);
	}
}
