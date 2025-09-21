<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\RelatedSite;
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
        $get_settings=Setting::firstOr(function () {
            return Setting::create([
                'site_name' => 'News',
                'site_logo' => '/logo.png',
                'site_favicon' => null,
                'contact_email' => config('mail.from.address', 'admin@example.com'),
                'facebook_url' => 'https://www.facebook.com/',
                'twitter_url' => 'https://x.com/',
                'instagram_url' => 'https://www.instagram.com/',
                'phone_number' => '01157854510',
                'country' => 'Egypt',
                'city' => 'Cairo',
                'street' => 'Mohamed V, Agadir, Morocco',
            ]);
        });
        $related_sites = RelatedSite::all();
        $categories = Category::select('id', 'name','slug')->get();
        view()->share([
            'get_settings'=> $get_settings, 'related_sites'=>$related_sites,'categories'=>$categories,
        ]);//share multiple data to all views
    }
}
