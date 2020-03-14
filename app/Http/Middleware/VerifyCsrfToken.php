<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1:8000/main/checklogin',
        'http://127.0.0.1:8000/register2',
        'http://127.0.0.1:8000/update',
        'http://127.0.0.1:8000/main/comment',
        'http://127.0.0.1:8000/main/search'
    ];
}
