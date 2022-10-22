## Blog

A blog platform based on Laravel and Filamentphp.

Demo:

https://eugene.fintechsystems.net

## Features

- SEO friendly
- Sitemap
- Easily activate Google Analytics and Google Search Console
- Beautiful admin panel based on Filamentphp
- RSS Feeds

## Google Analytics

Create a Google Analytics UA property and then and then add the GA- setting in the admin panel. Once you have added the GA- code proceed to Google Search Console which will automatically detect ownership.

## Sitemap

The sitemap is available at /sitemap.xml

## Feeds

The feeds are available at /feed

## Blog Posts

Please note when creating Blog posts, the excerpt field is required. This is to satisfy both design and feed requirements. 

## Adding new settings

- Look for App\Settings\BlogSettings::class and add the public variable.
    - In above file, use `public ?string $google_analytics_tag;` if something is optional
- Then look for App\Filament\Pages\Settings to add the form fields.
- Then add a migration to \app\database\settings

## PHP Requirements

sudo apt install php8.1-gmp

## Changelog

See CHANGELOG.md for recent chances.
