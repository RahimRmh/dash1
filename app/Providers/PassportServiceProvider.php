<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class PassportServiceProvider extends ServiceProvider
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
        $privateKey = env('PASSPORT_PRIVATE_KEY');
        $publicKey = env('PASSPORT_PUBLIC_KEY');

        if ($privateKey && $publicKey) {
            // Temporarily write keys to storage to satisfy Passport
            file_put_contents(storage_path('oauth-private.key'), $privateKey);
            file_put_contents(storage_path('oauth-public.key'), $publicKey);

            Passport::loadKeysFrom(storage_path());
        } else {
            throw new \Exception('Passport keys are not set in the environment variables');
        }
    }
}
