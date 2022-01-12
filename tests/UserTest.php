<?php

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('seb@test.fr', 'seb', 'sso', '1999-05-15', '0000000000');
        parent::setUp();
    }

    public function testUserIsValidNominal()
    {
        $u = new User('seb@test.fr', 'seb', 'sso', '1999-05-15', '0000000000');
        $result = $u->isValid();
        $this->assertTrue($result);
    }

    public function testIsValidNominal()
    {
        $this->assertTrue($this->user->isValid());
    }

    public function testUserNotValidDueToFName()
    {
        $u = new User('seb@test.fr', '', 'sso', '1999-05-15', '00000000000');
        $result = $u->isValid();
        $this->assertFalse($result);
    }

    public function testNotValidDueToFName()
    {
        $this->user->setFirstname('');
        $this->assertFalse($this->user->isValid());
    }

    public function testNotValidDueToLName()
    {
        $this->user->setLastname('');
        $this->assertFalse($this->user->isValid());
    }

    public function testNotValidDueToBirthdayInFuture()
    {
        $this->user->setBirthday(new \DateTime('2025-10-25'));
        $this->assertFalse($this->user->isValid());
    }

    public function testNotValidDueToTooYoungUser()
    {
        $this->user->setBirthday(new \DateTime('2016-10-25'));
        $this->assertFalse($this->user->isValid());
    }

    public function testNotValidBadEmail()
    {
        $this->user->setEmail('toto');
        $this->assertFalse($this->user->isValid());
    }


    public function testNotValidDueToShortPasswordUser()
    {
        $this->user->setPassword('15');
        $this->assertFalse($this->user->isValid());
    }

    public function testNotValidDueToLongPasswordUser()
    {
        $this->user->setPassword('5555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555');
        $this->assertFalse($this->user->isValid());
    }

    
}