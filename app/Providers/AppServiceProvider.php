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
use Illuminate\Support\Collection;
use App\Observers\CiudadaniaObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

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

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });        
    }
}
