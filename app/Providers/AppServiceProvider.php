<?php

namespace App\Providers;

use App\Events\CustomerProfileCreated;
use Dedoc\Scramble\Scramble;
use Gate;

use App\Models\{
    Notification,
    Order,
    OrderLocation,
    OrderLocationProduct,
    Profile,
    Transaction,
    User
};
use App\Observers\{
    NotificationObserver,
    OrderLocationObserver,
    OrderLocationProductObserver,
    OrderObserver,
    ProfileObserver,
    TransactionObserver
};
use Dedoc\Scramble\Support\Generator\{
    OpenApi,
    SecurityScheme
};
use Illuminate\Support\{
    Facades\Event,
    ServiceProvider
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('viewPulse', function (User $user) {
            return $user;
        });

        //Observers
        Profile::observe(ProfileObserver::class);
        Transaction::observe(TransactionObserver::class);
        Order::observe(OrderObserver::class);
        OrderLocation::observe(OrderLocationObserver::class);
        OrderLocationProduct::observe(OrderLocationProductObserver::class);
        Notification::observe(NotificationObserver::class);

        //Listeners
        // Event::listen(events, listener, priority);

        //documentaão api
        Scramble::extendOpenApi(function (OpenApi $openApi) {
            $openApi->secure(
                SecurityScheme::http('bearer', 'JWT')
            );
        });
    }
}
