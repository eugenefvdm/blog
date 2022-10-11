<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BlogSettings extends Settings
{
    public string $title;
    public string $subtitle;
    public $enable_breadcrumbs;
            
    public static function group(): string
    {
        return 'blog';
    }
}