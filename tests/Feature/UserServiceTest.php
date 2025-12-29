<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\UserService;

class UserServiceTest extends TestCase
{   
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    /**
     * A basic feature test example.
     */
    public function testSample(): void
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess(): void
    { 
        $this->followingRedirects()->post('/login', [
            'email' => 'rijal',
            'password' => 'password123',
        ])->assertSessionHas('user_email', 'rijal')
        ;
    }

    public function testLoginValidationFailure(): void
    {
        $this->followingRedirects()->post('/login', [
            'email' => '',
            'password' => '',
        ])->assertSee('Email and Password are required.') 
        ;
    }

    public function testLoginFailure(): void
    {
        $this->followingRedirects()->post('/login', [
            'email' => 'rijal',
            'password' => 'wrongpassword',
        ])->assertSee('Invalid credentials.') 
        ;
    }
}