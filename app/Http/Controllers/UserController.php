<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login():Response
    {
        return response()->view('user.login');
    }

    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if($email == null || $password == null){
            return redirect('/login')->withErrors(['error' => 'Email and Password are required.']);
        }

        if($this->userService->login($email, $password)){
            $request->session()->put('user_email', $email);
            return redirect('/home')->with('message', 'Login successful.');
        } 
        
        return redirect('/login')->withErrors(['error' => 'Invalid credentials.']);
        

    }
}
