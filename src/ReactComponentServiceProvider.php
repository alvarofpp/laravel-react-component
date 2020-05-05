<?php

namespace ReactComponent;

use ReactComponent\Commands\MakeComponentCommand;
use Illuminate\Support\ServiceProvider;

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
