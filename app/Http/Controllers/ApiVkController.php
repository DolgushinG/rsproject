<?php

namespace App\Http\Controllers;

use App\Mail\newInfo;
use App\Models\ClimbingGym;
use App\Models\FedGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ApiVkController extends Controller
{
    public function takeResponse()
    {
        $climbGym = ClimbingGym::get('group_id');
        $fedGroup = FedGroup::get('group_id');
        $groups = [];
        foreach($climbGym as $item){
            $groups[] = $item->group_id;
        }
        foreach($fedGroup as $item){
            $groups[] = $item->group_id;
        }
        $config = [
            'method' => 'wall.get',
            'access_token' => '7d1c87877d1c87877d1c8787087d642edb77d1c7d1c87871dea59b59d0b00604747bcfe',
            'VK_GROUP_ID' => '7907676',
            'VK_API_VERSION' => '5.80',
            'url' => 'https://api.vk.com/method/',
        ];
        $responsegroup = array();
        foreach ($groups as $group){
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $config['url'] . $config['method'] . '?' . 'owner_id=-' . $group . '&offset=0&count=1&' . 'access_token=' . $config['access_token'] . '&v=' . $config['VK_API_VERSION']);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($curl_handle);
            curl_close($curl_handle);
            $post = json_decode($response);
            if(isset($post->response->items[0]->date)) {
                $date = $post->response->items[0]->date;
                $today = Carbon::now()->toDate();
                if(gmdate("d-m-Y", $date) === $today->format('d-m-Y')) {
                    if(isset($post->response->items[0]->text)){
                        $text = $post->response->items[0]->text;
                        $keys = ['соревнован', 'регистрац','фестивал'];
                        foreach ($keys as $key) {
                            if (strpos($text, $key) !== false) {
                                if(strpos('скало', $key) !== false){
                                    $responsegroup[$group]['key'] = $key;
                                    $responsegroup[$group]['date'] = gmdate("d-m-Y", $date);
                                    $responsegroup[$group]['url'] = 'https://vk.com/club'.$group;
                                    $responsegroup[$group]['text'] = $text;
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!empty($responsegroup)){
            Mail::to('Dolgushing@yandex.ru')->send(new NewInfo($responsegroup));
        }
    }
}
