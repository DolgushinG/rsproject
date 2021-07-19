<header class="section-header">
  <div class="container mt-2">
    <p>Фильтр поиска</p>
  </div>
    @if(isset($valueSearch['city']) && isset($valueSearch['categories']))
    <div class="container mt-2">
    <h2 style="font-size: 22px;">По городу: </h2>
    </div>
    <div class="container">
    <h2  style="font-size: 22px;">{{$valueSearch['city']}}</h2>
    <input id="city_search" value="{{$valueSearch['city']}}" style="display: none">
        <h2 style="font-size: 22px;">Категории: </h2>
    </div>
    @foreach ($valueSearch['categories'] as $category)
    <div class="container">
        <h2>{{$category->category_name}}</h2>
    </div>
    @endforeach
    @elseif(isset($valueSearch['city']))
    <div class="container">
    <h2 class="mt-2" style="font-size: 22px;">По городу: </h2>
    </div>
    <div class="container">
    <h2 style="font-size: 22px;">{{$valueSearch['city']}}</h2>
    </div>
      <input id="city_search" value="{{$valueSearch['city']}}" style="display: none">
    @elseif(isset($valueSearch['categories']))
    <div class="container">
    <h2 style="font-size: 22px;">Категории: </h2>
    </div>
    @foreach ($valueSearch['categories'] as $category)
    <div class="container">
        <h2 style="font-size: 22px;">{{$category->category_name}}</h2>
    </div>
    @endforeach
    @endif
    @if($foundUsers != 0)
    <div class="container mb-2">
    <p>Результат поиска : {{$foundUsers}}</p>
    </div>
    @elseif($foundEvents != 0)
        <div class="container mb-2">
            <p>Результат поиска : {{$foundEvents}}</p>
        </div>
    @else
        <div class="container mb-2">
            <p>Результат поиска : ничего не найдено </p>
        </div>
    @endif
</header>
@if($foundUsers != 0)
<section id="team" class="team">
    <div class="container" data-aos="fade-up">
        <div id="content" class="row gy-4">
          <div class="row mx-auto mt-5">
            <p>Показано: {{$users->lastItem()}} из {{$foundUsers}}</p>
            <div class="progress" style="padding-left: 0; padding-right: 0; margin-bottom: 2rem;">

              <div class="progress-bar
                                  progress-bar-striped
                                  progress-bar-animated" role="progressbar" aria-valuemin="100"
                  aria-valuemax="0" style="width:{{$users->lastItem() * 100 / $foundUsers}}%">
                  {{intval($users->lastItem() * 100 / $foundUsers)}}%
              </div>

          </div>
            <div class="col-lg-12 mb-4">
            {!! $users->links() !!}
            </div>
           </div>
            @elseif ($foundEvents != 0)
                <section id="team" class="team">
                    <div class="container" data-aos="fade-up">
                        <div id="content" class="row gy-4">
                            <div class="row mx-auto mt-5">
                                <p>Показано: {{$events->lastItem()}} из {{$foundEvents}}</p>
                                <div class="progress" style="padding-left: 0; padding-right: 0; margin-bottom: 2rem;">

                                    <div class="progress-bar
                                  progress-bar-striped
                                  progress-bar-animated" role="progressbar" aria-valuemin="100"
                                         aria-valuemax="0" style="width:{{$events->lastItem() * 100 / $foundEvents}}%">
                                        {{intval($events->lastItem() * 100 / $foundEvents)}}%
                                    </div>

                                </div>
                                <div class="col-lg-12 mb-4">
                                    {!! $events->links() !!}
                                </div>
                            </div>
            @endif
        @if($foundUsers != 0)
         @foreach ($users as $user)

            <div class="col-lg-2 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
              <div class="member starMobile2">
                <div class="member-img">
                  <img src="storage/{{$user->photo}}" class="img-fluid" alt="">

                  <div class="social">
                      @if($user->instagram)
                    <a href="https://instagram.com/{{$user->instagram}}"><i class="bi bi-instagram"></i></a>
                      @endif
                      @if($user->telegram)
                    <a href="https://t.me/{{$user->telegram}}"><i class="bi bi-telegram"></i></a>
                      @endif
                    <a href="{{route('profileDetails', $user->id)}}" target="_blank" data-title="RouteSetter {{$user->name}}"><i class="bi bi-person-square"></i></a>
                  </div>
                </div>
                  <div class="form-group required starMobile">
                    <div class="col-sm-12 ">
                      <form action="">
                      @for($i = 5; $i >= 1; $i--)
                    @if($i === intval($user->average_rating))
                    <input class="star star-{{$i}}" value="{{$i}}" id="star-{{$user->id+1}}" disabled type="radio" name="star" checked>
                    <label class="star star-{{$i}}" for="star-{{$user->id+1}}"></label>
                    @else
                    <input class="star star-{{$i}}" value="{{$i}}" id="star-{{$user->id+1}}" disabled type="radio" name="star">
                    <label class="star star-{{$i}}" for="star-{{$user->id+1}}"></label>
                    @endif
                   @endfor
                    </form>
                     </div>
                  </div>
                <div class="member-info">
                  <a href="{{route('profileDetails', $user->id)}}" target="_blank" data-title="RouteSetter {{$user->name}}"><h4 style="text-transform: capitalize;">{{$user->name}}</h4>
                      <span>{{$user->city_name}} </span>
                  @if($user->exp_level == 3)
                  <p> Опытный <i class="bi bi-info-circle-fill" title="@lang('somewords.Опытный')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @elseif($user->exp_level == 2)
                  <p> Средний уровень <i class="bi bi-info-circle-fill" title="@lang('somewords.Средний уровень')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @else
                  <p> Начинающий <i class="bi bi-info-circle-fill" title="@lang('somewords.Начинающий')" data-toggle="tooltip" data-placement="bottom"></i></p></a>
                  @endif
                    @if($user->salary_route_rope > 0)
                  <span>Оплата: {{$user->salary_route_rope}}р / за трассу трудность</span>
                    @endif
                    @if($user->salary_route_bouldering > 0)
                  <span>Оплата: {{$user->salary_route_bouldering}}р / за трассу боулдеринг</span>
                    @endif
                </div>
              </div>
            </div>
            @endforeach
        </div>
        <div class="row mx-auto mt-5">
          <div class="col-lg-12">
          {!! $users->links() !!}
          </div>
         </div>
                        @elseif($foundEvents != 0)
                                <div class='container'>
                                    <div class='blog-posts'>
                                        <div class="container">
                                            <div class="row">
                                        @foreach ($events as $event)
                                            <div class="col-6">
                                                <div class='post'>
                                                    <a href='#'>
                                                        <div class='image' style='background-image: url({{'storage'.$event->event_image}})'>
                                                            <div class='time' style="width: 110px;">
                                                                <div class='date' style="font-size: 1.7rem;">
                                                                    {{date('d', strtotime($event->event_start_date))}}
                                                                </div>
                                                                <div class='month' style="font-size: 1.5rem;">{{date('m', strtotime($event->event_start_date))}}</div>
                                                            </div>
                                                        </div>
                                                        <div class='content'>
                                                            <h3>{{$event->event_title}}</h3>
                                                            <p>{{$event->event_description}}.</p>
                                                            <div class='meta'>
                                                                <a href="{{$event->event_url}}" ><div class='icon-comment'>Ссылка на соревнования</div><a/>
                                                                <ul class='tags'>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    <div class="row mx-auto mt-5">
                        <div class="col-lg-12">
                            {!! $events->links() !!}
                        </div>
                    </div>
                        @endif
    </div>
</section>
