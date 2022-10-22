## Blog

A blog platform based on Laravel and Filamentphp.

Demo:

https://eugene.fintechsystems.net

## Google Analytics

Install Google Analytics and configure the admin panel. Once you have the Google Analytics code proceed to activating Google Search Console.

## Sitemap

The sitemap is available at /sitemap.xml

## Adding new settings

- Look for App\Settings\BlogSettings::class and add the public variable.
    - In above file, use `public ?string $google_analytics_tag;` if something is optional
- Then look for App\Filament\Pages\Settings to add the form fields.
- Then add a migration to \app\database\settings

## PHP Requirements

sudo apt install php8.1-gmp

## Changelog

See CHANGELOG.md for recent chances.
