<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
 public function testGuestRedirectedToLogin(): void
    {
        $this->get('/')->assertRedirect('/login');
    }

    public function testAuthenticatedUserRedirectedToTodoList(): void
    {
        $this->withSession(['user_email' => 'rijal@gmail.com'])->get('/')
            ->assertRedirect('/todoList');  }
    
}