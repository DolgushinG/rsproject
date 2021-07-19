<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\EventAndCategories;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email every week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        foreach ($subscribeUser as $user) {
            Mail::to($user->email_user)->send(new \App\Mail\SubscriptionUser($details));
        }
    }
}
