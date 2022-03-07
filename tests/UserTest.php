<?php

namespace App\Tests;


use PHPUnit\Framework\TestCase;

class UserTst extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    public function tesGetEmail()
    {
        $email = "tutu@tutu.fr";
        $user = $this->user->setEmail($email);

        self::assertInstanceOf(User::class, $user);
        self::assertEquals($email, $this->user->getEmail());
    }
}
