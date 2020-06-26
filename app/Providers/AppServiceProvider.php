<?php

namespace App\Providers;

use App\Area;
use App\Fase;
use App\Sede;
use App\Urbe;
use App\User;
use App\Carga;
use App\Cargo;
use App\Grado;
use App\Socio;
use App\Comuna;
use App\Titulo;
use App\Estudio;
use App\Ciudadania;
use App\Parentesco;
use App\Establecimiento;
use App\Observers\AreaObserver;
use App\Observers\FaseObserver;
use App\Observers\SedeObserver;
use App\Observers\UrbeObserver;
use App\Observers\UserObserver;
use App\Observers\CargaObserver;
use App\Observers\CargoObserver;
use App\Observers\GradoObserver;
use App\Observers\SocioObserver;
use App\Observers\ComunaObserver;
use App\Observers\TituloObserver;
use App\Observers\EstudioObserver;
use Illuminate\Support\Collection;
use App\Observers\CiudadaniaObserver;
use App\Observers\ParentescoObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\EstablecimientoObserver;
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
        Carga::observe(CargaObserver::class);
        Parentesco::observe(ParentescoObserver::class);
        Estudio::observe(EstudioObserver::class);
        Grado::observe(GradoObserver::class);
        Establecimiento::observe(EstablecimientoObserver::class);
        Fase::observe(FaseObserver::class);
        Titulo::observe(TituloObserver::class);

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
