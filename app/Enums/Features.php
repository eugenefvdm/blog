<?php

namespace App\Enums;

class Features
{
    public static function all()
    {
        return [
            [
                'name' => 'Automaticlly create backup monitors',
                'description' => "Simply call the <a href='/docs' class='underline text-blue-600 hover:text-blue-800 visited:text-purple-600'>API</a> and a new backup job monitor will be added to your dashboard.",
                'icon' => 'GlobeAltIcon',
            ],
            [
                'name' => 'A consistent interface for all systems',
                'description' => "View the results of all backups in one place no matter from which system it originated.",
                'icon' => 'ScaleIcon',
            ],
            [
                'name' => 'A super simple HTTP API',
                'description' => "Works with Virtualmin, JetBackup or any other backup system that can fire an HTTP event.",
                'icon' => 'LightningBoltIcon',
            ],
        ];
    }

    public static function icons() {
        return [
            'GlobeAltIcon' => '<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
          </svg>',
            'ScaleIcon' => '<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
          </svg>',
            'LightningBoltIcon' => '<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>',
        ];
    }
}
