<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function indexPublic($id,Request $request) {
        $user = User::find($id);
        return view('profilePublic.index', compact('user'));
    }
}
