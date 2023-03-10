<?php

namespace Domain;

use Src\Domain\Url;
use Tests\TestCase;

class UrlTest extends TestCase
{
    public function test_instance_url_entity()
    {
        $url = "https://www.google.es";
        $entity = Url::build($url);
        $this->assertEquals($url, $entity->getUrl());
    }


    public function test_instance_invalid_url()
    {
        $this->expectExceptionMessage("Invalid URL");
        Url::build("");
    }
}
