<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Posts;
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
        $eventCityList = Event::select('event_city')->whereBetween('event_start_date', [Carbon::now()->toDate(),Carbon::now()->addYears()->toDate()])->where('active_status', '=', '1')->orderBy('event_start_date')->take(6)->get();
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
        arsort($eventCityCount);
        $recentlyPost = Posts::latest('created_at')->where('status', '=', 'PUBLISHED')->paginate(3);
        $Events = Event::where('active_status', '=', '1')->whereBetween('event_start_date', [Carbon::now()->toDate(),Carbon::now()->addYears()->toDate()])->get();
        $now = Carbon::now();
        $recentlyEventID = [];
        foreach ($Events as $event) {
            $date = Carbon::parse($event->event_start_date);
            $diff = $date->diffInDays($now);
            if($diff < 60){
                array_push($recentlyEventID, $event->id);
            }
        }
        $recentlyEvent = Event::whereIn('id',$recentlyEventID)->paginate(4);
        return view('home', compact(['recentlyPost','recentlyEvent','categories','eventCityCount','eventCityList','eventCount','userCityCount','userCityList','userCount','latestUsers','usersSenior','usersWithCours']));
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
