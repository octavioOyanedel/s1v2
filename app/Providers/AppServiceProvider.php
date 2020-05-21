<?php

namespace App\Providers;

use App\Area;
use App\Sede;
use App\Urbe;
use App\User;
use App\Cargo;
use App\Socio;
use App\Comuna;
use App\Ciudadania;
use App\Observers\AreaObserver;
use App\Observers\SedeObserver;
use App\Observers\UrbeObserver;
use App\Observers\UserObserver;
use App\Observers\CargoObserver;
use App\Observers\SocioObserver;
use App\Observers\ComunaObserver;
use App\Observers\CiudadaniaObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
        Socio::observe(SocioObserver::class);
        Urbe::observe(UrbeObserver::class);
        Comuna::observe(ComunaObserver::class);
        Sede::observe(SedeObserver::class);
        Area::observe(AreaObserver::class);
        Cargo::observe(CargoObserver::class);
        Ciudadania::observe(CiudadaniaObserver::class);
    }
}
