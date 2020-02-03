<?php

namespace Tests\Unit\Services;

use App\Services\PageService;
use Mockery;
use stdClass;
use Tests\TestCase;

class PageServiceTest extends TestCase
{
    protected $pageRepoInterface;

    public function __construct()
    {
        $this->pageRepoInterface = Mockery::mock('App\Interfaces\PageRepositoryInterface');
    }

    public function testCreate()
    {
        $request = new stdClass();
        $request->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $request->title = 'Kursi Makan Xavier Wooden Seater';
        
        $mockPageRepo = $this->mockPageIRepoCreate($request);

        $pageService = new PageService($mockPageRepo);

        $result = $pageService->create($request);
        
        $expected = new stdClass();
        $expected->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $expected->title = 'Kursi Makan Xavier Wooden Seater';

        $this->assertEquals($result->link, $expected->link);
        $this->assertEquals($result->title, $expected->title);
    }

    public function testCreateDetail()
    {
        $page_id = 1;
        $content = new StdClass();
        $content->image = "https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg";
        $content->description = "";
        $content->amount = "349300";
        $content->currency = "IDR";

        $mockPageRepo = $this->mockPageIRepoCreateDetail($content, $page_id);

        $pageService = new PageService($mockPageRepo);
        
        $result = $pageService->createDetail($content, $page_id);
        
        $expected = new StdClass();
        $expected->page_id = 1;
        $expected->image = "https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg";
        $expected->description = "";
        $expected->amount = "349300";
        $expected->currency = "IDR";

        $this->assertEquals($result->page_id, $expected->page_id);
        $this->assertEquals($result->image, $expected->image);
        $this->assertEquals($result->description, $expected->description);
        $this->assertEquals($result->amount, $expected->amount);
        $this->assertEquals($result->currency, $expected->currency);
    }

    public function testFindById()
    {
        $mockPageRepo = $this->mockPageIRepoFindById();

        $pageService = new PageService($mockPageRepo);

        $result = $pageService->findById(1);
        
        $expected = new StdClass();
        $expected->id = 1;
        $expected->title = 'Kursi Makan Xavier Wooden Seater';
        $expected->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $expected->image = "https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg";
        $expected->description = "";
        $expected->amount = "349300";
        $expected->currency = "IDR";
        $expected->created_at = "2020-02-02 09:11:27";

        $this->assertEquals($result->id, $expected->id);
        $this->assertEquals($result->title, $expected->title);
        $this->assertEquals($result->link, $expected->link);
        $this->assertEquals($result->image, $expected->image);
        $this->assertEquals($result->description, $expected->description);
        $this->assertEquals($result->amount, $expected->amount);
        $this->assertEquals($result->currency, $expected->currency);
        $this->assertEquals($result->created_at, $expected->created_at);
    }

    public function testFindAll()
    {
        $mockPageRepo = $this->mockPageIRepoFindAll();

        $pageService = new PageService($mockPageRepo);
        
        $result = $pageService->findAll();

        $data = new StdClass();
        $data->id = 1;
        $data->title = 'Kursi Makan Xavier Wooden Seater';
        $data->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $data->description = "";
        $data->amount = "349300";
        $data->currency = "IDR";
        
        $data2 = new StdClass();
        $data2->id = 2;
        $data2->title = 'Kursi Makan Chester (Jeans)';
        $data2->link = "https://fabelio.com/ip/kursi-makan-chester-jeans.html";
        $data2->description = "";
        $data2->amount = "1799100";
        $data2->currency = "IDR";

        $expected = array($data, $data2);

        foreach ($result['data'] as $key => $row) {
            $this->assertEquals($row->id, $expected[$key]->id);
            $this->assertEquals($row->title, $expected[$key]->title);
            $this->assertEquals($row->link, $expected[$key]->link);
            $this->assertEquals($row->description, $expected[$key]->description);
            $this->assertEquals($row->amount, $expected[$key]->amount);
            $this->assertEquals($row->currency, $expected[$key]->currency);
        }
    }

    protected function mockPageIRepoCreate($result)
    {
        $this->pageRepoInterface->shouldReceive('create')->once()->andReturn($result);
        return $this->pageRepoInterface;
    }

    protected function mockPageIRepoCreateDetail($content, $id)
    {
        $content->page_id = $id;

        $this->pageRepoInterface->shouldReceive('createDetail')->once()->andReturn($content);
        return $this->pageRepoInterface;
    }

    protected function mockPageIRepoFindById()
    {
        $result = new StdClass();
        $result->id = 1;
        $result->title = 'Kursi Makan Xavier Wooden Seater';
        $result->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $result->image = "https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg";
        $result->description = "";
        $result->amount = "349300";
        $result->currency = "IDR";
        $result->created_at = "2020-02-02 09:11:27";

        $this->pageRepoInterface->shouldReceive('findById')->once()->andReturn($result);
        return $this->pageRepoInterface;
    }

    protected function mockPageIRepoFindAll()
    {
        $data = new StdClass();
        $data->id = 1;
        $data->title = 'Kursi Makan Xavier Wooden Seater';
        $data->link = "https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html";
        $data->description = "";
        $data->amount = "349300";
        $data->currency = "IDR";
        
        $data2 = new StdClass();
        $data2->id = 2;
        $data2->title = 'Kursi Makan Chester (Jeans)';
        $data2->link = "https://fabelio.com/ip/kursi-makan-chester-jeans.html";
        $data2->description = "";
        $data2->amount = "1799100";
        $data2->currency = "IDR";

        $result['data'] = array($data, $data2);

        $this->pageRepoInterface->shouldReceive('findAll')->once()->andReturn($result);
        return $this->pageRepoInterface;
    }
}
