<?php

namespace App\Http\Controllers;
use App\Models\ClimbingMoves;
use App\Models\Event;
use App\Models\Holds;
use App\Models\Posts;
use App\Models\Sponsors;
use App\Models\User;
use App\Models\Category;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $eventCityList = Event::select('event_city')->whereBetween('event_start_date', [Carbon::now()->toDate(),Carbon::now()->addYears(2)->toDate()])->where('active_status', '=', '1')->orderBy('event_start_date')->take(8)->get();
        $userCityCount = [];
        foreach ($userCityList as $city) {
            $userCityCount[$city->city_name] = User::where('city_name', '=', $city->city_name)->count();
        }
        $eventCityCount = [];
        foreach ($eventCityList as $city) {
            $eventCityCount[$city->event_city] =+ 1;
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
        $Events = Event::where('active_status', '=', '1')->whereBetween('event_start_date', [Carbon::now()->toDate(),Carbon::now()->addYears(2)->toDate()])->get();
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
        $latestHolds = Holds::where('active_status', '=', '1')->inRandomOrder()->take(4)->get();
        $sponsors = Sponsors::all();
        if (!$this->isMobileDevice()){
            $latestMoves = ClimbingMoves::latest('created_at')->take(5)->get();
        } else {
            $latestMoves = ClimbingMoves::inRandomOrder()->take(1)->get();;
        }
        return view('home', compact(['sponsors','recentlyPost','latestHolds','latestMoves','recentlyEvent','categories','eventCityCount','eventCityList','eventCount','userCityCount','userCityList','userCount','latestUsers','usersSenior','usersWithCours']));
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

    public function isMobileDevice(): bool
    {
        $aMobileUA = array(
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        //Return true if Mobile User Agent is detected
        foreach($aMobileUA as $sMobileKey => $sMobileOS){
            if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
                return true;
            }
        }
        //Otherwise return false..
        return false;
    }
}
