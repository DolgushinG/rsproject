@component('mail::message')
            Подборка соревнований за месяц от {{ config('app.name') }}
           @foreach($details as $i => $event)
            Соревнование  - <strong>{{ $event['title'] }}</strong><br>
            Дата старта  : <strong>{{ $event['event_start_date'] }}</strong><br>
            Дата завершения :<strong>{{ $event['event_start_end'] }}</strong><br>
            Подробности - <a href="https://{{$event['event_url']}}">ссылка</a><br>
            <hr>
           @endforeach
            Спасибо что вы с нами,<br>
            {{ config('app.name') }}

@endcomponent
