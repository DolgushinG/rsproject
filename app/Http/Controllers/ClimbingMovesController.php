<?php

namespace App\Http\Controllers;

use App\Models\ClimbingMoves;
use App\Models\LikeDislike;
use Illuminate\Http\Request;

class ClimbingMovesController extends Controller
{

    public function index() {
        $moves = ClimbingMoves::all();
        return view('ClimbingMoves.index', compact('moves'));
    }

    public function indexMoves() {
        $moves = ClimbingMoves::all();
        $shareButtons = \Share::page(
            'https://www.routesetters.ru/',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        return view('ClimbingMoves.moves', compact('moves','shareButtons'));
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

    public function saveLikeDislike(Request $request)
    {
        $likeMove = LikeDislike::where('move_id','=', $request->move)->get();
        $likeCheckInMove = LikeDislike::where('move_id','=', $request->move)->first();

        $data = new LikeDislike;
        if($likeCheckInMove !== null){
            foreach($likeMove as $like){
                if($like->user_ip === $request->ip()){
                    if($like->like == 1 && $request->type === 'like'){
                        LikeDislike::find($like->id)->delete();
                        return response()->json([
                            'bool' => false
                        ]);
                    } else if ($like->dislike == 1 && $request->type === 'dislike') {
                        LikeDislike::find($like->id)->delete();
                        return response()->json([
                            'bool' => false
                        ]);
                    }
                }

                if ($like->user_ip !== $request->ip()){
                    if ($request->type === 'like'){
                        $data->like = 1;
                    } else {
                        $data->dislike = 1;
                    }
                    $allMoves = ClimbingMoves::find($request->gym);
                    $allMoves->sum_likes = $allMoves->likesGyms()+1;
                    $allMoves->save();
                    $data->move_id = $request->move;
                    $data->user_ip = $request->ip();
                    $data->save();
                    return response()->json([
                        'bool' => true
                    ]);
                }
            }
        } else {
            if ($request->type === 'like'){
                $data->like = 1;
            } else {
                $data->dislike = 1;
            }
            $allMoves = ClimbingMoves::find($request->gym);
            $allMoves->sum_likes = $allMoves->likesGyms()+1;
            $allMoves->save();
            $data->move_id = $request->move;
            $data->user_ip = $request->ip();
            $data->save();
            return response()->json([
                'bool' => true
            ]);
        }

    }

}
