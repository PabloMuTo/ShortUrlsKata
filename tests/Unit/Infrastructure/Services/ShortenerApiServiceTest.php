<?php

namespace Infrastructure\Services;

use PHPUnit\Framework\TestCase;
use Src\Domain\Url;
use Src\Infrastructure\Service\ShortenerApiService;

class ShortenerApiServiceTest  extends TestCase
{
    private $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(ShortenerApiService::class);
    }


    public function test_shortener_api_service()
    {
        $url      = Url::build("https://google.es");
        $shortUrl = 'https://tinyurl.com/cjyv8vr';
        $this->repository->method('execute')->with($url)->willReturn($shortUrl);

        $this->assertEquals($this->repository->execute($url), $shortUrl);
    }

}
