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
            $users = UserAndCategories::whereIn('category_id',$request->categories)->distinct()->get('user_id');
            $usersResult = [];
            foreach ($users as $user) {
                $usersResult[] = $user->user_id;
            }
            if($request->city_name != null){
                $users = User::where('city_name','=',$request->city_name)->whereIn('id', $usersResult)->get();
            } else {
                $users = User::whereIn('id', $usersResult)->get();
            }
        } else if ($request->categories === null && $request->city_name === null) {
            $users = User::all();
        } else {
            $users = User::where('city_name','=',$request->city_name)->get();
            
        }

       
        return view('search.resultList', compact('users'));
    }
}
