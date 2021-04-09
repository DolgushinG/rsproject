<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
class PublicProfileController extends Controller
{

    public function indexPublic($id,Request $request) {
        $user = User::find($id);
        $reviews = Rating::where('user_id', '=', $id)->get();
        return view('profilePublic.index', compact('user','reviews'));
    }
    public function postRatingAndReview(Request $request) {
        $rate = Rating::where('user_id', '=', $request->userId)->where('user_ip', '=', $request->ip())->first();
        // if($rate === null){
            $user = User::find($request->userId);
            $rating = new Rating;
            $rating->rating = $request->star;
            $rating->user_id = $request->userId;
            $rating->review = $request->review;
            $rating->name_guest= $request->nameGuest;
            $rating->email_guest= $request->emailGuest;
            $rating->user_ip = $request->ip();
            $user->ratings()->save($rating);
        // } 
        // else if ($rate !== null){
        //     return response()->json(['success' => false, 'message' => 'ошибка сохранения, вы уже сделали отзыв'], 422);
        // }
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'Ваш комментарий опубликован'], 200);
            } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
    public function getRatingAndReview(Request $request) {
        $reviews = Rating::where('user_id', '=', $request->userId)->get();
        $user = User::find($request->userId);
        return view('profilePublic.comments', compact('reviews','user'));
    }
}

// public function saveLikeDislike(postRequest $request)
// {
//     $likePost = App\Models\LikeDislike::where('post_id','=', $request->post)->get();
//     $likeCheckInPost = App\Models\LikeDislike::where('post_id','=', $request->post)->first();

//     $data = new LikeDislike;
//     if($likeCheckInPost !== null){
//         foreach($likePost as $like){
//             if($like->user_ip === $request->ip()){
//                 if($like->like == 1 && $request->type === 'like'){
//                     App\Models\LikeDislike::find($like->id)->delete();
//                     return response()->json([
//                         'bool' => false
//                     ]);
//                 } else if ($like->dislike == 1 && $request->type === 'dislike') {
//                     App\Models\LikeDislike::find($like->id)->delete();
//                     return response()->json([
//                         'bool' => false
//                     ]);
//                 } 
//             }
                
//             if ($like->user_ip !== $request->ip()){
                
//                 if ($request->type === 'like'){
//                     $data->like = 1;
//                 } else {
//                     $data->dislike = 1;
//                 }
//                 $data->post_id = $request->post;
//                 $data->user_ip = $request->ip();
//                 $data->save();
//                 return response()->json([
//                         'bool' => true
//                 ]);
//             }
//         } 
//     } else {
//         if ($request->type === 'like'){
//             $data->like = 1;
//         } else {
//             $data->dislike = 1;
//         }
//         $data->post_id = $request->post;
//         $data->user_ip = $request->ip();
//         $data->save();
//         return response()->json([
//                 'bool' => true
//         ]);
//     }

// }