<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else

        <img src="{{asset('storage/images/logo/logors.svg')}}" class="logo" alt="logo_rs">
{{--{{ $slot }}--}}
@endif
</a>
</td>
</tr>
