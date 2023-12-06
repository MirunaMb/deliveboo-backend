<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => '5x9rn3djbwdrpzhk',
                'publicKey' => '7wyt3xnbf4y4r4hk',
                'privateKey' => '337a13eb3cd72aed368bd3493a0cb62d'
            ]);
        });
    }
}
