<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('everest-admin/*')) {
                return route('admin.getLogin');
            } else if ($request->is('everest-admin')) {
                return route('admin.getLogin');
            } else {
                return route('login');
            }
        } else {
            return route('home');
        }
    }
}
