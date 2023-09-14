<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const ACCOUNT = '/my-account';


    /**
     * The path to your application's admin "home" route.
     *
     * Typically, admins are redirected here after authentication.
     *
     * @var string
     */
    public const ADMIN = 'admin/redirect';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            /**
             * API Routes
             */
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            /**
             * Web Routes for Authentication
             */
            Route::middleware('web')
                ->group(base_path('routes/auth.php'));

            /**
             * Web Routes for Ecommerce
             */
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            /**
             * Web Routes Group for Admin
             */
            Route::name('admin.')->prefix(config('admin.route.prefix'))
                ->group(function () {
                    /**
                     * Web Routes for Admin Authentication
                     */
                    Route::middleware('web')->group(base_path('routes/admin/auth.php'));
                    /**
                     * Web Routes for Admin Portal
                     */
                    Route::middleware([
                        'web',
                        'auth:admin',
                        'verified:admin.verification.notice',
                        'password.confirm:admin.password.confirm'
                    ])->group(base_path('routes/admin/web.php'));
                });
        });
    }
}
