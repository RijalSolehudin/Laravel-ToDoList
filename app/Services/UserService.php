<?php

namespace App\Services;

interface UserService
{
    // register, login, logout, profile management
    public function register(array $data);
    public function login(string $email, string $password);
    public function logout();
    public function getProfile(int $id);
}