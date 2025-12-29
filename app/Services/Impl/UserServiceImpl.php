<?php   

namespace App\Services\Impl;

use App\Services\UserService;

Class UserServiceImpl implements UserService
{ 

    private array $users = [
        "rijal" => "password123",
    ];
    public function register(array $data) :array
    {
        // Implementation for registering a user
        return $data;
    }

    public function login(string $email, string $password)
    {
        // Implementation for logging in a user

        if (isset($this->users[$email]) && $this->users[$email] === $password) {
            return true;
        }
        return false;
    }

    public function logout()
        {
        return true;
    }

    public function getProfile(int $id)
    {
        // Implementation for retrieving a user's profile
        // return User::where('id', $id)->first();
    }
}