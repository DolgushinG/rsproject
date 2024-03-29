@extends('layout')

@section('content')
    <main id="main">
        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css"
              rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up" style="margin-top: 4rem;">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" style="border-radius: 16px;">
                        <div class="page-wrapper">
                            <div class="wrapper wrapper--w720">
                                <div class="card card-3" style="background: rgba(17, 25, 54, 0.9)!important;">
                                    <div class="card-body">
                                        <ul class="tab-list" style="padding-top: 0px;">
                                            <li class="tab-list__item active">
                                                <a class="tab-list__link" href="#tab1" data-toggle="tab">Поиск
                                                    подготовщиков и соревнований</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <form method="POST" id="searchForm">
                                                    @csrf
                                                    <div class="input-group">
                                                        <label class="label">Город</label>
                                                        <input class="input--style-1 search-slt" type="text" id="city"
                                                               name="city_name" placeholder="Введите город"
                                                               required="required">
                                                        <i class="zmdi zmdi-pin input-group-symbol"></i>
                                                    </div>
                                                    @foreach ($categories as $category)
                                                        <div class="checkbox-row">
                                                            <label
                                                                class="checkbox-container m-r-45">{{ $category->category_name }}
                                                                <input type="checkbox" id="categories"
                                                                       name="categories[{{ $category->id }}]"
                                                                       value="{{ $category->id }}" unchecked>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <button id="search" href="#content"
                                                                        class="btn-submit get-started scrollto searchUser"
                                                                        style="font-size: 18px;font-weight: 5!important; background-color: #007bff; color: white!important;"
                                                                        type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" fill="currentColor"
                                                                         class="bi bi-search" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                                    </svg>
                                                                    поиск подготовщиков
                                                                </button>
                                                            </div>
                                                            <div class="col">
                                                                <button id="searchEvent" value="1" href="#content"
                                                                        class="btn-submit get-started scrollto searchEvent"
                                                                        style="font-size: 18px;font-weight: 5!important; background-color: #00ad5f; color: white!important;"
                                                                        type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" fill="currentColor"
                                                                         class="bi bi-search" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                                    </svg>
                                                                    поиск соревнований
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="container" style="margin-top: 1rem;
                                margin-bottom: -1rem;">
                                                    <a href="{{route('register')}}">
                                                        <span>хотите чтобы вас нашли ?</span> зарегистрируйтесь</a>
                                                </div>
                                                <div class="container" style="margin-top: 1rem;
                                margin-bottom: -1rem;">
                                                    <a href="{{route('add-event')}}" style="color: #00ad5f"> <span> Не нашли свои соревнования ? добавьте здесь</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center text-white"
                                style="background-color: #007bff!important;">
                                Город
                                <span class="align-items-right">Кол-во подготовщиков</span>
                            </li>
                            @foreach ($userCityCount as $city => $count)
                                <button id="cityTable" value="{{$city}}" style="border: 0;">
                                    <li class="search_city list-group-item d-flex justify-content-between align-items-center table-hover">
                                        {{$city}}
                                        <span class="badge badge-primary badge-pill">{{$count}}</span>
                                </button></li>
                            @endforeach

                        </ul>
                        <ul class="list-group" style="margin-top: 5px">
                            <li class="list-group-item d-flex justify-content-between align-items-center text-white"
                                style="background-color: #00ad5f!important;">
                                Город
                                <span class="align-items-right">Кол-во планируемых событий</span>
                            </li>
                            @foreach ($eventCityCount as $event => $count)
                                <button id="eventTable" value="{{$event}}" style="border: 0;">
                                    <li class="search_city list-group-item d-flex justify-content-between align-items-center table-hover">
                                        {{$event}}
                                        <span class="badge badge-primary badge-pill"
                                              style="background-color: #00ad5f">{{$count}}</span>
                                </button></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">

                    <div class="row gy-4">

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-people"></i>
                                <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{$userCount}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                                    <p>Всего подготовщиков</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-building" style="color: #ee6c20;"></i>
                                <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{count($userCityList)}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                                    <p>Количество городов</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-flag"></i>
                                <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{$eventCount}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                                    <p>Всего соревнований</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-person-circle" style="color: #bb0852;"></i>
                                <div>
                                    <span data-purecounter-start="0" data-purecounter-end="{{$usersSenior}}"
                                          data-purecounter-duration="1" class="purecounter"></span>
                                    <p>Главные подготовщики</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Counts Section -->
            @include('climbingMoves.homeMoves')
            @include('climbingGyms.likesClimbingGym')
            <div id="content" style="padding-top: 2rem">
                <div id="resultList"></div>
            </div>
        </section>

{{--        <section class="home-newsletter">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="single">--}}
{{--                            <form action="{{route('subscriptionUser')}}" id="subscribeUser"--}}
{{--                                  class="php-email-form-subscribe">--}}
{{--                                @csrf--}}
{{--                                <h2>Подписаться на рассылку</h2>--}}
{{--                                <div class="form-group">--}}
{{--                                    <p style="color:white">Информации о ближайших на месяц (городских)--}}
{{--                                        соревнований</p>--}}
{{--                                    <input id="email" type="email" name="email_user" class="form-control"--}}
{{--                                           placeholder="Введите ваш email">--}}
{{--                                </div>--}}
{{--                                <button class="btn btn-theme" id="subscribeBtn" type="button">Подписаться</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        @include('holds.homeHolds')
        @include('event.recentlyEvent')
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Недавно зарегистрированные подготовщики</p>
                </header>
                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">
                        @foreach ($latestUsers as $user)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <a href="{{route('profileDetails', $user->id)}}">
                                    <h2 style="text-transform: capitalize;">{{ $user->name }}</h2></a>
                                    </p>
                                    <div class="profile mt-auto">
                                        <a href="{{route('profileDetails', $user->id)}}"><img
                                                src="storage/{{$user->photo}}" class="testimonial-img" alt=""></a>
                                    </div>
                                    @if($user->exp_level == 'senior')
                                        <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill"
                                                                                    title="@lang('somewords.Опытный')"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="bottom"></i></p></a>
                                    @elseif($user->exp_level == 'middle')
                                        <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill"
                                                                                    title="@lang('somewords.Средний уровень')"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="bottom"></i></p></a>
                                    @else
                                        <p> @lang('somewords.'.$user->exp_level) <i class="bi bi-info-circle-fill"
                                                                                    title="@lang('somewords.Начинающий')"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="bottom"></i></p></a>
                                    @endif
                                    <a href="{{route('profileDetails', $user->id)}}"><p>
                                            Максимальная категория лазания - {{$user->grade}}
                                        </p></a>
                                    <p>
                                        Город - {{$user->city_name}}
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        @include('blog.homePosts')
    </main>
    <script type="text/javascript" src="{{ asset('js/search.js?v=1.0') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
    <!-- End #main -->
    @include('sponsors.sponsors')

    <script>
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        // Windows Phone must come first because its UA also contains "Android"
        // if (/windows phone/i.test(userAgent)) {
        //     return "Windows Phone";
        // }

        if (/android/i.test(userAgent)) {
            document.getElementById("navbar").classList.add('android');
        }
        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            document.getElementById("navbar").classList.remove('android');
        }
        document.querySelectorAll('video').forEach((e)=> {e.setAttribute('autoplay','')})
    </script>
@endsection
