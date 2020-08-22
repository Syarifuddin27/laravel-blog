<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        flashy()->info('WELCOME');
        return view('admin.dashboard')
                ->with('post_count', Post::all()->count())
                ->with('category_count', Category::all()->count())
                ->with('user_count', User::all()->count())
                ;
    }
}
