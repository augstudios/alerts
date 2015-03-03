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
        // config
        $this->publishes([
            __DIR__ . '/../../config/alerts.php' => config_path('augstudios/alerts.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/alerts.php', 'augstudios/alerts'
        );

        // views
        $this->loadViewsFrom(__DIR__ . '/../../views', 'alerts');
        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/alerts'),
        ]);
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
