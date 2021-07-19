<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAndCategories;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriptionUserController extends Controller
{
    public function getEmailUsers (Request $request) {
        $validator = Validator::make($request->all(),[
            'email_user' => 'required|string|max:150',
        ]);
        $feed_back = array();
        if ($validator->passes()){
            $subscriptionUser = new SubscriptionUser;
            $subscriptionUser->email_user = $request->email_user;
            $subscriptionUser->save();
            $feed_back['type']='alert-success';
            $feed_back['message']='Вы успешно подписаны';
            $feed_back['error']=array();
        } else {
            $feed_back['type']='alert-danger';
            $feed_back['error']=  $validator->errors()->all();
        }
        return json_encode($feed_back);
    }

    public function sendEmailToSubscribeUser()
    {
        $events = EventAndCategories::whereIn('category_id', [1,2,3,4])->distinct()->get('event_id');
        $eventsResult = [];
        foreach ($events as $event) {
            $eventsResult[] = $event->event_id;
        }
        $enddate = Carbon::now()->addMonth()->toDate();
        $startdate = Carbon::now()->toDate();
        $newDate = $enddate->format('Y-m-d');
        $nowDate = $startdate->format('Y-m-d');
        $events = Event::whereIn('id', $eventsResult)
            ->whereBetween('event_start_date', [$nowDate,$newDate])
            ->orderBy('event_start_date')->get();
        $details = array();
        foreach ($events as $item => $event) {
            if($event->event_start_end ===  null){
                $event->event_start_end = '';
            }
            $details[$event->id]['title'] = $event->event_title;
            $details[$event->id]['event_start_date'] = $event->event_start_date;
            $details[$event->id]['event_start_end'] = $event->event_start_end;
            $details[$event->id]['event_url'] = $event->event_url;
        }
        $subscribeUser = SubscriptionUser::all();
        Mail::to('Dolgushing@yandex.ru')->send(new \App\Mail\SubscriptionUser($details));
    }
}

