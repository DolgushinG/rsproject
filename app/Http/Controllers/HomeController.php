<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;

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
        $cityList = User::select('city_name')->distinct()->get();
        $cityCount = [];
        foreach ($cityList as $city) {
            $cityCount[$city->city_name] = User::where('city_name', '=', $city->city_name)->count();
        }
        $usersSenior = User::where('exp_level', '=', 'senior')->count();
        $usersWithCours = User::where('educational_requirements', '=', 'yes')->count();
        $categories = Category::all();
        $userCount = User::All()->count();
        $latestUsers = User::latest('created_at')->take(5)->get();
        return view('home', compact(['categories','cityList','cityCount','userCount','latestUsers','usersSenior','usersWithCours']));
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
}
