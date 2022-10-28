<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateBlogSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.title', 'My Blog');
        $this->migrator->add('blog.subtitle', 'A blog post a day keeps the doctor away.');
        $this->migrator->add('blog.twitter_username', null);
        $this->migrator->add('blog.enable_breadcrumbs', true);
        $this->migrator->add('blog.enable_rss', true);
        $this->migrator->add('blog.small_footer', date('Y').' '.config('app.name'));
        $this->migrator->add('blog.google_analytics_tag', null);
    }
}
