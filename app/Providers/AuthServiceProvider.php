<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

 // Use environment variables for Passport keys
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

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));    }
}
