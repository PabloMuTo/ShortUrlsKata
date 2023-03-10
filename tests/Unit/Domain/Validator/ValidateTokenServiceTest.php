<?php

namespace Infrastructure\Services;

use PHPUnit\Framework\TestCase;
use Src\Domain\Validation\TokenValidation;

class ValidateTokenServiceTest  extends TestCase
{
    private $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(TokenValidation::class);
    }


    public function test_validate_token_service()
    {
        $token = "()()()";
        $this->repository->method('execute')->with($token)->willReturn(true);
        $this->assertTrue($this->repository->execute($token));
    }

    public function test_validate_invalid_token_service()
    {
        $token = "()(((((";
        $this->repository->method('execute')->with($token)->willReturn(false);
        $this->assertFalse($this->repository->execute($token));
    }


    public function test_validate_other_token_service()
    {
        $token = "444444444";
        $this->repository->method('execute')->with($token)->willReturn(false);
        $this->assertFalse($this->repository->execute($token));
    }
}
