<?php

namespace App\Repositories;

use App\Entities\Page;
use App\Interfaces\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    protected $pageModel;

    public function __construct(Page $page)
    {
        $this->pageModel = $page;
    }

    public function create($request)
    {
        $this->pageModel->create($request);
    }
}
