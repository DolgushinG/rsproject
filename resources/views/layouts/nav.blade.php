<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <img id="dark-logo" src="{{asset('storage/images/logo/dark_logo.svg')}}" alt="">
            <img id="white-logo" src="{{asset('storage/images/logo/white_logo.svg')}}" alt="">
        </a>
        <div class="form-check form-switch">
            <input class="form-check-input"
                   type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">
                <img id="dark-icon" alt="dark-theme" src="{{asset('storage/images/switch/dark-theme.png')}}">
                <img id="white-icon" alt="white-theme" src="{{asset('storage/images/switch/white-theme.png')}}">
            </label>

        </div>
        <nav id="navbar" class="navbar">
            <ul class="nav">
                <li><a class="nav-link scrollto" href="{{route('home')}}">Главная</a></li>
                @auth
                <li class="dropdown" style="text-transform: capitalize;"><a
                        href="#"><span>Соревнования</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="{{route('add-event')}}">Добавить соревнование</a></li>
                    </ul>
                </li>
                @endauth
                <li class="dropdown"><a
                        href="#"><span>База знаний</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('posts')}}">Статьи</a></li>
                        <li><a class="nav-link scrollto" href="{{route('climbing-moves')}}">Скалолазные движения</a></li>
                        <li><a class="nav-link scrollto" href="{{route('climbing-holds')}}">Производители зацеп</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a
                        href="{{route('climbing-gyms')}}"><span>Скалодромы</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto" href="{{route('climbing-gyms')}}">Все скалодромы</a></li>
{{--                        @auth--}}
{{--                        <li><a class="nav-link scrollto" href="{{route('add-climbing-gyms')}}">Добавить скалодром</a></li>--}}
{{--                        @endauth--}}
                    </ul>
                </li>
{{--                <li class="dropdown"><a--}}
{{--                        href="#"><span>Поддержка и связь</span> <i class="bi bi-chevron-down"></i></a>--}}
{{--                    <ul>--}}
{{--                        <li><a class="nav-link scrollto" href="{{route('support-project')}}">Поддержка проекта</a></li>--}}
{{--                        @auth--}}
{{--                        <li><a class="nav-link scrollto" href="{{route('feedback')}}">Связаться с нами</a></li>--}}
{{--                        @endauth--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <!-- Authentication Links -->
                @guest
                    <li class="dropdown" style="text-transform: capitalize;"><a
                            href="#"><span>Авторизация</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @if (Route::has('login'))
                                <li><a class="nav-link scrollto" href="{{route('login')}}">Вход</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li><a class="nav-link scrollto" href="{{route('register')}}">Регистрация подготовщика</a></li>
                            @endif
{{--                            @if(false)--}}
{{--                                @if (Route::has('register.organizer'))--}}
{{--                                    <li><a class="nav-link scrollto" href="{{route('register.organizer')}}">Регистрация организатора</a></li>--}}
{{--                                @endif--}}
{{--                            @endif--}}
                        </ul>
                    </li>
                @else
                    <li class="dropdown" style="text-transform: capitalize;"><a
                            href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>

                            @if(Auth()->user()->is_organizator())
                                <li><a href="{{route('profile.organizer')}}">Профиль организатора</a></li>
                            @else
                                <li><a href="{{route('profile')}}">Профиль</a></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><!-- End Header -->
