<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/player/*',
	    '/get-all-games',
	    '/games',
	    '/lpspayment',
        '/trustly-deposit',
        '/games/get-iframe-url',
        '/games/add-to-fav',
        '/games/get-by-ids',
        '/games/get-fav',
        '/games/del-from-fav',
        '/affiliates/get-players-data',
        '/affiliates/get-transactions-data',
        '/live-chat/create-ticket'
    ];
}
