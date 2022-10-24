@extends('layout')

@section('content')
<section id="about" class="about">
    <div class="container" data-aos="fade-up" style="margin-top: 4rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="wrapperLogin fadeInDown">
                    <div id="formContent">
                <!-- Tabs Titles -->
                <!-- Icon -->
                        <div class="fadeIn first" style="padding-top: 17px;">
                            <h2>Войти в личный аккаунт</h2>
                        </div>
                        <!-- Login Form -->
{{--                        @if(Auth()->user()->is_organizator())--}}
{{--                        @else--}}
{{--                        @endif--}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" type="email" class="fadeIn third inputLogin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="введите логин">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="password" type="password" class="fadeIn third inputLogin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="введите пароль">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="submit" class="fadeIn fourth" value="Вход" style="width: auto">
                        </form>
                        <!-- Remind Passowrd -->
                        @if (Route::has('password.request'))
                        <div id="formFooter">
                            <a class="underlineHover" href="{{ route('password.request') }}">
                                {{ __('Забыли свой пароль?') }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
