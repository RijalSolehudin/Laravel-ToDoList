<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if ($request->session()->exists('user_email')) {
            return redirect('/todoList');
        } else {
            return redirect('/login');
    }
}}
