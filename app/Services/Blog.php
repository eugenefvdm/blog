<?php

namespace App\Services;

class Blog
{
    public static function copyright()
    {
        return Settings::copyright();
    }

    public static function enableBreadcrumbs()
    {
        if (Settings::enableBreadcrumbs()) {
            return true;
        }
    }

    public static function title()
    {
        return Settings::blogTitle();
    }

    public static function twitterUsername()
    {
        if (Settings::twitterUsername()) {
            return 'https://twitter.com/' . Settings::twitterUsername();
        }
    }

    public static function subtitle()
    {
        return Settings::blogSubtitle();
    }
}
