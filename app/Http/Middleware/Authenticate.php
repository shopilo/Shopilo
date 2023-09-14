<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        /**
         * Check if the request is coming from admin route, if so, redirect to admin login page.
         * Otherwise, redirect to user login page. Also, check if the request is expecting json response,
         * if so, return null.
         */
        $adminPrefix = config('admin.route.prefix');
        if (str_starts_with($request->path(), $adminPrefix)) {
            return $request->expectsJson() ? null : route('admin.login');
        }
        return $request->expectsJson() ? null : route('login');
    }
}
