<?php

namespace App\Helpers;

use Goutte;

class Helper
{
    public static function contentCrawler($url)
    {
        $crawler = Goutte::request('GET', $url);
        $metas = $crawler->filter('meta[property]')->each(function ($node) {
            return array(
                "property" => str_replace(array("og:", "product:price:"), "", $node->attr('property')),
                "content" => $node->attr('content'),
            );
        });

        $content = [];
        foreach ($metas as $meta) {
            $content[$meta["property"]] = $meta["content"];
        }

        if (empty($content['type']) || $content['type'] != "og:product" || count($content) != 7) {
            return;
        }
        return $content;
    }
}
