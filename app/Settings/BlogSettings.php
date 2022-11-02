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

    public bool $enable_rss; // TODO implement

    public ?string $small_footer;

    public string $home_page_layout;

    public string $rectangle_image_x_size;

    public string $rectangle_image_y_size;

    public string $square_image_size;

    public ?string $contact_email;

    public bool $show_contact_email;

    public ?string $contact_number;

    public static function group(): string
    {
        return 'blog';
    }
}
