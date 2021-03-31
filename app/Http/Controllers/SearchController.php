<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
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
            if ($request->city_name != null) {
                $users = User::where('city_name', '=', $request->city_name)->where('active_status', '=', '0')->whereIn('id', $usersResult)->simplePaginate(20);
            } else {
                $users = User::whereIn('id', $usersResult)->where('active_status', '=', '0')->simplePaginate(20);
            }
        } else if ($request->categories === null && $request->city_name === null) {
            $users = User::where('active_status', '=', '0')->simplePaginate(20);
        } else {
            $users = User::where('city_name', '=', $request->city_name)->where('active_status', '=', '0')->simplePaginate(20);
        }
        return view('search.resultList', compact('users'));
    }

    function paginationSearch(Request $request)
    {
        dd($request);
        if ($request->ajax()) {
            $users = User::where('active_status', '=', '0')->simplePaginate(20);
            return view('search.resultList', compact('users'))->render();
        }
    }
}
