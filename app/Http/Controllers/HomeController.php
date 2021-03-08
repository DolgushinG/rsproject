<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexAbout()
    {
        return view('about');
    }
    public function indexContact()
    {
        return view('contact');
    }
    public function indexBlog()
    {
        return view('blog.index');
    }
    public function result()
    {
        return view('resultPage');
    }
}
