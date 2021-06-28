@extends('layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container" style="text-transform: capitalize;">
            <div class="row">
                    <div class="col">
                        <ol>
                        <li><a href="{{route('home')}}">Главная</a></li>
                        <li>Профиль</li>
                        </ol>
                    </div>

            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h2>Профиль<br>{{$user->name}}</h2>
                </div>
                <div class="col-sm">
                    <strong>Город</strong>: <br> {{$user->city_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    @if(Cache::has('user-is-online-' . $user->id))
                        <span><i class="bi bi-circle-fill" style="font-size: 25px;color: green"></i>  Online</span>
                    @else
                        <span><i class="bi bi-circle-fill" style="font-size: 25px;color: grey"></i> Offline</span>
                    @endif
                    @if($user->last_seen != null)
                        {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                    @endif
                    <span id="status_{{$user->id}}"></span>
                    <script>
                        window.setInterval(function(){
                            $.ajax({
                                url: "{{ url('live-status') }}/{{ $user->id }}",
                                method: 'GET',
                                success: function (result) {
                                    $('#status_{{$user->id}}').html("</br> Last Seen: " + result.last_seen);
                                }
                            });
                        }, 10000); // call every 10 seconds
                    </script>
                </div>
                <div class="col-4">
                    @if($user->all_time)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-briefcase" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        - Ищу постоянное место для накрутки
                    @endif
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="portfolio-details-slider">
                        <div class="align-items-center">
                            <div class="details-img">
                                <img src="/storage/{{$user->photo}}" alt="">
                                <div class="social-details" style="margin-top: 5px">
                                    @if($user->telegram)
                                        <a href="https://t.me/{{$user->telegram}}" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                                            </svg>
                                            <span class="visually-hidden">Button</span>
                                        </a>
                                    @endif
                                    @if($user->instagram)
                                        <a href="https://instagram.com/{{$user->instagram}}" class="btn btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                 fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                                            </svg>
                                            <span class="visually-hidden">Button</span>
                                        </a>
                                    @endif

                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="h6 card-title">Облаcть накрутки</h5>
                                @foreach($categories as $category)
                                    <span href="#"
                                          class="badge bg-primary me-1 my-1">{{$category->category_name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="portfolio-info">
                        <h3>Опыт подготовки</h3>
                        <ul>
                            <li><strong>Подготовка местных стартов (фестивалей)</strong>: <br>
                                <div class="card-body">

                                    <div class="progress mb-3" style="height: 15px">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: {{100*$user->exp_local/5}}%"
                                             aria-valuemin="0"
                                             aria-valuemax="5">{{100*$user->exp_local/5}}%</div>

                                    </div>
                                </div>
                            </li>
                            <li><strong>Подготовка национальных стартов</strong>: <br>
                                <div class="card-body">
                                    <div class="progress mb-3" style="height: 15px">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: {{100*$user->exp_national/5}}%"
                                             aria-valuemin="0"
                                             aria-valuemax="5">{{100*$user->exp_national/5}}%</div>
                                    </div>
                                </div>
                            </li>
                            <li><strong>Подготовка международных стартов</strong>: <br>
                                <div class="card-body">
                                    <div class="progress mb-3" style="height: 15px">
                                        <div class="progress-bar bg-primary" role="progressbar"
                                             style="width: {{100*$user->exp_international/5}}%"
                                             aria-valuenow="0"
                                             aria-valuemax="5">{{100*$user->exp_international/5}}%</div>
                                    </div>
                                </div>
                            </li>
                            @if($user->description)
                                <li><strong>О себе</strong>: <br>{{$user->description}}</li>
                                <hr>
                            @endif
                            @if($user->contact)
                                <li><strong>Контакты для связи</strong>: <br>{{$user->contact}}</li>
                            @endif
                            @if($user->company)
                                <hr>
                                <li><strong>Место работы (скалодром)</strong>: <br>{{$user->company}}</li>
                            @endif
                            <hr>
                            <li><strong>Уровень подготовки</strong>: <br>
                                @if($user->exp_level == 3)
                                    Опытный <i class="bi bi-info-circle-fill"
                                                                            title="@lang('somewords.Опытный')"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"></i></a>
                                @elseif($user->exp_level == 2)
                                    Средний уровень <i class="bi bi-info-circle-fill"
                                                                            title="@lang('somewords.Средний уровень')"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"></i></a>
                                @else
                                    Начинающий <i class="bi bi-info-circle-fill"
                                                                            title="@lang('somewords.Начинающий')"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"></i></a>
                                @endif</li>
                            <hr>
                            <li><strong>Желаемая оплата</strong>:
                                @if($user->salary_hour)
                                <br>{{$user->salary_hour}} руб - час
                                @endif
                                @if($user->salary_route_rope)
                                <br>{{$user->salary_route_rope}} руб - маршрут трудность
                                @endif
                                @if($user->salary_route_bouldering)
                                <br>{{$user->salary_route_bouldering}} руб - маршрут боулдеринг
                                @endif
                            </li>
                            <hr>
                            @if($user->educational_requirements === 'yes')
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                         class="bi bi-patch-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                        <path
                                            d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                                    </svg>
                                    - </i><strong> Прошел курсы подготовщиков</strong></li>
                            @endif
                            @if($user->other_city)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32 " fill="currentColor"
                                         class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V22 2 0 0 0-2-2H2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    - <strong>Не готов ездить в другие города</strong></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-md-12">
            <div class="offer-dedicated-body-left">
                <div class="tab-content" id="pills-tabContent">
                    <section id="counts" class="counts">
                        <div class="container" data-aos="fade-up">

                            <div class="row gy-4">

                                <div class="col-lg-3 col-md-6">
                                    <div class="count-box">
                                        <i class="bi bi-eye-fill"></i>
                                        <div>
                                            <span data-purecounter-start="0" data-purecounter-end="{{$userView}}"
                                                  data-purecounter-duration="1" class="purecounter"></span>
                                            <p>Просмотров профиля</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="count-box">
                                        <i class="bi bi-star-fill" style="color: #fffb01;"></i>
                                        <div>
                                            <span data-purecounter-start="0" data-purecounter-end="{{$foundReviews}}"
                                                  data-purecounter-duration="1" class="purecounter"></span>
                                            <p>Отзывов и оценок</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="count-box">
                                        <i class="bi bi-capslock-fill" style="color: #15be56;"></i>
                                        <div>
                                            <span>{{$user->grade}}</span>
                                            <p>Максимальная категория</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="count-box">
                                        <i class="bi bi-hand-thumbs-up" style="color: #15be56;"></i>
                                  <div class="col-sm-10">
                                        @for($i = 5; $i >= 1; $i--)
                                          @if($i === intval($user->average_rating))
                                              <input class="stars star-{{$i}}" value="{{$i}}" id="star-{{$user->id+1}}"
                                                     disabled type="radio" name="star" checked>
                                              <label class="stars star-{{$i}}" for="star-{{$user->id+1}}"
                                                     style="color: black"></label>
                                          @else
                                              <input class="stars star-{{$i}}" value="{{$i}}" id="star-{{$user->id+1}}"
                                                     disabled type="radio" name="star">
                                              <label class="stars star-{{$i}}" for="star-{{$user->id+1}}"
                                                     style="color: black"></label>
                                          @endif
                                         @endfor
                                            <p>Рейтинг {{floatval($user->average_rating)}}</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Counts Section -->
                    <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                        <h5 class="mb-3 mt-4">Все отзывы и оценки</h5>
                        <div id="allReview">
                            @include('profilePublic.comments')
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel"
                     aria-labelledby="pills-reviews-tab">
                    <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                        <form action="{{route('postrating')}}" method="POST" class="php-email-form">
                            @csrf

                            <h4 class="mb-2 pt-1">Оцените подготовщика и напишите отзыв</h4>
                            <div class="col-sm-2" style="margin-left: -20px">
                                <input class="star star-5" value="5" id="star-b{{$user->id}}" data-id="{{$user->id}}"
                                       type="radio" name="star" />
                                <label class="star star-5" for="star-b{{$user->id}}"></label>
                                <input class="star star-4" value="4" id="star-v{{$user->id}}" data-id="{{$user->id}}"
                                       type="radio" name="star" />
                                <label class="star star-4" for="star-v{{$user->id}}"></label>
                                <input class="star star-3" value="3" id="star-c{{$user->id}}" data-id="{{$user->id}}"
                                       type="radio" name="star" />
                                <label class="star star-3" for="star-c{{$user->id}}"></label>
                                <input class="star star-2" value="2" id="star-x{{$user->id}}" data-id="{{$user->id}}"
                                       type="radio" name="star" />
                                <label class="star star-2" for="star-x{{$user->id}}"></label>
                                <input class="star star-1" value="1" id="star-z{{$user->id}}" data-id="{{$user->id}}"
                                       type="radio" name="star" />
                                <label class="star star-1" for="star-z{{$user->id}}"></label>
                            </div>
                            <div class="mb-3">
                                <input name="nameGuest" type="text" class="form-control"
                                       placeholder="Ваше имя" required>
                            </div>
                            <div class="mb-3">
                                <input name="emailGuest" type="email" id="email" class="form-control"
                                       placeholder="Ваш email" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="review" id="validationTextarea" class="form-control"
                                          placeholder="Ваш отзыв" required></textarea>
                            </div>

                            <input type="hidden" id="userId" style="display:none" name="userId" value="{{$user->id}}">
                            <div class="form-group">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Ваше отзыв был опубликован</div>
                                <button class="btn btn-primary" type="submit">Опубликовать
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $('textarea').on('input', function () {
            $(this).outerHeight(38).outerHeight(this.scrollHeight);
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/ddata.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/publicProfile.js') }}"></script>
@endsection
