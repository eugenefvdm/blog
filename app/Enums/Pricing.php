<?php

namespace App\Enums;

class Pricing
{
    public static function plans()
    {
        return [
            'currencySymbol' => 'R',
            'plans' => [
                [
                    'title' => 'Personal',
                    'monthly' => 99,
                    'yearly' => 1089,
                    'tagline' => 'Keep track of up to 3 accounts.',
                    'features' => [
                        'Import up to 3 accounts',
                        'Export data and tags',
                    ],
                    'cta' => 'Start Free Trial',
                    'mostPopular' => false,
                ],
                [
                    'title' => 'Business',
                    'monthly' => 199,
                    'yearly' => 2189,
                    'tagline' => 'Keep track of up to 10 accounts.',
                    'features' => [
                        'Import up to 10 accounts',
                        'Export data and tags',
                        'Access data using an API',
                    ],
                    'cta' => 'Start Free Trial',
                    'mostPopular' => false,
                ],
                [
                    'title' => 'Provider',
                    'monthly' => 399,
                    'yearly' => 4389,
                    'tagline' => "Ideal when you're doing work for others.",
                    'features' => [
                        'Import up to 100 accounts',
                        'Export data and tags',
                        'Access data using an API',
                        'Central console for tag sharing',
                    ],
                    'cta' => 'Start Free Trial',
                    'mostPopular' => false,
                ],
            ],
        ];
    }
}
