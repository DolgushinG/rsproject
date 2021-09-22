<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\Holds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HoldsController
{
    public function index() {
        $holds = Holds::where('active_status', '=', '1')->orderByRaw('updated_at - created_at DESC')->get();
        $euroHolds = $holds->where('zone', '=', 'Europe');
        $asia = $holds->where('zone', '=', 'Asia');
        $usa = $holds->where('zone', '=', 'USA');
        $oceania = $holds->where('zone', '=', 'Oceania');
        return view('holds.index', compact(['holds','euroHolds','asia','usa','oceania']));
    }

    public function holds(Request $request) {
        $holds = Holds::where('active_status', '=', '1')->orderByRaw('updated_at - created_at DESC')->get();
        $euroHolds = $holds->where('zone', '=', 'Europe');
        $asia = $holds->where('zone', '=', 'Asia');
        $usa = $holds->where('zone', '=', 'USA');
        $oceania = $holds->where('zone', '=', 'Oceania');
        return view('holds.holds', compact(['holds','euroHolds','asia','usa','oceania']));
    }

    public function sendHolds(Request $request) {
        $messages = array(
            'name.required' => 'Name required',
            'zone.required' => 'Zone end required',
            'url.required' => 'Url required',
            'materials.required' => 'Date end required',
            'country.required' => 'Country required',
            'city.required' => 'City required',
            'image.image' => 'image - jpg,png,jpeg',
            'image.required' => 'image required',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'zone' => 'required',
            'url' => 'required',
            'materials' => 'required',
            'country' => 'required',
            'city' => 'required|string',
            'image' => 'required|image',
        ],$messages);
        if ($validator->errors()->all())
        {
            $response = new Response();
            foreach ($validator->errors()->all() as $msg) {
                return $response->setStatusCode(422,$msg);
            }

        }
        if($request){
            $holds = new Holds();
            $holds->name = $request->name;
            $holds->zone = $request->zone;
            $holds->url = $request->url;
            $holds->materials = join(',', $request->materials);
            $holds->headquarters = $request->country.' - '.$request->city;
            $holds->active_status = 0;
            $holds->save();

            if (!file_exists('storage/images/holds/'.$holds->id.'/')) {
                mkdir('storage/images/holds/'.$holds->id.'/', 0777, true);
            }
            if ($request->image) {
                $file = $request->file('image');
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $file->storeAs('/images/holds/'.$holds->id.'/' , $imageName, 'public');
                $holds->members = '/images/holds/'.$holds->id.'/'.$imageName;
            }
        }
        $details = [
            'title' => $request->name,
            'body' => $request->url,
            'userName' => $request->city,
            'userCity' => $request->country
        ];
        Mail::to('Dolgushing@yandex.ru')->send(new NewUser($details));

        if ($holds->save()) {
            return response()->json(['success' => true, 'message' => 'отправлено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
}
