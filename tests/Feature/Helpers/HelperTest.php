<?php

namespace Tests\Feature\Helpers;

use App\Helpers\Helper;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testContentCrawler()
    {
        $helper = new Helper();
        
        $url = "https://fabelio.com/ip/set-1-1-kursi-taby.html";
        $response = $helper->contentCrawler($url);

        $this->assertInternalType('array', $response);
        $this->assertArrayHasKey('type', $response);
        $this->assertEquals('og:product', $response['type']);
        $this->assertCount(7, $response);
    }
}
