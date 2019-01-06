<?php

namespace Modules\Appointment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Appointment\Events\Handlers\RegisterAppointmentSidebar;

class AppointmentServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('appointment', RegisterAppointmentSidebar::class)
        );

        $this->app->extend('asgard.ModulesList', function($app) {
            array_push($app, 'appointment');
            return $app;
        });
    }

    public function boot()
    {
        $this->publishConfig('appointment', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Appointment\Repositories\AppointmentRepository',
            function () {
                $repository = new \Modules\Appointment\Repositories\Eloquent\EloquentAppointmentRepository(new \Modules\Appointment\Entities\Appointment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Appointment\Repositories\Cache\CacheAppointmentDecorator($repository);
            }
        );
// add bindings

    }
}
