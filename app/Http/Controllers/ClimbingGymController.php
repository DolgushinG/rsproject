<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\AllGyms;
use App\Models\LikeDislike;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ClimbingGymController extends Controller
{
    public function indexAddClimbingGyms(){
        return view('climbingGyms.addNewClimbingGym');
    }

    public function addClimbingGyms(Request $request){
        $messages = array(
            'name.required' => 'Name required',
            'region.required' => 'Region required',
            'city.required' => 'City required',
            'country.required' => 'Country start required',
            'phone.required' => 'Phone required',
            'time1.required' => 'Time required',
            'time2.required' => 'Time required',
            'scheduleDay.required' => 'Day of week required',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'region' => 'required',
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'time1' => 'required',
            'time2' => 'required',
            'scheduleDay' => 'required',
        ],$messages);
        if ($validator->errors()->all())
        {
            $response = new Response();
            foreach ($validator->errors()->all() as $msg) {
                return $response->setStatusCode(422,$msg);
            }

        }
        if($request){
            $allGyms= new AllGyms;
            $allGyms->name = $request->name;
            $allGyms->address = $request->street.','.$request->house;
            $allGyms->city = $request->city;
            $allGyms->region = $request->region;
            $allGyms->url = $request->url;
            $allGyms->country = $request->country;
            $allGyms->phone = $request->phone;
            $allGyms->active_status = 0;
            $hours = '';
            foreach($request['scheduleDay'] as $id => $x){
                $hours .= $x.' ';
            }
            $hours.= $request->time1.' - '.$request->time2;
            $allGyms->hours = $hours;
            $allGyms->save();
        }
        $details = [
            'title' => $request->name,
            'body' => $request->address,
            'userName' => $request->url,
            'userCity' => $hours
        ];
        Mail::to('Dolgushing@yandex.ru')->send(new NewUser($details));

        if ($allGyms->save()) {
            return response()->json(['success' => true, 'message' => 'отправлено'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'ошибка сохранения'], 422);
        }
    }
    public function import(Request $request) {
        if($request->url) {
            $json = json_decode(file_get_contents($request->url), true);
            foreach ($json['features'] as $i => $gym) {
                $climbingGym = new AllGyms;
                $climbingGym->name = $gym['properties']['CompanyMetaData']['name'];
                $climbingGym->active_status = 1;
                $climbingGym->address = $gym['properties']['CompanyMetaData']['address'];
                if(isset($gym['properties']['CompanyMetaData']['url'])){
                    $climbingGym->url = $gym['properties']['CompanyMetaData']['url'];
                }
                if(isset($gym['properties']['CompanyMetaData']['Phones'])){
                    $climbingGym->phone = $gym['properties']['CompanyMetaData']['Phones'][0]['formatted'];
                }

                if(isset($gym['properties']['CompanyMetaData']['Hours'])){
                    $climbingGym->hours = $gym['properties']['CompanyMetaData']['Hours']['text'];
                }
                $climbingGym->long = $gym['properties']['boundedBy'][0][0];
                $climbingGym->lat = $gym['properties']['boundedBy'][0][1];
                $infoAddress = explode(", ", $gym['properties']['CompanyMetaData']['address']);
                if(count($infoAddress) > 1){
                    $climbingGym->country = $infoAddress[0];
                    $climbingGym->city = $infoAddress[1];
                } else {
                    $climbingGym->country = $infoAddress[0];
                }
                $climbingGym->save();
            }
        }
    }

    public function index() {
        $allCityList = AllGyms::where('active_status', '=', '1')->where('country', '=', 'Россия')->select('city')->distinct()->get('city');

        $allCityListCount = [];
        foreach ($allCityList as $city) {
            $allCityListCount[$city->city] = AllGyms::where('city', '=', $city->city)->count();
        }
        $allGymsPagination = AllGyms::orderBy('id')->where('active_status', '=', '1')->get();
        $allGymsCity = AllGyms::where('country', '=', 'Россия')->select('city')->distinct()->get('city');
        $listCity = array();
        foreach ($allGymsCity as $item => $city) {
            foreach ($allGymsPagination as $gym) {
                if($gym->city === $city->city){
                    $listCity[$city->city][] = $gym;
                }
            }
        }
        $allGymsCount = 0;
        arsort($listCity);
        arsort($allCityListCount);
        foreach ($listCity as $i => $city){
            $allGymsCount += count((array)$city);
        }
        $likesDislikes = LikeDislike::whereNotNull('all_gyms_id')->whereNotIn('dislike', [1])->get();
        $likes = [];
        foreach ($likesDislikes as $item){
            $likes[] = $item->all_gyms_id;
        }
        $likesDislikesGyms = AllGyms::whereIn('id', $likes)->simplePaginate(7);
       return view('climbingGyms.index', compact(['allGymsPagination','allGymsCity','listCity','allCityListCount','allGymsCount','likesDislikesGyms']));
    }
    public function saveLikeDislike(Request $request)
    {
        $likeGym = LikeDislike::where('all_gyms_id','=', $request->gym)->get();
        $likeCheckInGym = LikeDislike::where('all_gyms_id','=', $request->gym)->first();

        $data = new LikeDislike;
        if($likeCheckInGym !== null){
            foreach($likeGym as $like){
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
                    $allGyms = AllGyms::find($request->gym);
                    $allGyms->sum_likes = $allGyms->likesGyms()+1;
                    $allGyms->save();
                    $data->all_gyms_id = $request->gym;
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
            $allGyms = AllGyms::find($request->gym);
            $allGyms->sum_likes = $allGyms->likesGyms()+1;
            $allGyms->save();
            $data->all_gyms_id = $request->gym;
            $data->user_ip = $request->ip();
            $data->save();
            return response()->json([
                'bool' => true
            ]);
        }

    }

    public function votesGyms () {
        $likesDislikes = LikeDislike::whereNotNull('all_gyms_id')->whereNotIn('dislike', [1])->get();
        $likes = [];
        foreach ($likesDislikes as $item){
            $likes[] = $item->all_gyms_id;
        }
        $likesDislikesGyms = AllGyms::whereIn('id', $likes)->simplePaginate(7);
        return view('climbingGyms.votesGyms', compact('likesDislikesGyms'));
    }
}
