<?php

namespace App\Services;

use App\Settings\BlogSettings;

class Blog
{
    /**
     * Here we use Spatie settings, but if you're using Laravel Nova you might be using something else
     */
    public static function name() {
        return app(BlogSettings::class)->site_name;
    }    
}
