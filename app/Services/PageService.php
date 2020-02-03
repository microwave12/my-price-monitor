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

    public function createDetail($content, $id)
    {
        return $this->pageRepoInterface->createDetail($content, $id);
    }

    public function findById($id)
    {
        return $this->pageRepoInterface->findById($id);
    }

    public function findAll()
    {
        return $this->pageRepoInterface->findAll();
    }
}
