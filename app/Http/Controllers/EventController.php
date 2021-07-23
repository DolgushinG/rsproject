<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\Category;
use App\Models\EventAndCategories;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function addEvent(){
        $categories = Category::all();
        return view('event.index',compact('categories'));
    }
    public function sendEvent(Request $request){
        $messages = array(
            'event_title.required' => 'Title name required',
            'event_start_date.required' => 'Date end required',
            'event_start_time.required' => 'Time start required',
            'event_end_date.required' => 'Date end required',
            'event_end_time.required' => 'Time end required',
            'event_city.required' => 'City required',
            'event_url.required' => 'url required',
            'event_image.image' => 'image - jpg,png,jpeg',
            'event_image.required' => 'image required',
        );
        $validator = Validator::make($request->all(), [
            'event_title' => 'required|string',
            'event_start_date' => 'required',
            'event_start_time' => 'required',
            'event_end_date' => 'required',
            'event_end_time' => 'required',
            'event_city' => 'required|string',
            'event_url' => 'required|string',
            'event_image' => 'required|image',
        ],$messages);
        if ($validator->errors()->all())
        {
            $response = new Response();
            foreach ($validator->errors()->all() as $msg) {
                return $response->setStatusCode(422,$msg);
            }

        }
        if($request){
            $event = new Event();
            $event->event_title = $request->event_title;
            $event->event_start_date = $request->event_start_date;
            $event->event_start_time = $request->event_start_time;
            $event->event_end_date = $request->event_end_date;
            $event->event_end_time = $request->event_end_time;
            $event->event_description = $request->event_description;
            $event->event_city = $request->event_city;
            $event->event_url = $request->event_url;
            $event->active_status = 0;
            $event->save();
            foreach($request['event_categories'] as $id => $x){
                $eventAndCategory = new EventAndCategories;
                $eventAndCategory->event_id = $event->id;
                $eventAndCategory->category_id = $id;
                $eventAndCategory->save();
            }
            if (!file_exists('storage/images/events/'.$event->id.'/')) {
                mkdir('storage/images/events/'.$event->id.'/', 0777, true);
            }
            if ($request->event_image) {
                $file = $request->file('event_image');
                $imageName = time() . '.' . $request->file('event_image')->getClientOriginalExtension();
                $file->storeAs('/images/events/'.$event->id.'/' , $imageName, 'public');
                $event->event_image = '/images/events/'.$event->id.'/'.$imageName;
            }
        }
        $details = [
            'title' => $request->subject,
            'body' => $request->event_description,
            'userName' => $request->event_start_date,
            'userCity' => $request->event_city
        ];
        Mail::to('Dolgushing@yandex.ru')->send(new NewUser($details));

        if ($event->save()) {
            return response()->json(['success' => true, 'message' => 'отправлено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
}
