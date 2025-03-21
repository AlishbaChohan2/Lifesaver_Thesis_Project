<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TwilioService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // public function register(): void
    // {
    //     //
    // }
   

    public function register()
    {
        // Bind the Twilio service to the container
        $this->app->singleton(TwilioService::class, function ($app) {
            return new TwilioService();
        });
    }

    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
