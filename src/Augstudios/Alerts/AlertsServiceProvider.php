<?php

namespace Augstudios\Alerts;

use Illuminate\Support\ServiceProvider;

class AlertsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // events later???
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // tell IoC which class to use by default for AlertsStore interface
        $this->app->bind('Augstudios\Alerts\AlertsStore', 'Augstudios\Alerts\SessionAlertsStore');

        // register singleton (we only need once instance)
        $this->app->singleton('alerts', function () {
            return $this->app->make('Augstudios\Alerts\Alerts');
        });
    }

}
