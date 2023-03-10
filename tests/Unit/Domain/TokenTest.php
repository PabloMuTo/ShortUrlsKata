<?php

namespace Domain;

use Src\Domain\Token;
use Tests\TestCase;

class TokenTest extends TestCase
{
    public function test_instance_token_entity()
    {
        $token = "()()()";
        $entity = Token::build($token);
        $this->assertInstanceOf(Token::class, $entity);
        $this->assertEquals($token, $entity->getToken());
    }


    public function test_instance_invalid_token()
    {
        $this->expectExceptionMessage("Invalid Token");
        $token = "((()";
        Token::build($token);
    }
}
