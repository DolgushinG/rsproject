<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;

use Carbon\Carbon;
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
        $userCityList = User::select('city_name')->whereNotNull('email_verified_at')->distinct()->take(6)->get();
        $eventCityList = Event::select('event_city')->whereBetween('event_start_date', [Carbon::now()->toDate(),'21-12-31'.' 23:59:59'])->where('active_status', '=', '1')->distinct()->take(6)->get();
        $userCityCount = [];
        foreach ($userCityList as $city) {
            $userCityCount[$city->city_name] = User::where('city_name', '=', $city->city_name)->count();
        }
        $eventCityCount = [];
        foreach ($eventCityList as $city) {
            $eventCityCount[$city->event_city] = Event::where('event_city', '=', $city->event_city)->count();
        }
        $usersSenior = User::where('exp_level', '=', 3)->count();
        $usersWithCours = User::where('educational_requirements', '=', 'yes')->count();
        $categories = Category::all();
        $userCount = User::All()->count();
        $eventCount = Event::All()->count();
        $latestUsers = User::latest('created_at')->where('active_status', '=', '0')->whereNotNull('email_verified_at')->take(5)->get();
        arsort($userCityCount);
        return view('home', compact(['categories','eventCityCount','eventCityList','eventCount','userCityCount','userCityList','userCount','latestUsers','usersSenior','usersWithCours']));
    }
    public function indexAbout()
    {
        return view('about');
    }
    public function indexBlog()
    {
        return view('blog.index');
    }
    public function indexSupport()
    {
        return view('support');
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
