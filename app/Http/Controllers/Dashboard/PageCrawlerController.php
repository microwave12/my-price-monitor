<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\Helper;
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
        $content = Helper::contentCrawler($request->link);
        if (empty($content)) {
            return Redirect::to("/page")->with(['warning' => 'No meta property provided in given URL']);
        }

        $request->merge(['title' => $content['title']]);
        $page = $this->pageService->create($request->all());
        $this->pageService->createDetail($content, $page->id);

        return Redirect::to("/page/".$page->id);
    }

    public function show($id)
    {
        $page = $this->pageService->findById($id);

        return view('detail', ['page' => $page]);
    }

    public function lists()
    {
        return view('list');
    }

    public function pageLists()
    {
        return $this->pageService->findAll();
    }
}
