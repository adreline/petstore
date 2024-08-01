<?php

namespace App\Providers;

use App\PetApiLib\Api\PetApi;
use Illuminate\Support\ServiceProvider;
use App\PetApiLib\Configuration;
use GuzzleHttp\Client as HttpClient;

class PetApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register the external REST API client as a singleton
        $this->app->singleton(PetApi::class, function ($app) {
            $config = Configuration::getDefaultConfiguration()->setAccessToken('special-key');
            return new PetApi(
                new HttpClient(),
                $config
            );
        });
    }
}