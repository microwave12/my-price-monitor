<?php

namespace App\Repositories;

use App\Entities\Page;
use App\Entities\PageDetail;
use App\Interfaces\PageRepositoryInterface;
use Goutte;

class PageRepository implements PageRepositoryInterface
{
    protected $page;

    protected $pageDetail;

    public function __construct(Page $page, PageDetail $pageDetail)
    {
        $this->page = $page;
        $this->pageDetail = $pageDetail;
    }

    public function create($request)
    {
        $content = $this->contentCrawler($request['link']);
        $request['title'] = $content['title'];
        
        $page = $this->page->create($request);
        $this->createDetail($content, $page->id);

        return $page->id;
    }

    public function findById($id)
    {
        return $this->page->where('page.id', $id)
                ->join('page_details', 'page.id', '=', 'page_details.page_id')
                ->orderBy('page_details.created_at', 'DESC')
                ->select(
                    'page.id',
                    'page.title',
                    'page.link',
                    'page_details.image',
                    'page_details.description',
                    'page_details.amount',
                    'page_details.currency',
                    'page_details.created_at'
                )
                ->get();
    }

    public function findAll()
    {
        $page['data'] = $this->page->join('page_details', 'page.id', '=', 'page_details.page_id')
                            ->orderBy('page_details.created_at', 'DESC')
                            ->select(
                                'page.id',
                                'page.title',
                                'page.link',
                                'page_details.description',
                                'page_details.amount',
                                'page_details.currency'
                            )
                            ->get();

        return $page;
    }

    private function createDetail($content, $id)
    {
        $content["page_id"] = $id;
        $this->pageDetail->create($content);
    }

    private function contentCrawler($url)
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

        return $content;
    }
}
