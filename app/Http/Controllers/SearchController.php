<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rating;
use App\Models\UserAndCategories;

class SearchController extends Controller
{
    public function getResultSearch(Request $request)
    {   
        if ($request->categories != null) {
            $users = UserAndCategories::whereIn('category_id', $request->categories)->distinct()->get('user_id');
            $usersResult = [];
            foreach ($users as $user) {
                $usersResult[] = $user->user_id;
            }
            #categories with city_name
            if ($request->city_name != null) {
                $users = User::where('city_name', '=', $request->city_name)->where('active_status', '=', '0')->whereIn('id', $usersResult);
                $foundUsers = $users->count();
                $users = $users->simplePaginate(12);
                $categories = Category::whereIn('id', $request->categories)->get();
                $valueSearch = array(
                    'city' => $request->city_name,
                    'categories' => $categories,
                );
                #categories
            } else {
                $users = User::whereIn('id', $usersResult)->where('active_status', '=', '0');
                $foundUsers = $users->count();
                $users = $users->simplePaginate(12);
                $categories = Category::whereIn('id', $request->categories)->get();
                $valueSearch = array(
                    'categories' => $categories,
                );
            }
            #empty request
        } else if ($request->categories === null && $request->city_name === null) {
            $users = User::where('active_status', '=', '0');
            $foundUsers = $users->count();
            $users = $users->simplePaginate(12);
            $valueSearch= '';
            #city_name
        } else if ($request->city_name) {
            $users = User::where('city_name', '=', $request->city_name)->where('active_status', '=', '0');
            $foundUsers = $users->count();
            $users = $users->simplePaginate(12);
            $valueSearch = $request->city_name;
            $valueSearch = array(
                'city' => $request->city_name,
            );
        }
        return view('search.resultList', compact('users','foundUsers','valueSearch'))->render();
    }
}
#цена за трассу в финале
#за полуфинал
#детские 
#подростки 
#категория которую может накрутить и пролезсть