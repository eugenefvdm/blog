<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateBlogSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blog.site_name', 'Blog');
    }
}
