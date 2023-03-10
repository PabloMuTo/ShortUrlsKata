<?php

namespace Src\Infrastructure\Service;

use Illuminate\Support\Facades\Http;
use Src\Domain\Url;

class ShortenerApiService
{
    /**
     * Api service - tinyurl
     * @param Url $url
     * @return string
     */
    public function execute( Url $url ): string
    {
        return Http::get("https://tinyurl.com/api-create.php?url=".urlencode($url->getUrl()));
    }


}
