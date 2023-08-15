<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view("admin.index");
    }

    public function articles(): View
    {
        $user_articles = Auth::user()->articles;
        return View("admin.articles", compact("user_articles"));
    }
}
