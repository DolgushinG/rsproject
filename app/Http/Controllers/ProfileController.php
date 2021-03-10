<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function indexPublic($id,Request $request) {
        $user = User::find($id);
        return view('profilePublic.index', compact('user'));
    }


}
