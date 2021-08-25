<?php

namespace App\Providers;

use App\Models\Courier;
use App\Models\User;
use App\Observers\CourierObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        \Carbon\Carbon::setlocale(LC_TIME, config('app.locale'));
        $charts->register([
            \App\Charts\Admin\Couriers\Daily::class,
            \App\Charts\Admin\Couriers\Weekly::class
        ]);
        User::observe(UserObserver::class);
        Courier::observe(CourierObserver::class);
    }
}
