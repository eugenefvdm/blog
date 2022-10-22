<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BlogSettings extends Settings
{
    public string $title;
    public string $subtitle;
    public ?string $google_analytics_tag;    
    public ?string $twitter_username;        
    public bool $enable_breadcrumbs;
    public bool $enable_rss;    
    public string $small_footer;
                            
    public static function group(): string
    {
        return 'blog';
    }
}