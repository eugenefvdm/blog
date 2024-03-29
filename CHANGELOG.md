# Changelog

All notable changes to `blog` will be documented in this file.

## v0.1.1 - 2023-07-09

- Add a Post Resource and a Post Collection to streamline retrieving JSON posts from the API
- Disabled 'data' tag on API in AppServiceProvider
- Disabled authenticated requirement for retrieving API data

## v0.1.0 - 10-03-2023

- Migrated images to Spatie Media Library to get responsive SEO tests working

## v0.0.5 - 05-03-2023

- Had an issue that the development version of the ecommerce gateway was referred to in Composer
- Updated composer, and to get the ecommerce library working update collission to version ^7.0 from ^6.3
- Add shopping cart style favicons
- Add missing Filament editing code for featured image alt tag and wire to front-end
- Add dashboard re-arrange and disable text in readme
- Some improvements in accessibility as gauged from PageSpeed Insights. Button `aria-label` and a href link text using `title`

## v0.0.4 - 21-02-2023

- Added an `api/articles` API route and activated Jetstream API tokens. You can now generate an API token and call the articles Sanctum route and get a list of articles.

## v0.0.3 - 10-11-2022

- First beta release
- Added workflows for dependabot, fix code style and update changelog
- All pages will not adopt some kind of SEO
- Page specific SEO will look like this: @include('layouts.seo')
- Tags are displayed
- Featured images are now automatically converted to 640x480 and webp
- Users can store their twitter handles and this will be output in Twitter card meta for SEO
- The category and tag pages are using the SEO helper
- Timezone was adjusted
- Added backup system
- There is now a file system for the blog
- Added a contact page
- Ability to specify grid as a layout
- Ability to specify other dimensions apart from 640x480 for images
- Converted logo to .webp
- Removed dedicated Google Analytics dashboard and added a few to the main one
- Added ability to select between default and grid layouts for the home page
- Refined settings into Fieldsets
- Fixed up icons and ordering of admin panel resources
- The default user that is created should now have access to the panel
- The sidebar can collapse
- Contact form will now conditionally show contact details
- Hid sponsor menus


## v0.0.2 - 16-10-2022

- Added category and tags pages and hyperlinking for tags
- Published Jetstream Livewire componenets and updated logo
- Added User resource to Filament
- Fixed route key for tag model
- Added soft deletes to users table

## v0.0.1 - 16-10-2022

- Added Prism code highlighting
- Added exporting of posts
- Added settings to output Twitter username
- Refined the small footer which typically holds the copyright
- Squashed some $fillable and name => title issues
