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
        $cityList = User::select('city_name')->whereNotNull('email_verified_at')->distinct()->take(11)->get();
        $cityCount = [];
        foreach ($cityList as $city) {
            $cityCount[$city->city_name] = User::where('city_name', '=', $city->city_name)->count();
        }
        $usersSenior = User::where('exp_level', '=', 3)->count();
        $usersWithCours = User::where('educational_requirements', '=', 'yes')->count();
        $categories = Category::all();
        $userCount = User::All()->count();
        $latestUsers = User::latest('created_at')->where('active_status', '=', '0')->whereNotNull('email_verified_at')->take(5)->get();
        arsort($cityCount);
        return view('home', compact(['categories','cityCount','cityList','userCount','latestUsers','usersSenior','usersWithCours']));
    }
    public function indexAbout()
    {
        return view('about');
    }
    public function indexBlog()
    {
        return view('blog.index');
    }

    public function indexVerificationPage()
    {
        return view('verificationPage');
    }
    public function indexPrivacy()
    {
        return view('privacy.policiesconf');
    }
    public function indexPrivacyData()
    {
        return view('privacy.privatedata');
    }

}
