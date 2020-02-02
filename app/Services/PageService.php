<?php

namespace App\Services;

use App\Interfaces\PageRepositoryInterface;

class PageService
{
    protected $pageRepoInterface;

    public function __construct(PageRepositoryInterface $pageRepoInterface)
    {
        $this->pageRepoInterface = $pageRepoInterface;
    }

    public function create($request)
    {
        return $this->pageRepoInterface->create($request);
    }
}
