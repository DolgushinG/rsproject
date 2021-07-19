<?php

namespace App\Http\Controllers;

use App\Mail\NewReview;
use App\Models\Event;
use App\Models\subscriptionUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriptionUserController extends Controller
{
    public function getEmailUsers (Request $request) {
        dd($request);
        $validator = Validator::make($request->all(),[
            'email_user' => 'required|string|max:150',
        ]);
        $feed_back=array();
        if ($validator->passes()){
            $subscriptionUser = new subscriptionUser;
            $subscriptionUser->email_user = $request->email_user;
            $subscriptionUser->save();
            $feed_back['type']='alert-success';
            $feed_back['message']='Вы успешно подписаны';
            $feed_back['error']=array();
        } else {
            $feed_back['type']='alert-danger';
            $feed_back['error']=  $validator->errors()->all();
        }
//        $details = [
//            'rating' => $request->star,
//            'body' => $request->review,
//            'userName' => $request->nameGuest,
//            'id' => $user->id
//        ];
//        Mail::to($user->email)->send(new NewReview($details));
        return json_encode($feed_back);
    }
}
