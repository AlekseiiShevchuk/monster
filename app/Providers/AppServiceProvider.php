<?php

namespace App\Providers;

use App\Body;
use App\Hair;
use App\Mask;
use App\Observers\BodyObserver;
use App\Observers\HairObserver;
use App\Observers\MaskObserver;
use App\Observers\SuitObserver;
use App\Observers\UserObserver;
use App\Suit;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Body::observe(BodyObserver::class);
        Suit::observe(SuitObserver::class);
        Hair::observe(HairObserver::class);
        Mask::observe(MaskObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
