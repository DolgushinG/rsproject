<?php

namespace App\Http\Controllers;

use App\Models\Holds;
use Illuminate\Http\Request;

class HoldsController
{
    public function index() {
        $holds = Holds::all();
        return view('holds.index', compact('holds'));
    }

    public function holds() {
        $holds = Holds::all();
        return view('holds.holds', compact('holds'));
    }

    public function sendHolds(Request $request) {
        dd($request);
        if ($hold->save()) {
            return response()->json(['success' => true, 'message' => 'true'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'error save'], 422);
        }
    }
}
