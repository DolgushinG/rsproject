<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
class PublicProfileController extends Controller
{

    public function indexPublic($id,Request $request) {
        $user = User::find($id);
        $reviews = Rating::where('user_id', '=', $id);
        $foundReviews = $reviews->count();
        views($user)->unique()->record();
        $reviews = $reviews->orderBy('rating','asc')->simplePaginate(5);
        $userView = views($user)->unique()->count();
        return view('profilePublic.index', compact('user','reviews','foundReviews','userView'))->render();
    }
    public function postRatingAndReview(Request $request) {
        $rate = Rating::where('user_id', '=', $request->userId)->where('user_ip', '=', $request->ip())->first();
        if($rate === null){
            $user = User::find($request->userId);
            $rating = new Rating;
            $ratingForAverage = Rating::where('user_id','=',$request->userId)->get('rating');
            $averageNum = 0;
            foreach($ratingForAverage as $num){
                $averageNum+=$num->rating;
            }
            $countReview = $ratingForAverage->count();
            if($countReview > 0){
                $user->average_rating = ceil($averageNum/$countReview);
            } else {
                $user->average_rating = $averageNum;
            }
            
            $rating->rating = $request->star;
            $rating->user_id = $request->userId;
            $rating->review = $request->review;
            $rating->name_guest = $request->nameGuest;
            $rating->email_guest = $request->emailGuest;
            $rating->user_ip = $request->ip();
            $user->ratings()->save($rating);
        } 
        else if ($rate !== null){
            return response()->json(['success' => false, 'message' => 'вы уже сделали отзыв'], 422);
        }
        if ($user->save()) {
            return response()->json(['success' => true, 'message' => 'Ваш комментарий опубликован'], 200);
            } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
    public function getRatingAndReview(Request $request) {
        $reviews = Rating::where('user_id', '=', $request->userId);
        $foundReviews = $reviews->count();
        $reviews = $reviews->orderBy('rating','desc')->simplePaginate(5);
        $user = User::find($request->userId);
        return view('profilePublic.comments', compact('reviews','user','foundReviews'))->render();
    }

    
}
