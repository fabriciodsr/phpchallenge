<?php

namespace PHPChallenge\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();

        $this->app->bind(\PHPChallenge\Domain\Interfaces\Repositories\IPersonRepository::class, function($app) {
            return new \PHPChallenge\Infrastructure\Repositories\PersonRepository(
                $app['em'],
                $app['em']->getClassMetaData(\PHPChallenge\Domain\Entities\Person::class)
            );
        });

        $this->app->bind(\PHPChallenge\Domain\Interfaces\Repositories\IShipOrderRepository::class, function($app) {
            return new \PHPChallenge\Infrastructure\Repositories\ShipOrderRepository(
                $app['em'],
                $app['em']->getClassMetaData(\PHPChallenge\Domain\Entities\ShipOrder::class)
            );
        });

        $this->app->bind(\PHPChallenge\Domain\Interfaces\Repositories\IPersonPhoneRepository::class, function($app) {
            return new \PHPChallenge\Infrastructure\Repositories\PersonPhoneRepository(
                $app['em'],
                $app['em']->getClassMetaData(\PHPChallenge\Domain\Entities\PersonPhone::class)
            );
        });

        $this->app->bind(\PHPChallenge\Domain\Interfaces\Repositories\IShipOrderItemRepository::class, function($app) {
            return new \PHPChallenge\Infrastructure\Repositories\ShipOrderItemRepository(
                $app['em'],
                $app['em']->getClassMetaData(\PHPChallenge\Domain\Entities\ShipOrderItem::class)
            );
        });

        $this->app->bind(\PHPChallenge\Domain\Interfaces\Repositories\IShipOrderShipToRepository::class, function($app) {
            return new \PHPChallenge\Infrastructure\Repositories\ShipOrderShipToRepository(
                $app['em'],
                $app['em']->getClassMetaData(\PHPChallenge\Domain\Entities\ShipOrderShipTo::class)
            );
        });
    }
}
