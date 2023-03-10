<?php

namespace Src\Application;

use Src\Domain\Url;
use Src\Infrastructure\Service\ShortenerApiService;


/**
 * Use Case - Short URL
 */
final class ShortUrlsHandle extends AbstractHandle
{
    public function __construct(
        private ShortenerApiService $shortenerApiService
    )
    {  }

    /**
     * @param string $url
     * @return string
     */
    public function handle(string $url): string
    {
        $entity = Url::build($url);
        return $this->shortenerApiService->execute($entity);
    }
}
