<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageCrawlerController extends Controller
{
    protected $pageService;
	
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $this->pageService->create($request->all());

        return Redirect::to('/page');
    }
}
