<?php

namespace App\Services;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class Seo
{
    public static function page($page)
    {        
        $page->twitterSite = $page->user->name;

        $SeoToolPageTitle = $page->title . ' - ' . config('app.name');

        SEOTools::twitter()->setSite($page->twitterSite);

        SEOMeta::setTitle($SeoToolPageTitle);
        SEOMeta::setDescription($page->meta_description);        

        OpenGraph::setDescription($page->meta_description);
        OpenGraph::setTitle($page->title);
        OpenGraph::setUrl(config('app.url') . $page->slug);        

        TwitterCard::setTitle($page->title);
        TwitterCard::setSite($page->twitterSite);
        TwitterCard::addValue('app:country', 'ZA');
        
        JsonLd::setDescription($page->meta_description);
        JsonLd::addImage($page->featured_image);
    }        
}
