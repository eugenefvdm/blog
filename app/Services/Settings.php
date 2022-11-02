<?php

namespace App\Services;

use App\Settings\BlogSettings;

/**
 * Abstraction of settings class that's used throughout to refer to settings.
 *
 * Here we use Spatie settings, but if you're using Laravel Nova you might be using something else.
 */
class Settings
{
    public static function blogTitle()
    {
        return app(BlogSettings::class)->title;
    }

    public static function blogSubtitle()
    {
        return app(BlogSettings::class)->subtitle;
    }

    public static function enableBreadcrumbs()
    {
        return app(BlogSettings::class)->enable_breadcrumbs;
    }

    public static function googleTag()
    {
        return app(BlogSettings::class)->google_analytics_tag;
    }

    public static function homePageLayout()
    {
        return app(BlogSettings::class)->home_page_layout;
    }

    public static function small_footer()
    {
        return app(BlogSettings::class)->small_footer;
    }

    public static function twitterUsername()
    {
        return app(BlogSettings::class)->twitter_username;
    }
}
