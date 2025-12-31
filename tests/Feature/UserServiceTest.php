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

    public function testEnvironmentTesting(): void
    {
        dump(config('database.default'));
        dump(config('cache.default'));
        dump(app()->environment());
   }
    
    /**
     * A basic feature test example.
     */
    public function testSample(): void
    {
        self::assertTrue(true);
    }

public function testLoginPageAccessible(): void
    {
        $this->get('login')->assertSee('Login');
    }

    public function testloginPageforMember(): void
    {
        // Simulate a logged-in user by setting session data
        $this->withSession(['user_email' => 'rijal@gmail.com'])->get('/login')
            ->assertRedirect('/')
            ;
    }

    public function testLoginSuccess(): void
    { 
        $this->followingRedirects()->post('/login', [
            'email' => 'rijal@gmail.com',
            'password' => 'password123',
        ])->assertSessionHas('user_email', 'rijal@gmail.com')
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
            'email' => 'rijal@gmail.com',
            'password' => 'wrongpassword',
        ])->assertSee('Invalid credentials.') 
        ;
    }

public function testLoginForUserAlreadyLoggedIn(): void
    {
        // Simulate a logged-in user by setting session data
        $this->withSession(['user_email' => 'rijal@gmail.com'])->post('/login', [
            'email' => 'rijal@gmail.com',
            'password' => 'password123',
        ])->assertRedirect('/');
    }
    public function testLogout(): void
    {   //Cursor approach
        // $this->followingRedirects()->post('/login', [
        //     'email' => 'rijal@gmail.com',
        //     'password' => 'password123',
        // ])->assertSessionHas('user_email', 'rijal@gmail.com')
        // ;

        // $this->followingRedirects()->post('/logout')
        //     ->assertSessionMissing('user_email')
        //     ->assertSee('Logged out successfully.')
        // ;
        // PZN approach
        $this->withSession(['user_email'=> 'rijal@gmail.com'])->post('/logout')
            ->assertSessionMissing('user_email');
            // ->assertSee('Logged out successfully.');

    }
}