<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateBlogSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.title', "My Blog");
        $this->migrator->add('blog.subtitle', "A blog a day keeps the doctor away.");
        $this->migrator->add('blog.enable_breadcrumbs', true);
        $this->migrator->add('blog.copyright', "© 2022 <a href='#' class='hover:underline'>My Blog™</a>");
        $this->migrator->add('blog.twitter_username', '@gene_vanderhost');
    }
}
