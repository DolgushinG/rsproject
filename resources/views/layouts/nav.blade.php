<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{asset('storage/images/logo/logors.svg')}}" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul class="nav">
          <li><a class="nav-link scrollto" href="{{route('home')}}">Главная</a></li>
          <li><a href="https://bouldertime.ru">Статьи</a></li>

          <li><a class="nav-link scrollto" href="{{route('feedback')}}">Связаться с нами</a></li>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                <li><a class="nav-link scrollto" href="{{route('login')}}">Вход</a></li>
                @endif

                @if (Route::has('register'))
                      <li><a class="nav-link scrollto" href="{{route('register')}}">Регистрация</a></li>
                @endif
            @else
                <li class="dropdown" style="text-transform: capitalize;"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                  <ul>
                    <li><a href="{{route('profile')}}">Профиль</a></li>
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
