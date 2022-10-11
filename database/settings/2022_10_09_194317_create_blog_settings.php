<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateBlogSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.title', "My Blog");
        $this->migrator->add('blog.subtitle', "A blog a day keeps the doctor away.");
        $this->migrator->add('blog.enable_breadcrumbs', true);
    }
}
