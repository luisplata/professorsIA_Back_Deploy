<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OpenAI\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return Client::factory()->make([
                'api_key' => env('OPENAI_API_KEY'),
            ]);
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
