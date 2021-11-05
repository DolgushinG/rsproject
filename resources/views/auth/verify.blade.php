@extends('layout')

@section('content')
    <section class="hero" style="height: 43vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div id="verify_email" class="card">
                        <div class="card-header">{{ __('Подтвердите вашу почту') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Новая ссылка была отправлена на ваш email адрес.') }}
                                </div>
                            @endif

                           <p>{{ __('Проверьте ваш email, и подтвердите вашу почту по ссылке') }}</p> <br>
                                <p>{{ __('Если вы не получили письмо с ссылкой') }},</p><br>

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-submit p-0 m-0 align-baseline">{{ __('Отправить повторно') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
