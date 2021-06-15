@component('mail::message')
# Вам оставили отзыв!
Имя кто оставил отзыв <strong>{{ $details['userName'] }}</strong><br>
Оценка <strong>{{ $details['rating'] }}</strong><br>
@component('mail::button', ['url'=> route('profileDetails',$details['id']),'color' => 'success'])
    Посмотреть
@endcomponent
<br>
@endcomponent
