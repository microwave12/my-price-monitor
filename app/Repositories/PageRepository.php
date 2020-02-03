<?php

namespace App\Repositories;

use App\Entities\Page;
use App\Entities\PageDetail;
use App\Helpers\Helper;
use App\Interfaces\PageRepositoryInterface;
use Illuminate\Support\Facades\DB;

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
        return $this->page->create($request);
    }

    public function createDetail($content, $id)
    {
        $content["page_id"] = $id;
        $this->pageDetail->create($content);
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
        $page['data'] = $this->page->join('page_details', function ($e) {
                                $e->on('page.id', '=', 'page_details.page_id')
                                  ->on('page_details.id', '=', DB::raw("(SELECT MAX(id) FROM page_details WHERE page_details.page_id = page.id)"));
                            })
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
}
