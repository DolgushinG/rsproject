<?php

namespace App\Http\Controllers;
use App\Mail\NewUser;
use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
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
    public function index()
    {
        return view('contact');
    }

    public function postFeedback(FeedbackRequest $request){
        if($request){
            $feedback = new Feedback;
            $feedback->name_guest = $request->name;
            $feedback->email_guest = $request->email;
            $feedback->subject = $request->subject;
            $feedback->message = $request->message;
            $feedback->save();
        }
        $newUser = $request->name;
        $userCity = $request->email;
        $details = [
            'title' => $request->subject,
            'body' => $request->message,
            'userName' => $newUser,
            'userCity' => $userCity
        ];
        Mail::to('Dolgushing@yandex.ru')->send(new NewUser($details));

        if ($feedback->save()) {
            return response()->json(['success' => true, 'message' => 'отправлено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
}
