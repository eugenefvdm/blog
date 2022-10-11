<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BlogSettings extends Settings
{
    public string $title;
    public string $subtitle;
    public $twitter_username;
    public $enable_breadcrumbs;
    public $enable_rss;    
    public string $copyright;    
            
    public static function group(): string
    {
        return 'blog';
    }
}