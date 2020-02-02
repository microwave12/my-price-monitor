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
        $id = $this->pageService->create($request->all());

        return Redirect::to("/page/".$id);
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

    public function updateJobs()
    {
        $this->pageService->updateDetails();
    }
}
