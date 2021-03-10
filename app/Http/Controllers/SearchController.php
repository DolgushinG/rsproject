<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
class SearchController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('search.index', compact('categories'));
    }

    public function getResultSearch(Request $request)
    {
        $users = User::where('city_name', '=' ,$request->city_name)->get();
        return view('search.resultList', compact('users'));
    }
}
