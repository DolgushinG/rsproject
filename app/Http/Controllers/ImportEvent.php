<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventAndCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ImportEvent extends Controller
{
    public function importEvent (Request $request)
    {
        if($request->url){
            $json = json_decode(file_get_contents($request->url), true);
            foreach ($json['events'] as $event => $value) {
                $eventob = new Event;
                $eventob->event_title = $value['event'];
                $eventob->event_start_date = $value['local_start_date'];
                foreach ($value['d_cats'] as $d_cat => $i) {
                    $eventob->event_description .= $i['name']. ' ';
                }
                $eventob->event_start_time = '12:00 AM';
                $eventob->event_end_date = $value['local_end_date'];
                $eventob->event_end_time = '12:00 AM';
                $eventob->event_city = $value['timezone']['value'];
                $eventob->event_url = 'https://www.ifsc-climbing.org/index.php/component/ifsc/?view=event&WetId=' . $value['event_id'];
                $html = file_get_contents('https://www.ifsc-climbing.org/index.php/component/ifsc/?view=event&WetId=' . $value['event_id']);
                preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $html, $matches);
                $imagePoster = '';
                foreach ($matches[1] as $urlImage) {
                    $imageStr = substr($urlImage, 0, 44);
                    if ($imageStr === 'https://cdn.ifsc-climbing.org/images/Events/') {
                        $imagePoster .= $urlImage;
                    }
                }
                if ($imagePoster != '') {
                    $content = file_get_contents($imagePoster);
                    if (!file_exists('storage/images/events/' . $value['event_id'] . '/' . $value['event_id'])) {
                        mkdir('storage/images/events/' . $value['event_id'] . '/' . $value['event_id'], 0777, true);
                    }
                    file_put_contents(public_path('storage/images/events/' . $value['event_id'] . '/') . $value['event_id'] . '.png', $content);
                    $eventob->event_image = '/images/events/' . $value['event_id'] . '/' . $value['event_id'] . '.png';
                } else {
                    $eventob->event_image = '/images/events/default/default.jpeg';
                }
                $eventob->save();

                $eventCategories = new EventAndCategories;
                $eventCategories->category_id = 5;
                $eventCategories->event_id = $eventob->id;
                $eventCategories->save();

                foreach ($value['d_cats'] as $d_cat => $i) {
                    $eventCategories = new EventAndCategories;
                    $eventCategories->event_id = $eventob->id;
                    $x = substr($i['name'], 0, 4);
                    if ($x == 'BOUL') {
                        $eventCategories->category_id = 2;
                    }
                    if ($x == 'LEAD') {
                        $eventCategories->category_id = 1;
                    }
                    if ($x == 'SPEE') {
                        $eventCategories->category_id = 7;
                    }
                    $eventCategories->save();
                }
            }
        }
        if ($request->file_json){
            $file_data = file_get_contents(base_path()."/data.json");
            $data = json_decode($file_data, true);
            foreach ($data as $event){
                $eventob = new Event;
                $eventob->event_title = $event["name"];
                $eventob->event_start_date = $event["date_start"];
                $eventob->event_start_time = "08:00";
                $eventob->event_end_date = $event["date_end"];
                $eventob->event_end_time = "23:00";
                $eventob->event_city = $event["place"];
                $eventob->event_url = $event["link"];
                $eventob->event_image = "/images/events/default/cfr.jpeg";
                $eventob->save();
                foreach($event['event_categories'] as $id => $x){
                    $eventAndCategory = new EventAndCategories;
                    $eventAndCategory->event_id = $eventob->id;
                    $eventAndCategory->category_id = intval($x);
                    $eventAndCategory->save();
                }
            }
            $eventCategories = new EventAndCategories;
            $eventCategories->category_id = 5;
            $eventCategories->event_id = $eventob->id;
            $eventCategories->save();

        }

    }
    public function importInterEvent() {
        return view('event.indexImport');
    }

}
