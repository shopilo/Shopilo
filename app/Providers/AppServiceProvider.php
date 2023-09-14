<?php

namespace App\Providers;

use App\Libraries\AdminMenu\AdminMenuCollection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        (new \AdminMenu('admin'))->register(new AdminMenuCollection(
            route: 'admin.dashboard',
            route_params: [],
            label: __('Dashboard'),
            icon: 'ri-dashboard-2-line',
        ));

        View::share(
            'shopilo_copyright',
            __(
                'Copyright &copy; :date | :appName | All rights reserved. Crafted with :heart by :provider',
                [
                    'date' => date('Y'),
                    'appName' => config('app.name'),
                    'heart' => '<i class="mdi mdi-heart text-danger"></i>',
                    'provider' => 'Shopilo'
                ]
            )
        );
    }
}
