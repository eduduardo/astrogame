<?php


class UserTest extends TestCase
{
    public function testNewUserRegistration()
    {
        $this->assertTrue(true);

        $this->visit('/register')
      ->type('eduduardo_test', 'nickname')
      ->type('test@test.com', 'email')
      ->type('123', 'password')
      ->press('')
      ->seePageIs('/game');
    }

    public function testGainXp()
    {
    }

    public function testLevel()
    {
    }

    public function testLogin()
    {
        $this->assertTrue(true);

        $this->visit('/login')
      ->type('eduduardo', 'login')
      ->type('220499', 'password')
      ->seePageIs('/game');
    }

    public function testChangeProfile()
    {
    }
}
