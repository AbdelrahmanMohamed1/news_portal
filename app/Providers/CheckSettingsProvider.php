<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class CheckSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Setting::firstOr(function () {
            return Setting::create([
                'site_name' => 'News',
                'site_logo' => null,
                'site_favicon' => null,
                'contact_email' => config('mail.from.address', 'admin@example.com'),
                'facebook_url' => null,
                'twitter_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'phone_number' => null,
                'country' => null,
                'city' => null,
                'street' => 'Mohamed V, Agadir, Morocco',
            ]);
        });
    }
}
