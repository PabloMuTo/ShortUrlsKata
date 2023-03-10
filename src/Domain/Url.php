<?php

namespace Src\Domain;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

/**
 * Url entity
 */
class Url
{
    private string $url;

    /**
     * @throws \Exception
     */
    private function __construct(string $url)
    {
        $this->validate($url);
        $this->setUrl($url);
    }

    public static function build(string $url): self
    {
        return new self($url);
    }

    private function validate(string $url): void
    {
        if ( strlen(trim($url)) == 0 ) {
            throw new \Exception("Invalid URL");
        }
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string[]
     */
    #[Pure] #[ArrayShape(['url' => "string"])] public function toArray(): array
    {
        return [
            'url' => $this->getUrl(),
        ];
    }
}
