<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use League\OAuth2\Server\CryptKey;

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
            $privateKeyPath = 'file://' . storage_path('oauth-private.key');
            $publicKeyPath = 'file://' . storage_path('oauth-public.key');

            Passport::loadKeysFrom([
                'private_key' => new CryptKey($privateKeyPath, null, false),
                'public_key' => new CryptKey($publicKeyPath, null, false),
            ]);

            // Alternatively, you could directly override the private and public key methods if needed
            Passport::keyPath($privateKey, $publicKey);
        } else {
            throw new \Exception('Passport keys are not set in the environment variables');
        }
    }
}
