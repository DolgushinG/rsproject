<?php

namespace App\Http\Controllers;

use App\Models\ClimbingMoves;
use App\Models\LikeDislike;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class ClimbingMovesController extends Controller
{

    public function index() {
        $shareButtons = ShareFacade::page(
            'https://www.routesetters.ru/climbing-moves',
            'Your share text comes here',
        )
            ->facebook()
            ->telegram()
            ->whatsapp();
        $moves = ClimbingMoves::paginate(2);
        return view('ClimbingMoves.index', compact('shareButtons','moves'));
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

    public function likeDisLikeMove(Request $request)
    {
        $likeMove = LikeDislike::where('climbing_moves_id','=', $request->move)->get();
        $likeCheckInMove = LikeDislike::where('climbing_moves_id','=', $request->move)->first();

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
                    $allMoves = ClimbingMoves::find($request->move);
                    $allMoves->sum_likes = $allMoves->likesMoves()+1;
                    $allMoves->save();
                    $data->climbing_moves_id = $request->move;
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
            $allMoves = ClimbingMoves::find($request->move);
            $allMoves->sum_likes = $allMoves->likesMoves()+1;
            $allMoves->save();
            $data->climbing_moves_id = $request->move;
            $data->user_ip = $request->ip();
            $data->save();
            return response()->json([
                'bool' => true
            ]);
        }

    }

}
