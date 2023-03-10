<?php

namespace Src\Domain;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Src\Domain\Validation\TokenValidation;

class Token
{
    private string $token;
    private $validateTokenService;

    /**
     * @throws \Exception
     */
    private function __construct(
        string $token
    )
    {
        $this->validateTokenService = new TokenValidation();
        $this->validate($token);
        $this->setToken($token);
    }

    /**
     * @throws \Exception
     */
    public static function build(string $token): self
    {
        return new self($token);
    }

    private function validate(string $token): void
    {
        if ( !$this->validateTokenService->execute($token) ) {
            throw new \Exception("Invalid Token");
        }
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string[]
     */
    #[Pure] #[ArrayShape(['token' => "string"])] public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
        ];
    }
}
