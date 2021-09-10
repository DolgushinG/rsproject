<?php

namespace App\Http\Controllers;

use App\Models\ClimbingMoves;
use Illuminate\Http\Request;

class ClimbingMovesController extends Controller
{

    public function index() {
        $moves = ClimbingMoves::all();
        return view('ClimbingMoves.index', compact('moves'));
    }

    public function indexMoves() {
        $moves = ClimbingMoves::all();
        return view('ClimbingMoves.moves', compact('moves'));
    }
    public function sendMove(Request $request) {
        $move = new ClimbingMoves();

        if ($request->move) {
            $file = $request->file('move');
            $imageName = time() . '.' . $request->file('move')->getClientOriginalExtension();
            $file->storeAs('/images/moves/'.$move->id, $imageName, 'public');
            $move->path = '/images/moves/'.$move->id.$imageName;
        }
        $move->save();
//        $moves = ClimbingMoves::all();
//        return view('ClimbingMoves.moves', compact('moves'));
    }

}
