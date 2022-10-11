<?php

namespace App\Services;

use Diglactic\Breadcrumbs\Breadcrumbs;

class Blog
{    
    public static function enableBreadcrumbs() {
        if (Settings::enableBreadcrumbs()) {
            return true;
        }
    }
    public static function title() {
        return Settings::blogTitle();
    }

    public static function subtitle() {
        return Settings::blogSubtitle();
    }
}
