<?php

namespace Alvarofpp\ReactComponent;

use Illuminate\Support\ServiceProvider;
use Alvarofpp\ReactComponent\Commands\MakeComponentCommand;

class ReactComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeComponentCommand::class,
            ]);
        }
    }
}
