<?php

namespace App\Services;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;

class Seo
{
    /**
     * SEO helper service
     *
     * For a full list of set methods, see https://github.com/artesaos/seotools
     *
     * If this variable in not in the blade, then the defaults will take presedence
     *
     * On each page includes('layouts.seo') must be present
     *
     * Any value can be added to Twitter by using "addValue"
     */
    public static function page($page)
    {
        $SeoToolPageTitle = $page->title.' - '.config('app.name');
        SEOMeta::setTitle($SeoToolPageTitle);
        SEOMeta::setDescription($page->description);

        OpenGraph::setDescription(strip_tags($page->excerpt));
        OpenGraph::setTitle($page->title);
        OpenGraph::setUrl(config('app.url').$page->slug);

        // https://github.com/artesaos/seotools#api-twittercard
        $page->twitterSite = config('app.name');
        SEOTools::twitter()->setSite($page->twitterSite);

        TwitterCard::setTitle($page->title);
        if (isset($page->user->twitter)) {
            TwitterCard::addValue('creator', $page->user->twitter);
        }
        TwitterCard::setDescription(strip_tags($page->excerpt));
        TwitterCard::addValue('app:country', 'ZA');

        JsonLd::setDescription($page->description);
        JsonLd::addImage($page->featured_image);

        return true; // See https://laravel.com/docs/9.x/blade#stacks
    }
}
