@component('mail::message')
           @foreach($details as $i => $event)
        Соревнование <strong>{{ $event['title'] }}</strong><br>
        Дата старта <strong>{{ $event['event_start_date'] }}</strong><br>
        Дата завершениe <strong>{{ $event['event_start_end'] }}</strong><br>
        @component('mail::button', ['url'=> $event['event_url'],'color' => 'success'])
            Открыть подробности {{$event['title']}}
        @endcomponent
           @endforeach
@endcomponent
