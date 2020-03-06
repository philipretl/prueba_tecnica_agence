<?php

namespace Modules\Consultor\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
use Modules\Consultor\Services\ConsultorService;

class ConsultorLogicProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    public function boot(){
      $this->app->bind(ConsultorServiceInterface::class,ConsultorService::class);
    }
}
