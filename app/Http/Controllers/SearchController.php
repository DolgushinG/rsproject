<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventAndCategories;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;
use App\Models\UserAndCategories;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function getResultSearch(Request $request)
    {
        $request->city_name = $request->event_city;
        if ($request->categories != null) {
            #event search
            if ($request->search_event != null){
                $events = EventAndCategories::whereIn('category_id', $request->categories)->distinct()->get('event_id');
                $eventsResult = [];
                foreach ($events as $event) {
                    $eventsResult[] = $event->event_id;
                }

            } else {
                #users search
                $users = UserAndCategories::whereIn('category_id', $request->categories)->distinct()->get('user_id');
                $usersResult = [];
                foreach ($users as $user) {
                    $usersResult[] = $user->user_id;
                }
            }
            #categories with city_name
            if ($request->city_name != null) {
                if ($request->search_event != null){
                    $events = Event::where('event_city', '=', $request->city_name)
                        ->where('active_status', '=', '1')
                        ->orderBy('event_start_date')
                        ->whereIn('id', $eventsResult);
                    $foundEvents = $events->count();
                    $events = $events->simplePaginate(12);
                    $categories = Category::whereIn('id', $request->categories)->get();
                    $valueSearch = array(
                        'city' => $request->city_name,
                        'categories' => $categories,
                    );
                    $users = 0;
                    $foundUsers = 0;
                } else {
                    $users = User::where('city_name', '=', $request->city_name)
                        ->where('active_status', '=', '0')
                        ->whereNotNull('email_verified_at')
                        ->whereIn('id', $usersResult);
                    $foundUsers = $users->count();
                    $users = $users->simplePaginate(12);
                    $categories = Category::whereIn('id', $request->categories)->get();
                    $valueSearch = array(
                        'city' => $request->city_name,
                        'categories' => $categories,
                    );
                    $events = 0;
                    $foundEvents = 0;
                    $eventFeature = 0;
                }

                #categories
            } else {
                if ($request->search_event != null){
                    $events = Event::whereIn('id', $eventsResult)
                        ->where('active_status', '=', '1')
                        ->orderBy('event_start_date');
                    $foundEvents = $events->count();
                    $events = $events->simplePaginate(12);
                    $categories = Category::whereIn('id', $request->categories)->get();
                    $valueSearch = array(
                        'categories' => $categories,
                    );
                    $users = 0;
                    $foundUsers = 0;
                } else {
                    $users = User::whereIn('id', $usersResult)
                        ->whereNotNull('email_verified_at')
                        ->where('active_status', '=', '0');
                    $foundUsers = $users->count();
                    $users = $users->simplePaginate(12);
                    $categories = Category::whereIn('id', $request->categories)->get();
                    $valueSearch = array(
                        'categories' => $categories,
                    );
                    $events = 0;
                    $foundEvents = 0;
                    $eventFeature = 0;
                }
            }
            #empty request
        } else if ($request->categories === null && $request->city_name === null) {
            if ($request->search_event != null){
                $events = Event::where('active_status', '=', '1')
                    ->orderBy('event_start_date');
                $foundEvents= $events->count();
                $events = $events->simplePaginate(12);
                $valueSearch= '';
                $users = 0;
                $foundUsers = 0;
            } else {
                $users = User::where('active_status', '=', '0')->whereNotNull('email_verified_at');
                $foundUsers = $users->count();
                $users = $users->simplePaginate(12);
                $valueSearch= '';
                $events = 0;
                $foundEvents = 0;
                $eventFeature = 0;
            }
            #city_name
        } else if ($request->city_name) {
            if ($request->search_event != null){
                $events = Event::where('event_city', '=', $request->city_name)
                        ->where('active_status', '=', '1')
                        ->orderBy('event_start_date');
                $foundEvents = $events->count();
                $events = $events->simplePaginate(12);
                $valueSearch = array(
                    'city' => $request->city_name,
                );
                $users = 0;
                $foundUsers = 0;
            } else {
                $users = User::where('city_name', '=', $request->city_name)->where('active_status', '=', '0')->whereNotNull('email_verified_at');
                $foundUsers = $users->count();
                $users = $users->simplePaginate(12);
                $valueSearch = array(
                    'city' => $request->city_name,
                );
                $events = 0;
                $foundEvents = 0;
                $eventFeature = 0;
            }
        }
        return view('search.resultList', compact(['users','foundUsers','valueSearch','foundEvents','events']))->render();
    }
}
