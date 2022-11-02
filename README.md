## Blog

A generic blog platform based on Laravel and Filamentphp.

Demo:

https://eugene.fintechsystems.net

## Features

- Beautiful and fast admin panel
- SEO friendly
-- Pages are highly optimized for speed and SEO integration
- Sitemap
- RSS Feeds
- Easily activate Google Analytics and Google Search Console
- Choose between Default blog style and grid (Instagram style) layouts

## Google Analytics

### Activating Google Analytics

Follow this guide to obtain analytics credentials:

https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics

Next, create a Google Analytics UA property and then and then add the GA- setting in the admin panel.

### Activating Google Search Console

Once you have added the GA- code proceed to Google Search Console which will automatically detect ownership.

## Sitemap

The sitemap is available at /sitemap.xml

## Feeds

The feeds are available at /feed

## Blog Posts

Please note when creating Blog posts, the `excerpt` field is required.

This is to satisfy both design and feed requirements. 

## Adding new settings

1. Look for App\Settings\BlogSettings::class and add the public variable.
    Note: In above file, use `public ?string $google_analytics_tag;` if something is optional
2. Then look for App\Filament\Pages\Settings to add the form fields.
3. Then add a migration to \app\database\settings (create_blog_settings.php)
4. For additional abstraction, add to \Services\Settings

## PHP Requirements

sudo apt install php8.1-gmp

## Changelog

See CHANGELOG.md for recent chances.
