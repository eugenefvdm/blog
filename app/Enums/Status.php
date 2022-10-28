<?php

namespace App\Enums;

class Status
{
    const PUBLISHED = 'published';

    const DRAFT = 'draft';

    const UNPUBLISED = 'unpublished';

    public static function options()
    {
        return [
            self::PUBLISHED => 'Published',
            self::DRAFT => 'Draft',
            self::UNPUBLISED => 'Unpublished',
        ];
    }
}
