@extends('layout')

@section('content')
<section id="about" class="about">
    <div class="container" style="margin-top: 4rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Восстановление пароля') }}</div>
                    <div class="forgot">
                        <p>Изменить ваш пароль в три простых шага.</p>
                        <ol class="list-unstyled">
                            <li><span class="text-primary text-medium">1. </span>Введите ваш email ниже в поле ввода</li>
                            <li><span class="text-primary text-medium">2. </span>Наша система отправит на вашу почту ссылку.</li>
                            <li><span class="text-primary text-medium">3. </span>Используйте ссылку для изменения пароля</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail адрес') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Отправить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
