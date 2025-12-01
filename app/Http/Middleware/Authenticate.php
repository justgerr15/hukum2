<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        return route('login') . '?session=expired&message=Session%20Anda%20telah%20habis,%20silahkan%20login%20kembali';
    }
}


    
}
