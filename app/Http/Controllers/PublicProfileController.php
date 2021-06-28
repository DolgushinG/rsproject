<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\Rating;
use App\Models\UserAndCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PublicProfileController extends Controller
{
    public function indexPublic($id,Request $request) {
        $user = User::find($id);
        $userAndCategories = UserAndCategories::where('user_id','=',$user->id)->distinct()->get('category_id');
        $categories = Category::whereIn('id', $userAndCategories)->get();
        $reviews = Rating::where('user_id', '=', $id);
        $foundReviews = $reviews->count();
        views($user)->record();
        $reviews = $reviews->orderBy('rating','desc')->simplePaginate(5);
        $userView = views($user)->count();
        return view('profilePublic.index', compact('user','reviews','foundReviews','userView','categories'))->render();
    }
    public function postRatingAndReview(Request $request) {
//        dd($request);
        $messages = array(
            'nameGuest.required' => 'Поле имя обязательно для заполнения',
            'emailGuest.required' => 'Поле email обязательно для заполнения',
            'review.required' => 'Поле отзыв обязательно для заполнения',
            'star.required' => 'Проголосуйте звездочками это обязательно для заполнения',
        );
        $validator = Validator::make($request->all(), [
            'nameGuest' => 'required',
            'emailGuest' => 'required',
            'review' => 'required',
            'star' => 'required',
        ],$messages);
        if ($validator->fails())
        {
            return response()->json(['success' => false,'message'=>$validator->errors()->all()],422, ['message'=>$validator->errors()->all()]);
        }
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
            $response = new Response();
            return $response->setStatusCode(422, 'You already did review');
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
    /**
     * Show user online status.
     */
    public function status()
    {
        $users = User::all();

        foreach ($users as $user) {

            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
            else {
                if ($user->last_seen != null) {
                    echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
                } else {
                    echo $user->name . " is offline. Last seen: No data ";
                }
            }
        }
    }
    /**
     * Live status.
     */
    public function liveStatus($user_id)
    {
        // get user data
        $user = User::find($user_id);

        // check online status
        if (Cache::has('user-is-online-' . $user->id))
            $status = 'Online';
        else
            $status = 'Offline';
        // check last seen
        if ($user->last_seen != null)
            $last_seen = "Active " . Carbon::parse($user->last_seen)->diffForHumans();
        else
            $last_seen = "No data";
        // response
        return response()->json([
            'status' => $status,
            'last_seen' => $last_seen,
        ]);
    }

}
