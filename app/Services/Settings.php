<?php

namespace App\Services;

use App\Settings\BlogSettings;

/**
 * Abstraction of settings class.
 * 
 * Called throughout but see Blog service.
 * 
 * Here we use Spatie settings, but if you're using Laravel Nova you might be using something else
 */
class Settings
{   
    public static function enableBreadcrumbs() {
        return app(BlogSettings::class)->enable_breadcrumbs;
    }

    public static function blogTitle() {
        return app(BlogSettings::class)->title;
    }    

    public static function blogSubtitle() {
        return app(BlogSettings::class)->subtitle;
    }    
}
